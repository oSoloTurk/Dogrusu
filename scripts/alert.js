function getSearchParameters() {
    var prmstr = window.location.search.substr(1);
    return prmstr != null && prmstr != "" ? transformToAssocArray(prmstr) : {};
}

function transformToAssocArray( prmstr ) {
    var params = {};
    var prmarr = prmstr.split("&");
    for ( var i = 0; i < prmarr.length; i++) {
        var tmparr = prmarr[i].split("=");
        params[tmparr[0]] = tmparr[1];
    }
    return params;
}

var params = getSearchParameters();

if(params["msg"] != null){
    switch(params["msg"]) {
        case "already-registered":
            swal({
                title: "Üzgünüz",
                text: "Daha önce aramıza katılmış gözüküyorsun, giriş yapmaya ne dersin?",
                icon: "warning",
                dangerMode: true,
            });   
            break; 
        case "success-registered":
            swal({
                title: "Tebrikler",
                text: "Başarıyla kayıt oldun!",
                icon: "success",
            });   
            break; 
<<<<<<< Updated upstream
=======
        case "logged":
            swal({
                title: "Tebrikler",
                text: "Başarıyla giriş yaptın!",
                icon: "success",
            });   
            break; 
        case "wrong_input":
            swal({
                title: "Hmm",
                text: "Girdiğin bazı bilgiler yanlış!",
                icon: "error",
            });   
            break; 
>>>>>>> Stashed changes
    }
}