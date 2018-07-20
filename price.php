<?php
require_once('header.php');
?>
<link rel="stylesheet" href="css_live/style_front_1680.css" type="text/css">
<link rel="stylesheet" href="css_live/front.css" type="text/css">

<div class="navi-bar">
    <div class="container custom-container">
        <div class="navi-bar-list">
            <h5>
                <strong>
                    <a href="index.php">Home</a>&nbsp;&nbsp; /&nbsp;&nbsp;

                    <a>Pricing</a>
                </strong>
            </h5>
        </div>
        <div class="navi-title">
            <p>
                <strong>Pricing</strong>
            </p>
        </div>
    </div>
</div>
<div class="container">
	<div class="tariffs-wrapper j-tariffs-wrapper">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bodyblock hidden-sm hidden-xs">
				<div class="body">
					THE NEW ECONOMY IS NOW. ARE YOU READY?
				</div>
				<p>
					Ready for the new economy? It's here. It's now. And you can be part of it with cloud hashing.
				</p>
				<div class="pageblock">
					PICK THE PACKAGE THAT'S RIGHT FOR YOU
				</div>
			</div>
		</div>
	    <div class="row">
	        <div class="col-sm-6 col-sm-offset-3 ">
	            <div class="panel panel-primary panel-contract">
	                <div class="panel-heading text-center">
	                    <span>1 years (12 Months) contract</span>
	                </div>
	                <div class="panel-body">
	                    <form class="tariff-block tariff-custom" action="/contract/new" method="POST" contract-type="lifetime">
	                        <input type="hidden" name="type" value="lifetime">
	                        <input type="hidden" name="ghs" value="100" class="j-custom-tariff-input">
                            <div class="widget-big-price-wrapper">
                                <div class="widget-big-price-wrapper-currency j-widget-big-price-wrapper-currency">USD</div>
                                <div class="widget-big-price-wrapper-value j-widget-big-price-wrapper-value">12.50</div>
                            </div>
                            <div class="clearfix tariff-block-blue-text">
                                <div class="bc-label">
                                    <ul class="tariff-block-currency-list">
                                        <li>
                                            <input type="radio" name="currency" id="custom-tariff-currency-BTC-HASH(0x8d5bc90)" value="BTC">
                                            <label for="custom-tariff-currency-BTC-HASH(0x8d5bc90)">
                                                BTC
                                                <span class="j-custom-tariff-price-span" currency="BTC">0.0016896</span>
                                                <div class="custom-tariff-currency-check"></div>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" checked="" name="currency" id="custom-tariff-currency-USD-HASH(0x8d5bc90)" value="USD">
                                            <label for="custom-tariff-currency-USD-HASH(0x8d5bc90)">
                                                USD
                                                <span class="j-custom-tariff-price-span" currency="USD">12.50</span>
                                                <div class="custom-tariff-currency-check"></div>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="radio" name="currency" id="custom-tariff-currency-EUR-HASH(0x8d5bc90)" value="EUR">
                                            <label for="custom-tariff-currency-EUR-HASH(0x8d5bc90)">
                                                EUR
                                                <span class="j-custom-tariff-price-span" currency="EUR">10.70</span>
                                                <div class="custom-tariff-currency-check"></div>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <p class="f12 text-center light_gray clearfix"><small>one-time payment</small></p>
                            <div class="bc-input-wrapper bc-input-wrapper-blue widget-ghs-wrapper">
                                <input name="bc-power" class="bc-input j-custom-tariff-power-new" value="100 GH/s">
                                <div class="bc-input-steps">
                                    <div class="bc-input-step bc-input-step-up" step="100"></div>
                                    <div class="bc-input-step bc-input-step-down" step="-100"></div>
                                </div>
                            </div>
                            <div class="text-center">
                                <div class="widget-available-hashpower">Limited Offer <b class="hidden">48796300 GH/s</b></div>
                            </div>
                            <div class="tariff-block-label-wapper clearfix">
                                <div class="bc-label pull-left"><span>Maintenance</span> <span class="j-widget-label-tooltip fa fa-question-circle" data-toggle="tooltip" data-placement="right" title="" data-original-title="Paid automatically from daily mined BTC volume"></span></div>
                                <div class="bc-label pull-right"><span class="red maintenance-old">$0.00033</span> $0.00017 per GH/s per day</div>
                            </div>
                            <div class="tariff-block-divider"></div>
                            <div class="tariff-block-label-wapper clearfix">
                                <div class="bc-label pull-left">Amount of hosts</div>
                                <div class="bc-label pull-right"><span class="j-custom-tariff-hosts-amount-span">1</span></div>
                            </div>
                            <div class="tariff-block-divider"></div>
                            <div class="tariff-block-label-wapper clearfix">
                                <div class="bc-label pull-left">Delivery date <span class="j-widget-label-tooltip fa fa-question-circle" data-toggle="tooltip" data-placement="right" title="" data-original-title="Delivery date – a date when the mining contract gets activated"></span></div>
                                <div class="bc-label pull-right">Instantly</div>
                            </div>
                            <div class="tariff-block-divider"></div>
                            <div class="tariff-block-label-wapper clearfix">
                                <div class="bc-label pull-left">Contract type</div>
                                <div class="bc-label pull-right">
                                            1 years (12 Months) 
                                </div>
                            </div>
                            <div class="tariff-block-button-wrapper text-center">
                                <a href="signup.php" target="_self" class="btn btn-lg btn-success">Buy</a>
                            </div>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>
