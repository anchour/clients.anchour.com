(function (Stripe) {
    var Payment = function () {
    };

    Payment.form;
    Payment.tokenField;

    Payment.formSubmitHandler = function (event) {
        Payment.submit.setAttribute('disabled');

        Stripe.card.createToken(Payment.form, Payment.submitHandler.bind(this))

        return false;
    };

    Payment.submitHandler = function(status, response) {
        console.log(status, response);
    };

    Payment.init = function () {
        if (! Stripe) {
            console.error('Stripe is undefined! Be sure to include the stripe.js library in the page.');

            return false;
        }

        Payment.form       = document.querySelector('#new-customer-form');
        Payment.tokenField = document.querySelector('#user-stripe-token');
        Payment.submit     = document.querySelector('#new-customer-submit');

        Payment.form.addEventListener('submit', Payment.formSubmitHandler.bind(this));
    };

    document.addEventListener('DOMContentLoaded', Payment.init);
})(window.Stripe)
