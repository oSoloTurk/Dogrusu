$(document).ready(function() { 
    $('input[type=radio][name=correctPicker]').change(function() {
        $('#form-control-' + this.id).addClass("bordered");
    });
    $.ajax(
        {
            url: "https://sozluk.gov.tr/gts?ara=" + $("#word").text(),
            success: function(response){
                var meanElement = "<ol>"
                responseJson = JSON.parse(response);
                responseJson[0]["anlamlarListe"].forEach(element => {
                    meanElement += "<li> " + element["anlam"] + "</li>";
                });
                meanElement += "</ol>";
                $("#meanings").append(meanElement);
            },
            
        });
 });