<script>
$(function() {
	var minHosts = 1,
	    convertMultiplier = 1000,
	    ghsPerHost = 100;

	var pricePerThs = {},
	    maxHosts = {};
	maxHosts["lifetime"] = 10000;
	pricePerThs["lifetime"] = {};
	pricePerThs["lifetime"]["BTC"] = 0.01703253;
	pricePerThs["lifetime"]["USD"] = 125;
	pricePerThs["lifetime"]["EUR"] = 107;
	recalcCustomTariffValues(minHosts, $('form[contract-type="lifetime"]'));

	function formatCurrency(total, currency) {
		var decimalPoints = 2;
		if (currency === 'BTC') {
			decimalPoints = 8;
		}
	    if(total < 0) {
	        total = Math.abs(total);
	    }
	    return parseFloat(total, 10).toFixed(decimalPoints).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString();
	}
	function recalcCustomTariffValues(hostsAmount, $form) {
	    var $context = $form || $('.j-tariffs-wrapper'),
	        contractType = $form.attr('contract-type');
	    $context.find('.j-custom-tariff-input').val(hostsAmount * ghsPerHost);
	    $context.find('.j-custom-tariff-hosts-amount').val(hostsAmount);
	    $context.find('.j-custom-tariff-hosts-amount-span').text(hostsAmount);
	    $context.find('.j-custom-tariff-power').val(hostsAmount * ghsPerHost);
	    var currency = $context.find('.j-trade-currency').find(":selected").val();
	    $context.find('.j-custom-tariff-price').val( formatCurrency(hostsAmount * pricePerThs[contractType][currency] * ghsPerHost / 1000, currency) );
	    $.each(pricePerThs[contractType], function(currency, price) {
	        var $priceElement = $context.find('.j-custom-tariff-price-span[currency="'+currency+'"]');
	        if ($priceElement) {
	            $priceElement.text( formatCurrency(hostsAmount * price * ghsPerHost / 1000, currency) );
	//            $priceElement.text('--.--');
	        }
	    });
	    $context.find('.j-custom-tariff-power-new').val((hostsAmount * ghsPerHost) + ' GH/s');

	    // big price
	    var curr = $context.find('[name="currency"]:checked').val();
	    $context.find('.j-widget-big-price-wrapper-currency').text(curr);
	    $context.find('.j-widget-big-price-wrapper-value').text( formatCurrency(hostsAmount * pricePerThs[contractType][curr] * ghsPerHost / 1000, curr) );
	    // $context.find('.j-widget-big-price-wrapper-value-old').text( formatCurrency(hostsAmount * pricePerThs['DEFAULT'][curr] * ghsPerHost / 1000, curr) );

	//    $context.find('.j-widget-big-price-wrapper-value').text('--.--');
	//    $context.find('.j-widget-big-price-wrapper-value-old').text('--.--');
	}

	$('.j-custom-tariff-hosts-amount').on('change', function(){
	    var value = $(this).val(),
	        hostsAmount = extractAmount(value, $(this).closest('form'));

	    recalcCustomTariffValues(hostsAmount, $(this).closest('form'));
	});

	$('.j-custom-tariff-power').on('change', function(){
	    var value = $(this).val(),
	        hostsAmount = extractAmount((parseInt(value) || ghsPerHost) / ghsPerHost, $(this).closest('form'));

	    recalcCustomTariffValues(hostsAmount, $(this).closest('form'));
	});

	$('.j-custom-tariff-price').on('change', function(){
	    var value = $(this).val(),
	        k = pricePerThs[$('.j-trade-currency').find(":selected").val()] * ghsPerHost / 1000,
	        hostsAmount = extractAmount((value || k) / k, $(this).closest('form'));

	    recalcCustomTariffValues(hostsAmount, $(this).closest('form'));
	});

	$('.j-trade-currency').on('change', function(){
	    recalcCustomTariffValues($('.j-custom-tariff-hosts-amount').val(), $(this).closest('form'));
	});

	$('.j-custom-tariff-power-new').on('change', function(){
	    var value = $(this).val(),
	        hostsAmount = extractAmount((parseInt(value) || ghsPerHost) / ghsPerHost, $(this).closest('form'));

	    recalcCustomTariffValues(hostsAmount, $(this).closest('form'));
	});

	function extractAmount(value, $form) {
	    var contractType = $form.attr('contract-type');
	    return Math.max(minHosts, Math.min(maxHosts[contractType], (parseInt(value) || 1)))
	}

	$('.bc-input-step').on('click', function(){
	    var step = parseInt($(this).attr('step')) || 0,
	        $input = $(this).closest('.bc-input-wrapper').find('.bc-input');

	    $input.val(parseFloat($input.val()) + step).change();
	});

	$('.tariffs-wrapper [name="currency"]').on('change', function() {
	    $(this).closest('form').find('.j-custom-tariff-power-new').change();
	});

	// $('.j-widget-label-tooltip[data-toggle="tooltip"]').tooltip();

	$('.j-new-price-open').on('click', function() { $('.j-new-price-wrapper').addClass('opened'); return false; });
	$('.j-new-price-close').on('click', function() { $('.j-new-price-wrapper').removeClass('opened'); return false; });
});
</script>


