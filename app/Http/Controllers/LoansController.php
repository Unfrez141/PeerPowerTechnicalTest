<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LoansController extends Controller
{
    function create(){
        return View('createLoan');
    }

    function delete(Request $request){
        echo $request->get('delete');
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
        return redirect('view/'.$id);
    }

    function viewDetail($id){
        $user = \DB::table('loans')->where('id',$id)->get()->first();

        $P = $user->LoanAmount;
        $r = $user->InterestRate;
        $y = $user->LoanTerm;
        $time = explode(' ', $user->created_at)[0];

        # TODO: Date
        $paymentNo = 1;

        $PMT = ($P*($r/12))/(1-((1+($r/12))**(-12*$y)));
        $paymentList = array();

        while ($P > 0){
            $Interest = ($r/12)*$P;
            $Principal = $PMT - $Interest;
            $P = $P - $Principal;
            if ($P < 0){
                $P = 0.00;
            }
            $m = array("PMT" => round($PMT, 2), "Interest" => round($Interest, 2), "Principal" => round($Principal, 2), "Balance" => round($P, 2), "paymentNo" => $paymentNo);
            $paymentNo += 1;
            array_push($paymentList, $m);
        };

        return View('view', ['paymentList' => $paymentList]);
    }


    function showLoansList(Request $request){
        $users = \DB::table('loans')->get();

        return View('showLoans', ['users' => $users]);
    }
}