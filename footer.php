<style>
.mission{
	float: left; margin-bottom: 2%;
}
.footbg{
	background-color: #3c3c3c;
}
.foottext{
	font-size:10px;
}
</style>
<footer>
	<div class="footbg">
		<div class="container footer custom-container">

			<div class="col-md-3 col-sm-3 mission">
				<h4>OUR MISSION</h4>
				<div >
					<p>Mining with the latest algorithms allows to make as much bitcoin as possible. We aim to provide you with the easiest possible way to make money without having to do any of the hard stuff.</p>
				</div>
			</div>

			<div class="col-md-3 col-sm-3 col-xs-12 mob-full-col" style="float:left; margin-bottom: 2%"">
			<h4>FOLLOW US</h4>
			<span class="followWrap">
				<div class="col-xs-2 social-box">
					<a target="_blank" href="https://www.facebook.com" title="Facebook"><i class="fab fa-facebook-f fa-2x"></i></a>	
				</div>
				<div class="col-xs-2 social-box">
					<a target="_blank" href="https://twitter.com/cloudhashing24" title="Twitter"><i class="fab fa-twitter fa-2x"> </i></a>
				</div>
				<div class="col-xs-2 social-box">
					<a target="_blank" href="https://www.instagram.com" title="Instagram"><i class="fab fa-instagram fa-2x"></i></a>
				</div>
				<div class="col-xs-2 social-box">
					<a target="_blank" href="https://en.wikipedia.org" title="Wikipedia"><i class="fab fa-wikipedia-w fa-2x"></i></a>
				</div>
			</span>
		</div>
		<div class="col-md-3 col-sm-3 col-xs-12 mob-full-col" style="float:left; margin-bottom: 2%"">
		<h4>QUICK LINKS</h4>
		<div class="link">
			<a href="index.php" title="Home">Home</a><br/>
			<a href="about.php" title="About Us">About Us</a><br/>
			<a href="price.php" title="About Us">Pricing</a><br/>
			<a href="offer.php" title="About Us">Our Offer</a><br/>
			<a href="work.php" title="How It Works">How It Works</a><br/>
			<a href="faq.php" title="Faq">Faq</a><br/>
			<a href="contact.php"  title="Contact Us">Contact Us</a>
		</div>
	</div>

	<div class="col-md-3 col-sm-3 col-xs-12" style="float:left; margin-bottom: 2%">
		<h4>GET IN TOUCH</h4>

		<div class="getInTouch">
			<div class="contactInfo">
				<a href="map.php"><span class="fa fa-map-marker" id="map_marker_icon"></span>
					<p class="zero-margin-bottom" id="footer_addr">37, Tabernacle Street<br>
					London, </p>
					<p class="zero-margin-bottom" id="footer_addr1">United Kingdom, EC2A 4NJ</p></a>
				</div>
				<a class="btnSendEmail"><p class="contactInfo"> <span class="fa fa-envelope" id="footer_envelop_icon"></span>support@cloudhashing.uk</p></a>
				<p class="contactInfo"> <span class="fa fa-phone" id="footer_phone_icon"></span>+44 20 744 25675</p>
			</div>
		</div>
		<div style="clear: both;"></div>
	</div>

</div>
</div>
<div class="footbg">
	<div style="border-top:1px solid rgba(255,255,255,.1)">
	</div>
	<div class="container copyright custom-container">
		<div class="row">
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 mob-full-col">

				<p class="text-center foottext" >The information on this website does not convey an offer of any type and is not intended to be, and should not be construed as, an offer to sell, or the solicitation of an offer to buy, any securities, commodities, or other financial products. In addition, the information on this website does not constitute the provision of investment advice. No assurances can be made that any aims, assumptions, expectations, strategies, and/or goals expressed or implied herein were or will be realized or that the activities or any performance described did or will continue at all or in the same manner as is described on this website.
				</p>
			</div>

		</div>
	</div>
</div>
</footer>


<script type="text/javascript">
	$(function () {
		$('.btnSendEmail').click(function (event) {
			var email = '';
			var subject = '';
			var emailBody = '';
			window.location = 'mailto:' + email + '?subject=' + subject + '&body=' + emailBody;
		});
	});
