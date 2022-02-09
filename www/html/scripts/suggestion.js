$(document).ready(function() { 
    $("#check").click(function () {
        tdkQuery($('#word').val());
        setTimeout(function(){ 
            if($('#word').val() == "") {
                $("#description").attr("disabled", "");
            } else {
                $("#description").removeAttr("disabled");
            }
        }, 1000);  
   });
 });