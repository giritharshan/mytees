<?php
/**
 * Created by PhpStorm.
 * User: kanishker
 * Date: 2019-04-08
 * Time: AM 1.26
 */
?>
@include('frntLayout.header')
<h4>Total : 1000 </h4>
</div>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript" src="js/CheckOut.js"></script>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            <div class="form-group">

                <form action="{{route('stripe.post')}}" method="post" id="checkout-form">
                    <label>Name</label>
                    <input type="text" id="name" name="name" class="form-control" required>

                    <label>Address</label>
                    <input type="text" id="add" name="address" class="form-control" required>

                    <label>cart holder name</label>
                    <input type="text" id="cartholdername" class="form-control" required>

                    <label>Credit card number</label>
                    <input type="text" id="card-number" class="form-control" required><br>

                    <label>EXPIRATION month</label>
                    <input type="text" id="card-expiry-month" class="form-control" required>

                    <label>EXPIRATION year</label>
                    <input type="text" id="card-expiry-year" class="form-control" required>

                    <label>CVC</label>
                    <input type="text" id="card-cvc" class="form-control" required>
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-success">Checkout</button>
                </form>

            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>
