const loginText = document.querySelector(".title-text .login");
const loginForm = document.querySelector("form.login");
const loginBtn = document.querySelector("label.login");
const signupBtn = document.querySelector("label.signup");
const signupLink = document.querySelector("form .signup-link a");

signupBtn.onclick = (()=>{
  loginForm.style.marginLeft = "-50%";
  loginText.style.marginLeft = "-50%";
});
loginBtn.onclick = (()=>{
  loginForm.style.marginLeft = "0%";
  loginText.style.marginLeft = "0%";
});
signupLink.onclick = (()=>{
  signupBtn.click();
  return false;
});


function validateEmail(email) {
  const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
  return emailPattern.test(email);
}

function validateForm(event) {
  event.preventDefault();  // Prevent form submission until validation is done
  
  let errorMessages = [];
  
  // Get the email and password input values
  const email = document.querySelector("#emailU").value;
  const password = document.querySelector("#passwordU").value;
  
  // Check if email is valid
  if (email === "" || !validateEmail(email)) {
      errorMessages.push("Please enter a valid email address.");
  }
  
  // Check if password is not empty
  if (password === "") {
      errorMessages.push("Please enter a password.");
  }
  
  // Display errors if any
  const errorDiv = document.querySelector("#errorMessages");
  if (errorMessages.length > 0) {
      errorDiv.innerHTML = errorMessages.join("<br>");
  } else {
      // If no errors, submit the form
      document.querySelector("#signUpForm").submit();
  }
}

