<?php

namespace App\Http\Middleware;

use App\Models\SellerDetail;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SellerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $bank_info_filled = SellerDetail::where('user_id',Auth::user()->id)->pluck('account_name','bank_name','account_number','iban_number')->first();
        // dd($bank_info_filled);
        if(is_null($bank_info_filled)){
            return redirect('bank-details')->with('message', 'Please fill Bank account details');
        }
        return $next($request);
    }
}
