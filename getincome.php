<?php
require_once 'header.php';
?>
<link rel="stylesheet" href="css_live/front.css" type="text/css">

<div class="navi-bar">
	<div class="container custom-container">
		<div class="navi-bar-list">
			<h5><strong>
				<a href="index.php">Home</a>&nbsp;&nbsp;
				/&nbsp;&nbsp;
				<a>Get Income</a>
			</strong></h5>
		</div>
		<div class="navi-title">
			<p><strong>Get Income</strong></p>
		</div>
	</div>
</div>
<div class="container custom-container calculate work">
	<p>Calculate Profit</p>
	<div class="col-md-2 col-sm-2 col-xs-2"></div>
	<div class="col-md-2 col-sm-2 col-xs-2"></div>
	<div class="col-md-4 col-sm-4 col-xs-4">
		<div class="col-md-4 col-sm-4 col-xs-4"></div>
		<div class="col-md-4 col-sm-4 col-xs-4 under-line" style="border: 2px solid #333;"></div>
	</div>
	<div class="col-md-2 col-sm-2 col-xs-2"></div>
	<div class="col-md-2 col-sm-2 col-xs-2"></div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 calculator-div" >
		<div class="calculator">
			<input type="text" id="money" class="amount" placeholder="Enter USD Amount">
		</div>

		<div class="calculatorResult">
			<div class="hourly">
				<label class="profit_label">Profit Hourly</label>
				<div id="profitHourly" style="">0 USD</div>
			</div>

			<div class="daily">
				<label class="profit_label">Profit Daily</label>
				<div id="profitDaily" style="">0 USD</div>
			</div>

			<div class="total">
				<label>Profit Total</label>
				<div id="profitMonthly" style="">0 USD</div>
			</div>
		</div>

	</div>
</div>


<div class="vc_row-full-width vc_clearfix"></div>

<?php
require_once 'footer.php';
?>
<script>
$( document ).ready(function() {
	var percentage_extra = 1.00;
	var daily_percentage = 0.02;

	$("#money").keydown(function(event) {
		if (event.shiftKey == true) {
			event.preventDefault();
		}

		if ((event.keyCode >= 48 && event.keyCode <= 57) ||
			(event.keyCode >= 96 && event.keyCode <= 105) ||
			event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 ||
			event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190) {

		} else {
			event.preventDefault();
		}

		if ($(this).val().indexOf('.') !== -1 && event.keyCode == 190)
			event.preventDefault();
	});

	$("#money").keyup(function(event) {
		if($(this).val() > 0){
			money = parseFloat($(this).val());

			if(money <= 499){
				daily_percentage = 0.01;
			}else if(money >= 500){
				daily_percentage = 0.020;
			}


			daily_rate =(money * daily_percentage);
			//hourly_rate = parseFloat(daily_rate / 24);
			
			var truncated = Math.floor(parseFloat(daily_rate / 24) * 100) / 100;
			hourly_rate = truncated;

			total = money + (money * 1.0);

			$("#profitHourly").text(hourly_rate + ' USD');
			$("#profitDaily").text( daily_rate + ' USD');
			$("#profitMonthly").text( total + ' USD');
		} else {
			$("#profitHourly").text('0 USD');
			$("#profitDaily").text('0 USD');
			$("#profitMonthly").text('0 USD');
		}
	});
});
</script>
<script>
	$('.menu #nav li').removeClass('active');
	$('.menu #nav .home').addClass('active');
</script> 