<div class="container custom-container" style="margin-bottom:50px;">
    <br>
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 col-tablet-12">
            <h2 class="cuspriceh2">Contract Information</h2>
            <br>
            <h4 class="cuspriceh3">Bitcoin Mining Cloud Services</h4>
            <p class="cuspriceinfo text-left">Bitcoin is the first open-source, decentralized and currently most popular cryptocurrency. Bitcoin mining is
                done with specialized ASIC-Hardware utilizing the SHA-256 algorithm. You can mine bitcoin and bitcoin Cash
                natively. You can also receive litecoin, ethereum, ripple and other cryptocurrencies for your output using
                the AUTO-Mining allocation feature in our dashboard.</p>
            <div class="row">
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
                    <img src="image/clock.png">
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                    <h4 style="margin-top:1px;" class="cuspriceh4">Contract Term</h4>
                    <p class="cusparadetail"> 1 years (12 Months) of continuous mining</p>
                    <p class="cusparadetail"> Your mining services will run for 1 year, period - even in cases where your daily mining output falls
                        below the maintenance fees. This way, you will always have the potential to produce cryptocurrencies
                        as market conditions improve.</p>
                    <p class="cusparadetail"> The daily mining outputs are variable and are determined by three factors: the mining difficulty, the
                        bitcoin vs USD exchange rates and the maintenance fees (these include all electricity, cooling, development,
                        and servicing costs). We cannot control the first two factors which are unpredictable but we do always
                        deploy state of the art mining technology and do our best to keep our data centers running at their
                        maximum capability for you. You can find more in-depth information in our customer service center.</p>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>
            </div>

            <div class="row">
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
                    <img src="image/tool.png">
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                    <h4 style="margin-top:1px;" class="cuspriceh4">Maintenance fee</h4>
                    <p class="cusparadetail"> A fixed maintenance fee is deducted from all 1 year contracts for their full runtime. Current maintenance
                        fees: USD 0.14 per TH/s per day. Please note that the fee is fixed in USD but deducted from the daily
                        payouts in BTC. Please refer to the terms of service for further details.</p>
                </div>
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>
            </div>
        </div>

        <div class="col-tablet-2"></div>
        <div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-1 col-tablet-8 cusreview">
            <section class="cusreview-inner">
                <span class="cusreviewh3"> Reviews</span>
                <br>
                <br>
                <br>
                <br>
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators" style="left: 90%;">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            The mining program meets my expectation and I am hoping to invest more in the future with other plans.
                            <div class="ratings">
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <br>
                                <p>Clemente G.
                                    <br>
                                    <small>published on 24th July, 2018</small>
                                </p>
                            </div>
                        </div>
                        <div class="item">
                            I think it is a very good investment to work with cloud hashing.
                            <div class="ratings">
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <br>
                                <p>Brad Mugford
                                    <br>
                                    <small>published on 24th July, 2018</small>
                                </p>
                            </div>
                        </div>
                        <div class="item">
                            I am greatful to be with a cloud hashing.
                            <div class="ratings">
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <span class="glyphicon glyphicon-star"></span>
                                <br>
                                <p>Marc Gaines
                                    <br>
                                    <small>published on 24th July, 2018</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div id="gm-pricing-2">
    <div id="gm-pricing-2-top">
        <article class="container custom-container">
            <section class="row">
            	<div class="col-md-12">
            		<h2>Bitcoin Mining Cost and Benefits Comparison Chart</h2>
                	<p>A chart to compare the costs and benefits of having your own hardware to having a contract with Cloud Hashing</p>
            	</div>
            </section>
        </article>
    </div>


    <div id="gm-pricing-2-bottom">
        <article class="container custom-container">
            <section class="row">
                <div class="col-sm-12 col-md-10 col-md-offset-1">
                    <div class="table-responsive trans-usr">
                        <table class="table table-condensed table-hover">
                            <thead>
                            <tr>
                                <th class="gmp2-1">Costs of a contract with Cloud Hashing</th>
                                <th class="gmp2-2">Costs and externalities of having your own hardware</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td data-label="Costs of a contract with Cloud Hashing" class="gmp2-1"><span>One-time price of purchasing the contract                                        <i class="fa fa-check"></i></span></td>
                                <td data-label="Costs and externalities of having your own hardware" class="gmp2-2"><span>Price of the hardware <i class="fa fa-times"></i></span></td>
                            </tr>
                            <tr>
                                <td data-label="Costs of a contract with Cloud Hashing" class="gmp2-1"><span>No extra fee <i class="fa fa-check"></i></span></td>
                                <td data-label="Costs and externalities of having your own hardware" class="gmp2-2"><span>Shipping costs <i class="fa fa-times"></i></span>
                                </td>
                            </tr>
                            <tr>
                                <td data-label="Costs of a contract with Cloud Hashing" class="gmp2-1"><span>No extra fee <i class="fa fa-check"></i></span></td>
                                <td data-label="Costs and externalities of having your own hardware" class="gmp2-2"><span>Possible customs costs <i class="fa fa-times"></i></span></td>
                            </tr>
                            <tr>
                                <td data-label="Costs of a contract with Cloud Hashing" class="gmp2-1">
                                    <span>Best electricity rates possible. 100% green energy <i class="fa fa-check"></i></span></td>
                                <td data-label="Costs and externalities of having your own hardware" class="gmp2-2"><span>Usually high electricity rates <i class="fa fa-times"></i></span></td>
                            </tr>
                            <tr>
                                <td data-label="Costs of a contract with Cloud Hashing" class="gmp2-1"><span>You start mining immediately! <i class="fa fa-check"></i></span></td>
                                <td data-label="Costs and externalities of having your own hardware" class="gmp2-2">
                                    <span>Waiting for delivery - you are losing days,even weeks of mining time, and your purchased hardware is already losing its value                                        <i class="fa fa-times"></i></span></td>
                            </tr>
                            <tr>
                                <td data-label="Costs of a contract with Cloud Hashing" class="gmp2-1">
                                    <span>We guarantee 100% uptime and cover system downtimes by using our own miners.                                        <i class="fa fa-check"></i></span></td>
                                <td data-label="Costs and externalities of having your own hardware" class="gmp2-2">
                                    <span>Loss of mining time due to system downtimes <i class="fa fa-times"></i></span></td>
                            </tr>
                            <tr>
                                <td data-label="Costs of a contract with Cloud Hashing" class="gmp2-1"><span>No extra fee <i class="fa fa-check"></i></span></td>
                                <td data-label="Costs and externalities of having your own hardware" class="gmp2-2"><span>Cost of additional equipment <i class="fa fa-times"></i></span></td>
                            </tr>
                            <tr>
                                <td data-label="Costs of a contract with Cloud Hashing" class="gmp2-1"><span>No extra fee <i class="fa fa-check"></i></span></td>
                                <td data-label="Costs and externalities of having your own hardware" class="gmp2-2">
                                    <span>Electricity consumption of additional equipment <i class="fa fa-times"></i></span></td>
                            </tr>
                            <tr>
                                <td data-label="Costs of a contract with Cloud Hashing" class="gmp2-1"><span>No extra fee <i class="fa fa-check"></i></span></td>
                                <td data-label="Costs and externalities of having your own hardware" class="gmp2-2"><span>Cost of cooling <i class="fa fa-times"></i></span></td>
                            </tr>
                            <tr>
                                <td data-label="Costs of a contract with Cloud Hashing" class="gmp2-1">
                                    <span>Hardware is at a remote location, you are exempt from excessive heat                                        <i class="fa fa-check"></i></span></td>
                                <td data-label="Costs and externalities of having your own hardware" class="gmp2-2"><span>Excessive heat <i class="fa fa-times"></i></span>
                                </td>
                            </tr>
                            <tr>
                                <td data-label="Costs of a contract with Cloud Hashing" class="gmp2-1">
                                    <span>Hardware is at a remote location, you don’t have to deal with loud noise                                        <i class="fa fa-check"></i></span></td>
                                <td data-label="Costs and externalities of having your own hardware" class="gmp2-2"><span>Loud noise <i class="fa fa-times"></i></span></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </article>
    </div>
</div>
<div class="clearfix"></div>
<?php
    require_once('footer.php');
?>
<script>
    $('li').removeClass('active');
    $('.price_menu').addClass('active');
</script>