$(document).ready(function(){
    $("#overlay").overlay({
        mask: '#000',
    });
    overlayLoad($("#btJoin"), 'click');
    overlayLoad($("#btLogin"), 'click');
});


function overlayLoad(element, bindType) {
    element.bind(bindType, function(){
        var url = element.attr('rel');
        if (url) {
            $.ajax({
                url: url
            }).done(function(response){
                $("#overlayContent").html(response);
                $("#overlay").overlay().load();
            });
        };
    });
}