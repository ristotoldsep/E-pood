<!DOCTYPE html>
<html lang="en">

<?php session_start(); ?>

<head>
    <!-- Add meta tags for mobile and IE -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title> PayPal Smart Payment Buttons Integration | Client Demo </title>
</head>

<body>
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>

    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=AYg9lS7A9y7CGmURkTYZy0P3S9y9SKNZ3GXmQkNchTMeZX9IXIfKSct1HLoV6-SVmZQcNu40wCnzYDne&currency=EUR"></script>

    <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?php echo $_SESSION['total']; ?>'
                        }
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Show a success message to the buyer
                    alert('Tellimus edastatud!');
                    window.location.href='../index.php';
                });
            }

        }).render('#paypal-button-container');
    </script>
</body>

</html>