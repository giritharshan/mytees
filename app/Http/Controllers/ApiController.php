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
            "amount" => 1000 * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from Giri@wlv.com."
        ]);

       // Session::flash('success', 'Payment successful!');

        return back();

    }
}

