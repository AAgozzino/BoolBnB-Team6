$(document).ready(function(){
    mouseBtnGrad();
    hoverInfo();
    hambMenu();
  
    var pwTitle = $(this).text();
    console.log(pwTitle);
    var textCropped = cropText(pwTitle, 15);
    console.log(textCropped);
    pwTitle = textCropped
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
function cropText(text, num) {
    // If text shorter than fixed character number
    if (text.length <= num) {
      return text
    }else {
      // Slice text
      var subText = text.substr(0, num-1);
      return subText.substr(0, subText.lastIndexOf(" ")) + " ..."
    }
  };