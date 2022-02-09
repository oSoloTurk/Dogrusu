function setCookie(cname, cvalue) {
    var d = new Date();
    d.setTime(d.getTime() + (365 * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }

function languageswap(event){
    setCookie("language", this.value);
    window.location.reload()
}

var buttons = document.getElementsByClassName("language");
for (i = 0; i < buttons.length; i++) {
    buttons[i].onclick = languageswap;
}