<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Model\Order;
use Stripe\Stripe as stp;
use Stripe\Charge as crg;




class ApiController extends Controller
{
    //chkout
    public function index()
    {
        return view('Shop.checkout');
    }

    public function stripePost(Request $request)
    {
        stp::setApiKey(env('STRIPE_SECRET'));
        crg::create ([
            "amount" => 2000,
            "currency" => "usd",
            "source" => "tok_visa", // obtained with Stripe.js
            "metadata" => ["order_id" => "6735"]
        ]);

       // Session::flash('success', 'Payment successful!');

        return redirect('/ch2')->with('success','Successfully purchased');

    }
}

