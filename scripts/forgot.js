var emailElement = document.getElementById("formGroupEmailInput");
var emailValidation = false;

emailElement.onkeydown = emailElement.onkeyup = emailElement.onkeypress = function () {
  var validationElement = document.getElementById("vld-email");
  if (!validateElement(validationElement, validateEmail(emailElement.value)))
    emailValidation = false;
  else emailValidation = true;
  checkValidations();
};

function checkValidations() {
  if (emailValidation)
    document.getElementById("btn-forgot").classList.remove("disabled");
  else {
    var btn_forgot = document.getElementById("btn-forgot");
    if (!btn_forgot.classList.contains("disabled"))
      btn_forgot.classList.add("disabled");
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

function validateEmail(email) {
  const re =
    /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}