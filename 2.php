<!DOCTYPE html>
<html>
<head>
	<title>Stripe 2</title>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<style>
label{width:100%}
button {
  float: left;
  display: block;
  background: #666EE8;
  color: white;
  box-shadow: 0 7px 14px 0 rgba(49, 49, 93, 0.10), 0 3px 6px 0 rgba(0, 0, 0, 0.08);
  border-radius: 4px;
  border: 0;
  margin-top: 20px;
  font-size: 15px;
  font-weight: 400;
  height: 40px;
  line-height: 38px;
  outline: none;
  padding: 1px 25px;
}

button:focus {
  background: #555ABF;
}

button:active {
  background: #43458B;
}
.panel{width:fit-content}
</style>
</head>
<body>
<script src="https://checkout.stripe.com/checkout.js"></script>
<div class="container" style="padding-top:3em">
  <div class="col-sm-2"></div>
  <div class="col-sm-8">
        <div class="form-group">
          <label>
            <span>Amount</span>
          <input type="text" onkeypress='validate(event)' name="" id="amount" class="form-control">
          </label>
        </div>
    <div class="form-group">
      <label for="sel1">Currency:</label>
      <select class="form-control" id="currency">
        <option>USD</option>
        <option>GBP</option>
        <option>AUD</option>
        <option>CAD</option>
        <option>EUR</option>
        <option>NZD</option>
        <option>MXN</option>
        <option>HKD</option>
      </select>
    </div>
    <div class="panel panel-danger" ><div class="panel-heading" id="errors"></div></div>
      <button id="customButton">Make Payment</button>
  </div>
  <div class="col-sm-2"></div>
</div>
<script>
var handler = StripeCheckout.configure({
  key: 'pk_test_TYooMQauvdEDq54NiTphI7jx',
  image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
  locale: 'auto',
  token: function(token) {
    // You can access the token ID with `token.id`.
    // Get the token ID to your server-side code for use.
  }
});

document.getElementById('customButton').addEventListener('click', function(e) {
  // Open Checkout with further options:
var getamount = $('#amount').val();
if(getamount == ""){
  $('.panel').fadeIn();
document.getElementById('errors').innerHTML = 'Please enter an amount to proceed!';
document.getElementById("customButton").style.marginTop = "5px";
 setTimeout(function() {
    $(".panel").fadeOut();
  }, 5000);
}else{


  var newamount = amount.value * 100;

  handler.open({
    name: 'Make Payment',
    description: 'Stripe',
    zipCode: true,
    currency: currency.value,
    amount: newamount
  });
$('#amount').val("");
  e.preventDefault();
  }
});

// Close Checkout on page navigation:
window.addEventListener('popstate', function() {
  handler.close();
});
</script>

<script type="text/javascript">
function validate(evt) {
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
$('#amount').on('change', function(e) {
    var amount = e.target.value;
    console.log(amount);
});
$('#currency').on('change', function(e) {
    var currency = e.target.value;
    console.log(currency);
});
$(document).ready(function() {
    $('.panel').hide();
});
</script>
</body>
</html>