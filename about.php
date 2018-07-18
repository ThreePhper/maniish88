<?php
require_once 'header.php';
?>
<style>
.abtvideo{
	margin-top: 20px;
	padding-bottom: 27% !important;
}
/* Extra small devices (phones, 600px and down) */
@media only screen and (max-width: 600px) {
	.abtvideo{
		padding-bottom: 53% !important;
	    margin-left: 10px;
    	width: 94.5%;
	}
}

/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (min-width: 600px) {
	.abtvideo{
		margin-left: 10px;
		width: 48%;
	}
}

/* Medium devices (landscape tablets, 768px and up) */
@media only screen and (min-width: 768px) {...}

@media (min-width:800px) and (max-width:985px) {
	#for-985px {
	    width: 50%;
	    padding-left: 10px;
	}
}

/* Large devices (laptops/desktops, 992px and up) */
@media only screen and (min-width: 992px) {...}

/* Extra large devices (large laptops and desktops, 1200px and up) */
@media only screen and (min-width: 1200px) {...}
</style>
<div class="navi-bar">
	<div class="container custom-container">
		<div class="navi-bar-list">
			<h5>
				<strong>
					<a href="index.php">Home</a>&nbsp;&nbsp;
					/&nbsp;&nbsp;

					<a>About us</a>
				</strong>
			</h5>
		</div>
		<div class="navi-title">
			<p>
				<strong>About us</strong>
			</p>
		</div>
	</div>
