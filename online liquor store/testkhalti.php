<button id="payment-button">Pay with Khalti</button>
<script>
var config = {
    "publicKey": "your public key,",
    "productIdentity": "product id",
    "productName": "product name",
    "productUrl": "https:/www.google.com",
    "eventHandler": {
        onSuccess(payload) {
            $.ajax({
                url: "{{url('/payment/paySuccess.php')}}",
                type: 'GET',
                data: {
                    amount: payload.amount,
                    trans_token: payload.token
                },
                success: function(res) {
                    console.log("transaction succeed");
                },
                error: function(error) {
                    console.log("transaction failed");
                }
            })
        },
        onError(error) {
            console.log(error);
        },
        onClose() {
            console.log('widget is closing');
        }
    }
};
var checkout = new KhaltiCheckout(config);
var btn = document.getElementById("payment-button");
btn.onclick = function() {
    checkout.show({
        amount: 1000
    });
}
</script>