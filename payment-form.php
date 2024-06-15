<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
</head>
<body>
    <!-- PayPal Button Container -->
    <div id="paypal-button-container"></div>

    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=AUwOB9vvcoLkWqyeitomqk_WfuNxUL6Mfl5ts2eHDFqj07Oh5syeOOoxomeBqRxg3t0SwvK2LHG2NCQ-&currency=USD"></script>
    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: 'total_price' // Replace with actual total amount
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Call your server to save the transaction
                    return fetch('/loginsystem/payment-handler.php', {
                        method: 'post',
                        headers: {
                            'content-type': 'application/json'
                        },
                        body: JSON.stringify({
                            orderID: data.orderID
                        })
                    }).then(function(response) {
                        return response.json();
                    }).then(function(json) {
                        if (json.status === 'success') {
                            alert('Transaction completed by ' + details.payer.name.given_name);
                            // Redirect or update the page as necessary
                        } else {
                            alert('Transaction failed');
                        }
                    });
                });
            }
        }).render('#paypal-button-container');
    </script>
</body>
</html>