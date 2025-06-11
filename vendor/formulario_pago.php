<?php
$total = isset($_GET['total']) ? floatval($_GET['total']) : 0;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagar con Stripe</title>
    <script src="https://js.stripe.com/v3/"></script>
</head>

<body>
    <h1>Pago con Stripe</h1>
    <form id="payment-form" action="pago.php" method="POST">
        <label for="amount">Cantidad a pagar (€):</label>
        <input type="number" id="amount" name="amount" min="1" step="0.01"
            required value="<?php echo htmlspecialchars($total); ?>" readonly>
        <div id="card-element"></div>
        <!-- Campo oculto para almacenar el paymentMethod.id -->
        <input type="hidden" id="payment_method" name="payment_method">
        <button type="submit" id="submit-button">Pagar</button>
        <div id="payment-message"></div>
    </form>
    <script>
        const stripe =
            Stripe('PUBLIC API FROM STRIPE');
        const elements = stripe.elements();
        const cardElement = elements.create('card');
        cardElement.mount('#card-element');
        const form = document.getElementById('payment-form');
        form.addEventListener('submit', async (event) => {
            event.preventDefault(); // Evita el envío del formulario hasta obtener el paymentMethod
            const {
                paymentMethod,
                error
            } = await stripe.createPaymentMethod({
                type: 'card',
                card: cardElement,
            });
            if (error) {
                document.getElementById('payment-message').innerText =
                    error.message;
                return;
            }
            // Asigna el ID del método de pago al campo oculto y envía el
            document.getElementById('payment_method').value = paymentMethod.id;
            form.submit();
        });
    </script>
</body>

</html>