</script>
<div id="langModal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<div id="languageSub" class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">SELECT YOUR LANGUAGE</h4>
			</div>
			<div class="modal-body">
				<div class="separator"></div>
				<div class="col-md-10 col-md-offset-1">
					<div class="row langrow">
						<div class="langele col-md-2 col-md-offset-1">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="Arabic" onclick="translateLanguage(this.id);" title="العربية">العربية</a></li>
						</div>
						<div class="langele flag col-md-1">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="Arabic" onclick="translateLanguage(this.id);" title="العربية"><img class="img-lang" alt="bitminer arab" src="image/language/arabic.png"></a></li>
						</div>
						<div class="langele col-md-2 col-md-offset-1 verline">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="Dutch" onclick="translateLanguage(this.id);" title="Deutsch">Deutsch</a></li>
						</div>
						<div class="langele flag col-md-1">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="Dutch" onclick="translateLanguage(this.id);" title="العربية"><img class="img-lang" alt="bitminer deutsch" src="image/language/dutch.png"></a></li>
						</div>
						<div class="langele col-md-2 col-md-offset-1 verline">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="English" onclick="translateLanguage(this.id);" title="English">English&nbsp;|&nbsp;</a></li>
						</div>
						<div class="langele flag col-md-1">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="English" onclick="translateLanguage(this.id);" title="العربية"><img class="img-lang" alt="bitminer british" src="image/language/british.png"></a></li>
						</div>
					</div>
					<div class="row langrow">
						<div class="langele col-md-2 col-md-offset-1">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="Esperanto" onclick="translateLanguage(this.id);" title="Español">Español&nbsp;|&nbsp;</a></li>
						</div>
						<div class="langele flag col-md-1">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="Esperanto" onclick="translateLanguage(this.id);" title="العربية"><img class="img-lang" alt="bitminer espanol" src="image/language/espanol.png"></a></li>
						</div>
						<div class="langele col-md-2 col-md-offset-1 verline">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="Filipino" onclick="translateLanguage(this.id);" title="Filipino">Filipino&nbsp;|&nbsp;</a></li>
						</div>
						<div class="langele flag col-md-1">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="Filipino" onclick="translateLanguage(this.id);" title="العربية"><img class="img-lang" alt="bitminer filipino" src="image/language/filipino.png"></a></li>
						</div>
						<div class="langele col-md-2 col-md-offset-1 verline">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="French" onclick="translateLanguage(this.id);" title="Français">Français&nbsp;|&nbsp;</a></li>
						</div>
						<div class="langele flag col-md-1">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="French" onclick="translateLanguage(this.id);" title="العربية"><img class="img-lang" alt="bitminer france" src="image/language/france.png"></a></li>
						</div>
					</div>
					<div class="row langrow">
						<div class="langele col-md-2 col-md-offset-1">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="Korean" onclick="translateLanguage(this.id);" title="한국어">한국어&nbsp;|&nbsp;</a></li>
						</div>
						<div class="langele flag col-md-1">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="Korean" onclick="translateLanguage(this.id);" title="العربية"><img class="img-lang" alt="bitminer korean" src="image/language/korean.png"></a></li>
						</div>
						<div class="langele col-md-2 col-md-offset-1 verline">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="Hindi" onclick="translateLanguage(this.id);" title="हिन्दी">हिन्दी&nbsp;|&nbsp;</a></li>
						</div>
						<div class="langele flag col-md-1">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="Hindi" onclick="translateLanguage(this.id);" title="हिन्दी"><img class="img-lang" alt="bitminer india, bharat" src="image/language/india.png"></a></li>
						</div>
						<div class="langele col-md-2 col-md-offset-1 verline">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="Indonesian" onclick="translateLanguage(this.id);" title="Bahasa Indonesia">Bahasa Indonesia&nbsp;|&nbsp;</a></li>
						</div>
						<div class="langele flag col-md-1">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="Indonesian" onclick="translateLanguage(this.id);" title="Bahasa Indonesia"><img class="img-lang" alt="bitminer indonesia" src="image/language/indonesia.png"></a></li>
						</div>
					</div>
					<div class="row langrow">
						<div class="langele col-md-2 col-md-offset-1">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="Italian" onclick="translateLanguage(this.id);" title="Italiano">Italiano&nbsp;|&nbsp;</a></li>
						</div>
						<div class="langele flag col-md-1">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="Italian" onclick="translateLanguage(this.id);" title="العربية"><img class="img-lang" alt="bitminer italy" src="image/language/italian.png"></a></li>
						</div>
						<div class="langele col-md-2 col-md-offset-1 verline">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="Frisian" onclick="translateLanguage(this.id);" title="Nederlands">Nederlands&nbsp;|&nbsp;</a></li>
						</div>
						<div class="langele flag col-md-1">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="Frisian" onclick="translateLanguage(this.id);" title="العربية"><img class="img-lang" alt="bitminer nederland" src="image/language/nederland.png"></a></li>
						</div>
						<div class="langele col-md-2 col-md-offset-1 verline">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="Japanese" onclick="translateLanguage(this.id);" title="日本語">日本語&nbsp;|&nbsp;</a></li>
						</div>
						<div class="langele flag col-md-1">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="Japanese" onclick="translateLanguage(this.id);" title="العربية"><img class="img-lang" alt="bitminer japan" src="image/language/japan.png"></a></li>
						</div>
					</div>
					<div class="row langrow">
						<div class="langele col-md-2 col-md-offset-1">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="Norwegian" onclick="translateLanguage(this.id);" title="Norsk">Norsk&nbsp;|&nbsp;</a></li>
						</div>
						<div class="langele flag col-md-1">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="Norwegian" onclick="translateLanguage(this.id);" title="العربية"><img class="img-lang" alt="bitminer norsk" src="image/language/norsk.png"></a></li>
						</div>
						<div class="langele col-md-2 col-md-offset-1 verline">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="Polish" onclick="translateLanguage(this.id);" title="Polski">Polski&nbsp;|&nbsp;</a></li>
						</div>
						<div class="langele flag col-md-1">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="Polish" onclick="translateLanguage(this.id);" title="العربية"><img class="img-lang" alt="bitminer polski" src="image/language/polish.png"></a></li>
						</div>
						<div class="langele col-md-2 col-md-offset-1 verline">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="Portuguese" onclick="translateLanguage(this.id);" title="Português">Português&nbsp;|&nbsp;</a></li>
						</div>
						<div class="langele flag col-md-1">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="Portuguese" onclick="translateLanguage(this.id);" title="العربية"><img class="img-lang" alt="bitminer portugal" src="image/language/portugal.png"></a></li>
						</div>
					</div>
					<div class="row langrow">
						<div class="langele col-md-2 col-md-offset-1">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="Russian" onclick="translateLanguage(this.id);" title="Русский">Русский&nbsp;|&nbsp;</a></li>
						</div>
						<div class="langele flag col-md-1">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="Russian" onclick="translateLanguage(this.id);" title="العربية"><img class="img-lang" alt="bitminer russia" src="image/language/russia.png"></a></li>
						</div>
						<div class="langele col-md-2 col-md-offset-1 verline">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="Swedish" onclick="translateLanguage(this.id);" title="Svenska">Svenska&nbsp;|&nbsp;</a></li>
						</div>
						<div class="langele flag col-md-1">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="Swedish" onclick="translateLanguage(this.id);" title="العربية"><img class="img-lang" alt="bitminer Svensk" src="image/language/svensk.png"></a></li>
						</div>
						<div class="langele col-md-2 col-md-offset-1 verline">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="Thai" onclick="translateLanguage(this.id);" title="ไทย">ไทย&nbsp;|&nbsp;</a></li>
						</div>
						<div class="langele flag col-md-1">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="Thai" onclick="translateLanguage(this.id);" title="ไทย"><img class="img-lang" alt="bitminer Thailand" src="image/language/thailand.png"></a></li>
						</div>
					</div>
					<div class="row langrow">
						<div class="langele col-md-2 col-md-offset-1">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="Turkish" onclick="translateLanguage(this.id);" title="Türkçe">Türkçe&nbsp;|&nbsp;</a></li>
						</div>
						<div class="langele flag col-md-1">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="Turkish" onclick="translateLanguage(this.id);" title="العربية"><img class="img-lang" alt="bitminer turkey" src="image/language/turkish.png"></a></li>
						</div>
						<div class="langele col-md-2 col-md-offset-1 verline">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="Vietnamese" onclick="translateLanguage(this.id);" title="Tiếng Việt">Tiếng Việt&nbsp;|&nbsp;</a></li>
						</div>
						<div class="langele flag col-md-1">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="Vietnamese" onclick="translateLanguage(this.id);" title="العربية"><img class="img-lang" alt="bitminer vietnam" src="image/language/vietnam.png"></a></li>
						</div>
						<div class="langele col-md-2 col-md-offset-1 verline">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="Chinese" onclick="translateLanguage(this.id);" title="中文">中文&nbsp;|&nbsp;</a></li>
						</div>
						<div class="langele flag col-md-1">
							<a class="langLink" href="javascript:;" data-dismiss="modal" id="Chinese" onclick="translateLanguage(this.id);" title="العربية"><img class="img-lang" alt="bitminer china" src="image/language/chinese.png"></a></li>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script  src="asset/js/jquery-3.3.1.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<div id="google_translate_element" style="display: none">
</div>
<script type="text/javascript">
	function googleTranslateElementInit() {
		new google.translate.TranslateElement({ pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false }, 'google_translate_element');
	}
</script>
<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"
type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script>
	function translateLanguage(lang) {

		var $frame = $('.goog-te-menu-frame:first');
		if (!$frame.size()) {
			alert("Error: Could not find Google translate frame.");
			return false;
		}
		$frame.contents().find('.goog-te-menu2-item span.text:contains(' + lang + ')').get(0).click();
		return false;
	}
</script>
<script  src="asset/js/flipclock.js" type="text/javascript" ></script>

<script src="js/index.js" type="text/javascript" rel="javascript"></script>
<script src="asset/counter/jquery.countTo.js" type="text/javascript" rel="javascript"></script>

<script>
	var Tawk_API=Tawk_API||{};

	Tawk_API.visitor = {
		name  : " ",
		email : ""
	};
	var Tawk_LoadStart=new Date();
	(function(){
		var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
		s1.async=true;
		s1.src='https://embed.tawk.to/5b40b0b66d961556373d7f0d/default';
		s1.charset='UTF-8';
		s1.setAttribute('crossorigin','*');
		s0.parentNode.insertBefore(s1,s0);
	})();
</script>
</body>
</html>
