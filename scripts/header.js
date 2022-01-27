var url = window.location.pathname;
var headerTab = $("#"+ url.substring(url.lastIndexOf('/')+1).replace(".php", ""));
if(headerTab != null) {
    headerTab.addClass("active");
}