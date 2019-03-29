<?php

namespace App\Http\Middleware;

use Closure;

class Validations
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->loanAmount < 1000 || $request->loanAmount > 10**9 || !is_int($request->loanAmount)) {
            //ถ้าไม่เกิน 200 จะส่งไปยังหน้า home
            return redirect('/');
        }
        if ($request->loanTerm < 1 || $request->loanTerm > 50 || !is_int($request->loanAmount)) {
            //ถ้าไม่เกิน 200 จะส่งไปยังหน้า home
            return redirect('/');
        }
        if ($request->interestRate < 1 || $request->loanAmount > 36 || !is_float($request->loanAmount)) {
            //ถ้าไม่เกิน 200 จะส่งไปยังหน้า home
            return redirect('/');
        }
        return $next($request);
    }
}
