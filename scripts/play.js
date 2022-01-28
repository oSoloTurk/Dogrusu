$(document).ready(function() { 
    $('input[type=radio][name=correctPicker]').change(function() {
        $('#form-control-' + this.id).addClass("bordered");
    }); 
 });

 $(document).ready(tdkQuery($("#word").text()));
