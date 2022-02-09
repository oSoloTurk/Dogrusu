$(document).ready(function() { 
    tdkQuery($('#word').text());
    setTimeout(function(){ 
        let meanings = $("#meanings");
        if(meanings.text()=="") {
            meanings.append("<o>TDK Sözlüğünde bu kelimeye dair bir anlam bulamadık</o>");
        }
    }, 1000);  
    var customSuggest = $("#custom_suggest");
    $("#custom_suggest").click(function() {
        setTimeout(function(target) {
            if(!target.checked) {
                $("#custom_suggestion").attr("disabled", "");
            } else {
                $("#custom_suggestion").removeAttr("disabled");
            }
        }, 10, this);
    });
    if($("meanings_empty") != null) {
        $("#custom_suggestion").removeAttr("disabled");
    }
 });