$("#open-modal").click(function(e){
    $("#modal-delete").show();
});

$(".modal-close").click(function(e){
    close();
});

function close(){
    $("#modal-delete").hide();
}

//modale messages
$('.snd_msg_dv').click(function() {
    $("#modal-send_msg").show();
});

$(".modal-close").click(function(e){
    closeMsg();
});

function closeMsg(){
    $("#modal-send_msg").hide();
}