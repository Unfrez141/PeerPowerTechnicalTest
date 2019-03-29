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
        
        return View('view')
        ->with('request',$id);
    }
}