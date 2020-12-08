$("#open-modal").click(function(e){
    $("#modal-delete").show();
});

$(".modal-close").click(function(e){
    close();
});

function close(){
    $("#modal-delete").hide();
}