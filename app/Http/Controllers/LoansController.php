<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LoansController extends Controller
{
    function showList(Request $request){
        return View('showLoans')
        ->with('text',$request->input('text'));
    }

    function create(Request $request){
        return View('createLoan');
    }

    function viewParse(Request $request){
        $id = DB::table('loans')->insertGetId([
            'LoanAmount' => (int)$request->get('loanAmount'), 
            'LoanTerm' => (int)$request->get('loanTerm'), 
            'InterestRate' => (float)$request->get('interestRate'), 
            'created_at' =>  '2019-03-29' // $request->get('year').'-'.$request->get('month').'-'.'1'
            ]);
        return redirect('view/'.$id);
    }

    function View(Request $request, $id){
        // Float round up 
        $P = 10000;
        $r = 0.1;
        $y = 1;
        $PMT = ($P*($r/12))/(1-((1+($r/12))**(-12*$y)));
        $a = array();

        do{
            $Inerest = ($r/12)*$P;
            $Principal = $PMT - $Inerest;
            $P = round($P - $Principal, 2);
        } while ($P > 0);

        return View('view')
        ->with('request',$id);
    }
}