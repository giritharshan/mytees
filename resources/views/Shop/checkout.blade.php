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
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
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
</div>
<script type="text/javascript">
    $(function() {
        var $form         = $(".require-validation");
        $('form.require-validation').bind('submit', function(e) {
            var $form         = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'].join(', '),
                $inputs       = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid         = true;
            $errorMessage.addClass('hide');

            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }

        });

        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                // token contains id, last4, and card type
                var token = response['id'];
                // insert the token into the form so it gets submitted to the server
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }

    });
</script>
