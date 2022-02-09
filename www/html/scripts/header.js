var url = window.location.pathname;
var tabName = url.substring(url.lastIndexOf('/')+1).replace(".php", "");
const extraHeaders = {
    "vote": "suggestions", 
    "suggestion": "suggestions"
};
var headerTab = $("#"+ extraHeaders[tabName] ?? tabName);
console.log(headerTab)
if(headerTab != null) {
    headerTab.addClass("active");
}