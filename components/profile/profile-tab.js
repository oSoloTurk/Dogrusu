/* Profile Page Fields */
var profile_phoneElement = document.getElementById("formGroupPhoneInput");
var profile_button = document.getElementById("btn-saveprofile");
var profile_error_phone = document.getElementById("vld-profile-phone");
var profile_phoneValidation = false;

/* Profile Page Events */
profile_phoneElement.onkeyup = function () {
    if (
        !validateElement(
            profile_error_phone,
            validatePhone(profile_phoneElement.value)
        )
    )
        profile_phoneValidation = false;
    else profile_phoneValidation = true;
    profile_checkValidations();
};

/* Profile Page Functions */
function profile_checkValidations() {
    if (profile_emailValidation && profile_phoneValidation)
        profile_button.classList.remove("disabled");
    else {
        if (!profile_button.classList.contains("disabled"))
            profile_button.classList.add("disabled");
    }
}

function validateElement(element, isValid) {
    if (isValid) {
        if (!element.classList.contains("deactive"))
            element.classList.add("deactive");
    } else if (element.classList.contains("deactive"))
        element.classList.remove("deactive");
    return isValid;
}

function validatePhone(password) {
    return password.match(new RegExp("[0-9]{3}[0-9]{3}[0-9]{2}[0-9]{2}"));
}