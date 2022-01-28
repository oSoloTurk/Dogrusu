let tdkQuery = function(word) { 
    $.ajax(
        {
            url: "https://sozluk.gov.tr/gts?ara=" + word,
            success: function(response){
                let meanings = $("#meanings");
                var meanElement = "<ol>"
                responseJson = JSON.parse(response);
                if(responseJson["error"] != null) {
                    meanings.html("<i>Bu kelime için bir anlam bulamadık</i>");
                    meanings.attr("empty", "empty");
                    return false;
                }
                responseJson[0]["anlamlarListe"].forEach(element => {
                    meanElement += "<li> " + element["anlam"] + "</li>";
                });
                meanElement += "</ol>";
                meanings.html(meanElement);
                meanings.removeAttr("empty");
                return true;
            },
            
        })
 };