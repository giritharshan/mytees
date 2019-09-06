<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Model\Order;



class ApiController extends Controller
{
    //chkout
    public function index()
    {
        return view('Shop.checkout');
    }

    public function postCheckout(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
            "amount" => 1000 * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from Giri@wlv.com."
        ]);

       // Session::flash('success', 'Payment successful!');

        return back();

    }
}

