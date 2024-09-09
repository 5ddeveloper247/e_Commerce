<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Form</title>
    <style>
        .StripeElement {
            box-sizing: border-box;
            height: 40px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #fafafa;
        }
    </style>
</head>
<body>
    <h1>Payment Form</h1>
    <form id="payment-form" action="{{ route('payment.make') }}" method="POST">
        @csrf
        <label for="card-element">Credit or Debit Card</label>
        <div id="card-element" class="StripeElement"></div>
        <div id="card-errors" role="alert"></div>
        <input type="number" name="amount" id="amount" placeholder="Amount in dollars" min="1" required>
        <button type="submit">Submit Payment</button>
    </form>

    <!-- Load Stripe.js -->
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe('{{ env('STRIPE_KEY') }}');
        const elements = stripe.elements();
        const card = elements.create('card');
        card.mount('#card-element');

        const form = document.getElementById('payment-form');
        form.addEventListener('submit', async (event) => {
            event.preventDefault();

            const { token, error } = await stripe.createToken(card);

            if (error) {
                document.getElementById('card-errors').textContent = error.message;
            } else {
                const amount = document.getElementById('amount').value;
                const formData = new FormData(form);
                formData.append('stripeToken', token.id);
                formData.append('amount', amount);

                fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': formData.get('_token'),
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Payment successful! Transaction ID: ' + data.transaction_id);
                    } else {
                        alert('Payment failed: ' + data.error);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Payment failed.');
                });
            }
        });
    </script>
</body>
</html>
