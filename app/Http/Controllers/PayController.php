<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class PayController extends Controller
{
    public function index()
    {
        return view('pay');
    }
    public function verify( Request $request){

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        try{
            \Stripe\Charge::create(array(
                "amount"=>300*100,
                "currency"=>"usd",
                "source"=>$request->input('stripeToken'),
                "description"=>"Test Payment",
            ));

            return Redirect::back()->with('mes','success');
        }catch (\Exception $e){

            return Redirect::back()->with('mes','error'.$e);
        }
    }
}
