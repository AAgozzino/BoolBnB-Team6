$(document).ready(function(){
    mouseBtnGrad();
    hambMenu();

  
});

// FUNCTIONS
function mouseBtnGrad () {
    $('.index_search_btn').mousemove(function(event) {
        btnWidth = $(this).width();
        btnHeight = $(this).height();
        
        mouseXpercentage = Math.round(event.pageX / btnWidth * 100);
        mouseYpercentage = Math.round(event.pageY / btnHeight * 100);
        
        $('.index_search_btn').css('background', 'radial-gradient(at ' + mouseXpercentage + '% ' + mouseYpercentage + '%, rgba(254,222,161,1), rgba(186,81,96,1))');
      });
}

// function hamburger button
function hambMenu() {
    $(window).resize(function(){     
        if ($(window).width() < 992 ){
            $('#navbarSupportedContent .navbar-nav.auth_list').hide();
            $('.hambrg_menu').show();
            $('.hambrg_menu .navbar_nav').hide();
        } else {
            $('#navbarSupportedContent .navbar-nav.auth_list').show();
            $('.hambrg_menu').hide();
        }

        $('.hamb_icon').click(function() {
                $('.hambrg_menu .navbar_nav').toggle();
        });
    });
}