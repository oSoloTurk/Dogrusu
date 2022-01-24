var toggleButton = document.getElementById("navbarButton");
var showingNavbar = false;
var navbar;

function navbarSwap() {
    if(navbar == null) navbar = document.getElementById("mobileNavbar")
    showingNavbar = !showingNavbar;
    if(showingNavbar) navbar.removeAttribute("style");
    else navbar.setAttribute("style", "visibility:hidden");
}