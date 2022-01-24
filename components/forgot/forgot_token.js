/* Password Page Fields */
var password_new_oneElement = document.getElementById(
    "formGroupNewPasswordInput"
);
var password_new_twoElement = document.getElementById(
    "formGroupNewPasswordAgainInput"
);
var password_button = document.getElementById("btn-execute");
var password_error_match = document.getElementById("vld-password-match");
var password_error_length = document.getElementById("vld-password-length");
var password_error_char = document.getElementById("vld-password-char");
var password_matchValidation = false;
var password_lengthValidation = false;
var password_charValidation = false;

/* Password Page Functions */
function password_checkValidations() {
    if (
        password_charValidation &&
        password_matchValidation &&
        password_lengthValidation
    )
        password_button.classList.remove("disabled");
    else {
        if (!password_button.classList.contains("disabled"))
            password_button.classList.add("disabled");
    }
}

/* Password Page Events */
password_new_oneElement.onkeyup = function () {
    if (
        !validateElement(
            password_error_char,
            validatePassword(password_new_oneElement.value)
        )
    )
        password_charValidation = false;
    else password_charValidation = true;
    if (
        !validateElement(
            password_error_length,
            password_new_oneElement.value.length >= 8
        )
    )
        password_lengthValidation = false;
    else password_lengthValidation = true;
    if (
        !validateElement(
            password_error_match,
            password_new_oneElement.value == password_new_twoElement.value
        )
    )
        password_matchValidation = false;
    else password_matchValidation = true;
    password_checkValidations();
};


password_new_twoElement.onkeyup = function () {
    if (
        !validateElement(
            password_error_match,
            password_new_oneElement.value == password_new_twoElement.value
        )
    )
        password_matchValidation = false;
    else password_matchValidation = true;
    password_checkValidations();
};

function validateElement(element, isValid) {
    if (isValid) {
        if (!element.classList.contains("deactive"))
            element.classList.add("deactive");
    } else if (element.classList.contains("deactive"))
        element.classList.remove("deactive");
    return isValid;
}

function validatePassword(password) {
    return password.match(/([a-zA-Z])+([ -~])*/);
}