<!DOCTYPE html>
<html>
<head>
	<title>Strip 3</title>
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<input class="form-control"
       type="number"
       id="custom-donation-amount"
       placeholder="50.00"
       min="0"
       step="10.00"/>
<script src="https://checkout.stripe.com/checkout.js"></script>
<button id="customButton ">Purchase</button>
<script>
  var handler = StripeCheckout.configure({
    key: 'pk_test_TYooMQauvdEDq54NiTphI7jx',
    image: '/square-image.png',
    token: function(token) {
      // Use the token to create the charge with a server-side script.
      // You can access the token ID with `token.id`
    }
  });

  document.getElementById('customButton').addEventListener('click', function(e) {
    // This line is the only real modification...
    var amount = $("#custom-donation-amount").val() * 100;
    handler.open({
      name: 'Demo Site',
      description: 'Some donation',
      // ... aside from this line where we use the value.
      amount: amount
    });
    e.preventDefault();
  });
</script>
</body>
</html>