</div>
<div class="container custom-container">
	<div class="row custom_10_margin_top">
		<div class="col-md-6 col-sm-6 col-xs-12 embed-responsive embed-responsive-16by9 abtvideo"  id="about_us_first_img">
			<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/nbNBwoa4Z4Y?autoplay=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
		</div>
		<div class="about col-md-6 col-sm-6 col-xs-12" id="about_us_first_div">
			<p>Bitcoin mining is a peer-to-peer computer process used to secure and verify bitcoin transactions - payments from one user to another on a decentralized network. Mining involves adding bitcoin transaction data to bitcoin's global public ledger of past transactions. Each group of transactions is called a block. Blocks are secured by bitcoin miners and build on top of each other forming a chain. This ledger of past transactions is called the blockchain.</p>
		</div>
		<div class="about col-lg-6 col-md-6 col-sm-12 col-xs-12" id="for-985px">
			<p>The blockchain serves to confirm transactions to the rest of the network as having taken place. Bitcoin nodes use the blockchain to distinguish legitimate bitcoin transactions from attempts to re-spend coins that have already been spent elsewhere.</p>
		</div>
		<div class="about col-lg-6 col-md-12 col-sm-12 col-xs-12">
			<p>Mining is the process by which new bitcoins are created and transactions are sent across the network. Both the people who engage in it and the devices that are used for mining are called miners.
			</p>

		</div>
		<div class="about col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<p>
				In the process of mining, the miners computers perform the so-called "hashing", producing proof-of-work - they take a series of randomly generated input data strings and apply a specific cryptographic function to it (SHA-256 in bitcoin's case).
			</p>
		</div>
		<div class="about col-md-12 col-xs-12">
			<p> The result of each calculation will always be the same "hash", unique to any particular input, but its exact value cannot be predicted until the actual calculation is performed.</p>
			<p>The network has an overall "target" value, and as soon as any miner gets a hash which is equal to or lower than the target, they get to register all the transactions which took place on the network since the last "hit", package them into a block, add it to the end of the blockchain, and credit a specific amount of bitcoins to their own account (these bitcoins are created "out of nothing" to reward the miner for the time and electricity they spent on cracking hashes). Initially, any person could use their PC to download a bitcoin client and start mining bitcoins. They still can, but by now it is economically infeasible, as the mining industry is dominated by ASICs - highly efficient machines developed specifically for the purpose of mining bitcoin.</p>
			<p>The primary purpose of mining is to allow bitcoin nodes to reach a secure, tamper-resistant consensus. Mining is also the mechanism used to introduce bitcoins into the system. Miners are paid transaction fees as well as a subsidy of newly created coins called block rewards. This both serves the purpose of disseminating new coins in a decentralized manner as well as motivating people to provide security for the system through mining.</p>
			<p>Cloud Hashing was made by professionals for individuals who want to get involved in bitcoin mining. We believe that everyone should benefit from the mining and be able to have access the newest technologies and large scale industrial data centers from your laptop or mobile phone.</p>
			<p>The cloud hashing team has been involved in a mining business since 2014. We constantly explore the bitcoin market and we want to share our knowledge with you.</p>
			<p>To learn more about our advantages, please see
				<a href="work.php" id="work_link">
					<font class="orange_font">How It Works.</font>
				</a>
			</p>
		</div>
        <div class="text-center">
            <div class="col-md-offset-1 col-md-10">
                <h1 class="tall">Cloud Hashing was made by professionals for individuals who want to get involved in bitcoin
                    mining</h1>
                <p class="default-p">We believe that everyone should benefit from the mining and be able to have access
                    the newest technologies and large scale industrial data centers from your laptop or mobile
                    phone.</p>
                <a href="signup.php" class="btn btn-warning top-banner-button margin-top-40">Join Us</a>
            </div>
        </div>
		<!-- <div class="col-md-12 col-xs-12">
			<p class="feature">OUR FEATURES</p>
			<div class="col-md-2 col-sm-2 col-xs-2"></div>
			<div class="col-md-2 col-sm-2 col-xs-2"></div>
			<div class="col-md-4 col-sm-4 col-xs-4">
				<div class="col-md-4 col-sm-4 col-xs-4"></div>
				<div class="col-md-4 col-sm-4 col-xs-4 under-line"></div>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2"></div>
			<div class="col-md-2 col-sm-2 col-xs-2"></div>
		</div>
		<div class="col-md-12 col-xs-12 gifimg">
			<img src="image/video-will-be-available-more_cor2.gif" class="img-responsive" alt="Bitminer features">
		</div> -->
	</div>


	<div class="row certi">
		<div class="col-md-12 col-xs-12">
			<p class="feature">OUR CERTIFICATES</p>
			<div class="col-md-2 col-sm-2 col-xs-2"></div>
			<div class="col-md-2 col-sm-2 col-xs-2"></div>
			<div class="col-md-4 col-sm-4 col-xs-4">
				<div class="col-md-4 col-sm-4 col-xs-4"></div>
				<div class="col-md-4 col-sm-4 col-xs-4 under-line"></div>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2"></div>
			<div class="col-md-2 col-sm-2 col-xs-2"></div>
		</div>
		<div class="col-md-12 col-xs-12 certificate" >
			<div class="col-md-2 col-sm-4 col-xs-6 about-us-certi-mul-img-div">
				<a href="https://beta.companieshouse.gov.uk" target="_blank">
					<img src="image/img-1-210x63.png" class="img-responsive" alt="Cloud Hashing">
				</a>
			</div>
			<div class="col-md-2 col-sm-4 col-xs-6 about-us-certi-mul-img-div">
				<a href="https://www.sitelock.com/" target="_blank">
					<img src="image/img2-210x63.png" class="img-responsive" alt="Cloud Hashing">
				</a>
			</div>
			<div class="col-md-2 col-sm-4 col-xs-6 about-us-certi-mul-img-div">
				<a href="https://www.codeguard.com/" target="_blank">
					<img src="image/img3-210x63.png" class="img-responsive" alt="Cloud Hashing">
				</a>
			</div>
			<div class="col-md-2 col-sm-4 col-xs-6 about-us-certi-mul-img-div">
				<a href="https://ssl.comodo.com/" target="_blank">
					<img src="image/img4-210x63.png" class="img-responsive" alt="Cloud Hashing">
				</a>
			</div>
			<div class="col-md-2 col-sm-4 col-xs-6 about-us-certi-mul-img-div" >
				<a href="https://www.cloudflare.com/ddos/" target="_blank">
					<img src="image/img-5-210x63.png" class="img-responsive" alt="Cloud Hashing">
				</a>
			</div>
		</div>
	</div>
</div>
<?php
require_once 'footer.php';
?>
<script>
	$('li').removeClass('active');
	$('.about_menu').addClass('active');
</script>