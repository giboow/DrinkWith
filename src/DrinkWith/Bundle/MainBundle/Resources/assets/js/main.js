$(document).ready(function(){
    $("#overlay").overlay({
        mask: '#000',
    });
    $('.urlLink').urlLink();
    $('.urlLinkAjax').urlLink({
        callback : function(url){
            $.ajax({
                url: url
            }).done(function(response){
                $("#overlayContent").html(response);
                $("#overlay").overlay().load();
            });
        }
    });
});
