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
function removeParam(parameter) {
    var url=document.location.href;
    var urlparts= url.split('?');

    if (urlparts.length>=2)
    {
    var urlBase=urlparts.shift(); 
    var queryString=urlparts.join("?"); 

    var prefix = encodeURIComponent(parameter)+'=';
    var pars = queryString.split(/[&;]/g);
    for (var i= pars.length; i-->0;)               
        if (pars[i].lastIndexOf(prefix, 0)!==-1)   
            pars.splice(i, 1);
    url = urlBase+'?'+pars.join('&');
    window.history.pushState('',document.title,url);

    }
    return url;
}

var params = getSearchParameters();
//TODO: convert defination on the child js per page
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
        case "session-out":
            swal({
                title: "Oops",
                text: "Oturumunun süresi dolmuş gözüküyor yeniden giriş yapmalısın!",
                icon: "error",
            });   
            break;
        case "logout":
            swal({
                title: "Bekliyoruz",
                text: "Başarıyla çıkış yaptın, Tekrar gelmen için bekliyoruz.",
                icon: "success",
            });   
            break;
        case "already-have":
            swal({
                title: "Bu yolculuk çoktan başladı",
                text: "Bu kelimenin anlamını bulmak için yolculuğa daha önce başladık, hemen katkı sunabilmen için yönlendiriyoruz.",
                icon: "warning",
            });   
            break;
    }
    removeParam("msg");
}