if (document.URL.includes("login")) {
    $('#navbarSupportedContent').hide();
    $('#main-cover').hide();
}

if (document.URL.includes("reset")) {
    $('#navbarSupportedContent').hide();
    $('#main-cover').hide();
}

if (document.URL.includes("register")) {
    $('#navbarSupportedContent').hide();
    $('#main-cover h1').html('Registrati adesso!');
}

if (document.URL.includes("create")) {
    $('.add_input_search').remove();
    $('#main-cover').hide();
}

if (document.URL.includes("edit")) {
    $('.add_input_search').remove();
    $('#main-cover').hide();
}

if (document.URL.includes("/houses")) {
    $('#main-cover').hide();
}

if (document.URL.includes("/messages")) {
    $('#main-cover').hide();
}

if (document.URL.includes("houses/search")) {
    $('.add_input_search').remove();
    $('#main-cover').hide();
}
