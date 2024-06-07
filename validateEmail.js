function validateEmail(email) {
  // Regular expression for validating email
  var re = /\S+@\S+\.\S+/;
  return re.test(email);
}

function validateEmailField() {
    // Validate field on every click
  var emailField = document.getElementById("email");
  var email = emailField.value;
  var isValid = validateEmail(email);

  if (isValid) {
    emailField.style.border = "4px solid #ccc"; // Valid email, reset border
  } else {
    emailField.style.border = "4px solid red"; // Invalid email, set border to red
  }
}
