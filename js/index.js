//faq toggle stuff 


$(window).resize(function() {
        var mobileWidth =  (window.innerWidth > 0) ? 
                            window.innerWidth : 
                            screen.width;
        var viewport = (mobileWidth > 320) ?
                        'width=device-width, initial-scale=1.0' :
                        'width=1200';
        $("meta[name=viewport]").attr('content', viewport);
    }).resize(); 



// Load and Resize function
$(window).bind("load resize", function() {
    equalheight('.choose-box-text');
    equalheight('.injectable-section .inject_subSection');
});


$( document ).ready(function() {
    $(".menu-bar").click(function(){
        $(".menu").addClass('menuOpen');
    });
    $(".closeBtn").click(function(){
        $(".menu").removeClass('menuOpen');
    });
});
$('.togglefaq').click(function(e) {
		e.preventDefault();
		var notthis = $('.active').not(this);
		notthis.find('.icon-minus').addClass('icon-plus').removeClass('icon-minus');
		notthis.toggleClass('active').next('.faqanswer').slideToggle(300);
 		$(this).toggleClass('active').next().slideToggle("fast");
		$(this).children('i').toggleClass('icon-plus icon-minus');
});
/*function for equal height*/
equalheight = function(container) {

    var currentTallest = 0,
        currentRowStart = 0,
        rowDivs = new Array(),
        $el,
        topPosition = 0;
    $(container).each(function() {

        $el = $(this);
        $($el).height('auto')
        topPostion = $el.position().top;

        if (currentRowStart != topPostion) {
            for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
                rowDivs[currentDiv].height(currentTallest);
            }
            rowDivs.length = 0; // empty the array
            currentRowStart = topPostion;
            currentTallest = $el.height();
            rowDivs.push($el);
        } else {
            rowDivs.push($el);
            currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
        }
        for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
            rowDivs[currentDiv].height(currentTallest);
        }
    });
}