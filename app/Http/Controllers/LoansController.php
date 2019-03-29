<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

function calculation(Request $request, $id){
    $month = $request->get('month');
    $year = $request->get('year');
    $P = $request->get('loanAmount');
    $r = ($request->get('interestRate'))/100;
    $y = $request->get('loanTerm');
    
    # $month = 13;
    # echo date("M Y", strtotime("+$month month", strtotime("$year-$month-1")));

    $paymentNo = 1;

    $PMT = ($P*($r/12))/(1-((1+($r/12))**(-12*$y)));
    $paymentList = array();

    while ($P > 0){
        $Interest = ($r/12)*$P;
        $Principal = $PMT - $Interest;
        $P = $P - $Principal;
        DB::table('repayments')->insertGetId([
            'no' => $paymentNo, 
            'dates' => "$year-$month-1", 
            'paymentAmount' => $PMT, 
            'interest' => $Interest,
            'principal' => $Principal,
            'balance' => $P,
            'loan_id' => $id,
            ]);
        $paymentNo += 1;
    };
}

class LoansController extends Controller
{

    function showLoansList(){
        $users = \DB::table('loans')->get();
        return View('showLoans', ['users' => $users]);
    }

    function create(){
        return View('createLoan');
    }

    function update(Request $request, $id){
        DB::table('loans')
            ->where('id', $id)
            ->update([
                'LoanAmount' => (int)$request->get('loanAmount'), 
                'LoanTerm' => (int)$request->get('loanTerm'), 
                'InterestRate' => (float)($request->get('interestRate'))/100, 
            ]);
        return redirect('/');
    }

    function delete(Request $request){
        DB::table('loans')->where('id', $request->get('delete'))->delete();
        return redirect('/');
    }

    function viewParse(Request $request){
        $month = $request->get('month');
        $year = $request->get('year');
        $id = DB::table('loans')->insertGetId([
            'LoanAmount' => (int)$request->get('loanAmount'), 
            'LoanTerm' => (int)$request->get('loanTerm'), 
            'InterestRate' => (float)($request->get('interestRate'))/100, 
            'created_at' => "$year-$month-1"
            ]);
        calculation($request, $id);
        return redirect('view/'.$id);
    }

    function viewDetail($id){
        $loan = \DB::table('loans')->where('id',$id)->get()->first();
        $repayments = \DB::table('repayments')->where('loan_id',$id)->get();

        return View('view', ['loan' => $loan, 'repayments' => $repayments]);

    }

}