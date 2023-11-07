function validateForm() {
  console.log("Form submitted");

  let emailInput = document.getElementById("email");
  let emailError = document.getElementById("mail-error");
  let emailValue = emailInput.value;
  let emailPattern = /^[a-zA-Z][-_.a-zA-Z0-9]{5,29}@gmail\.com$/;

  let firstNameInput = document.getElementById("firstName");
  let firstNameError = document.getElementById("firstName-error");
  let firstNameValue = firstNameInput.value;
  let firstNamePattern = /^[a-zA-Z]+$/;

  let lastNameInput = document.getElementById("lastName");
  let lastNameError = document.getElementById("lastName-error");
  let lastNameValue = lastNameInput.value;
  let lastNamePattern = /^[a-zA-Z]+$/;

  let messageInput = document.getElementById("message");
  // let messageError = document.getElementById("message-error");
  // let messageValue = messageInput.value;

  if (firstNameValue === "") {
    firstNameError.textContent = "First Name is required.";
    return false;
  } else if (!firstNamePattern.test(firstNameValue)) {
    firstNameError.textContent =
      "Invalid format. Please enter a valid First Name.";
    return false;
  } else {
    firstNameError.textContent = "";
    if (lastNameValue === "") {
      lastNameError.textContent = "Last Name is required.";
      return false;
    } else if (!lastNamePattern.test(lastNameValue)) {
      lastNameError.textContent =
        "Invalid format. Please enter a valid Last Name.";
      return false;
    } else {
      lastNameError.textContent = "";
      if (emailValue === "") {
        emailError.textContent = "Email is required.";
        return false;
      } else if (!emailPattern.test(emailValue)) {
        emailError.textContent =
          "Invalid format. Please enter a valid email address ending with @gmail.com.";
        return false;
      } else {
        emailError.textContent = "";
      }
    }
  }
}

document.getElementById("AddData").addEventListener("submit", function (e) {
  // e.preventDefault();
  validateForm();
});
