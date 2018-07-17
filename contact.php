<?php
	require_once 'header.php';
?>
<div class="navi-bar">
	<div class="container custom-container">
		<div class="navi-bar-list">
			<h5>
				<strong>
					<a href="index.php">Home</a>&nbsp;&nbsp;
					/&nbsp;&nbsp;
					
					<a>Contact us</a>
				</strong>
			</h5>
		</div>
		<div class="navi-title">
			<p>
				<strong>Contact us</strong>
			</p>
		</div>
	</div>
</div>
<div class="container custom-container">
	<div class="row" id="bg_contact_row">
		<div class="contact-form-hedding col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h2 id="">Have a question? We're here for you!</h2>
		</div>
		<div class="contact-form col-md-12 col-sm-12 col-xs-12 ">
			<form>
				<div class="col-md-12 col-sm-12 col-xs-12 contact-form-single-div">
					<div class="col-md-6 col-sm-6 col-xs-6  form-group no-right-padding no-left-right-padding-xs" id="contact_name">
						<input type="text"  name="" placeholder="Your name" class="form-control">
						</div>
						<div class="col-md-6 col-sm-6 col-xs-6  form-group no-left-padding no-left-right-padding-xs" id="contact_email">
							<input type="text"  name="" placeholder="Your email-id" class="form-control">
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12 contact-form-single-div  form-group" id="Subject">
							<input type="text"  name="" placeholder="Subject" class="form-control">
							</div>
							<div class="col-md-12 col-sm-12 col-xs-12 contact-form-single-div form-group">
								<textarea placeholder="Message" class="form-control"></textarea>
							</div>
							<div class="col-md-12 col-sm-12 col-xs-12 contact-form-single-div-btn">
								<button type="submit" value="Send a Message">Send a Message</button>
							</div>
						</form>
					</div>
					<div class="col-md-1 col-sm-1"></div>
				</div>
			</div>
			<?php
	require_once 'footer.php';
?>
			<script>
$('.home').removeClass('active');
$('.contact_menu').addClass('active');
</script>
