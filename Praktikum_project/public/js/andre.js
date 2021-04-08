$(document).ready(function(){

    $(".notification").click(function(){
        
        var x = $(".notification-content");
        if (x.css("display") == "none") {
            x.css("display", "block");
          } else {
            x.css("display", "none");
          }
    });

});