<!DOCTYPE html>
<html>
<head>
	<title>Stripe 1</title>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
    <div class="form-group">
      <label>
        <span>Amount</span>
			<input type="text" onkeypress='validate(event)' name="" id="amount" class="form-control">
      </label>
</div>
<form action="your-server-side-code" method="POST">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_TYooMQauvdEDq54NiTphI7jx"
    data-amount="50"
    data-currency="GBP"
    data-name="Make Payment"
    data-description="Stripe"
    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
    data-locale="auto"
    data-zip-code="true">
  </script>
</form>

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
    $('script').attr("data-amount", amount);
    //$('button.Button-animationWrapper-child--primary.Button>span>div>span>span>span').html(amount);

});
$('.button.stripe-button-el').click(function(){
	//$('button.Button-animationWrapper-child--primary.Button>span>div>span>span>span').html(amount);
	$('button.Button-animationWrapper-child--primary.Button>span>div>span>span>span').hide();
	
});
</script>
</body>
</html>