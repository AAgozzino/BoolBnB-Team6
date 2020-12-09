$(document).ready(function(){
    mouseBtnGrad();
    hoverInfo();
    hambMenu();
    viewMsg();
    
});



// FUNCTIONS

// function gradient hover
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
    $('.hambrg_menu .navbar_nav').hide(); 
    $(document).on('click', '.hamb_icon', function(){   
        if ($(window).width() < 768 ){
            $('.hambrg_menu .navbar_nav').slideToggle();
        }
    });
}

// function hover welcome_name
function hoverInfo() {
    $(document).on('mouseenter', '.welcome_name', function() {
        $('.tend_menu').slideToggle();
    });
}

// function crop text
function viewMsg() {
    $('.msg_uniq').click(function(){
        var houseId = $(this).children('small').html();
        var emailUser = $(this).children('h5').html();
        var contentMail = $(this).children('p').html();

        $('.msg_show').removeClass('d_none');
        $('.msg_show').find('h3').html(houseId);
        $('.msg_show').find('small').html(emailUser);
        $('.msg_show').find('p').html(contentMail);
    });
}