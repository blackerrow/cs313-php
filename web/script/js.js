//This moves the logo to the right about 250px
////$(document).ready(function(){
//    $("#topLogo").hover(function(){
//        $(this).animate({left: '250px'});
//        }, function(){
//        $(this).animate({left:'auto'});
//    });
//});
$(document).ready(function() {
        // grab the initial top offset of the navigation 
        var stickyNavTop = $('#top').offset().top;

        // our function that decides weather the navigation bar should have "fixed" css position or not.
        var stickyNav = function(){
            var scrollTop = $(window).scrollTop(); // our current vertical position from the top

            // if we've scrolled more than the navigation, change its position to fixed to stick to top,
            // otherwise change it back to relative
            if (scrollTop > stickyNavTop) { 
                $('#top').addClass('sticky');
            } else {
                $('#top').removeClass('sticky'); 
            }
        };

        stickyNav();
        // and run it again every time you scroll
        $(window).scroll(function() {
                stickyNav();
        });
});

