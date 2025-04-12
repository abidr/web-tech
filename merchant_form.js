function validateFirstName() {
  let firstName = document.getElementById('first_name').value;
  let firstNameError = document.getElementById('first_name_error');
  if (firstName === '') {
    firstNameError.innerHTML = 'First name is required.';
    return false;
  }
  return true;
}
function validateLastName() {
  let lastName = document.getElementById('last_name').value;
  let lastNameError = document.getElementById('last_name_error');
  if (lastName === '') {
    lastNameError.innerHTML = 'Last name is required.';
    return false;
  }
  return true;
}
function validateEmail() {
  let email = document.getElementById('email').value;
  let emailError = document.getElementById('email_error');
  if (email === '') {
    emailError.innerHTML = 'Email is required.';
    return false;
  }
  if (!email.includes('@') || !email.includes('.')) {
    emailError.innerHTML = 'Invalid email format.';
    return false;
  }
  return true;
}
function validatePassword() {
  let password = document.getElementById('password').value;
  let passwordError = document.getElementById('password_error');
  if (password === '') {
    passwordError.innerHTML = 'Password is required.';
    return false;
  }
  if (password.length < 8) {
    passwordError.innerHTML = 'Password must be at least 8 characters long.';
    return false;
  }
  return true;
}
function validatePhone() {
  let phone = document.getElementById('phone').value;
  let phoneError = document.getElementById('phone_error');
  if (phone === '') {
    phoneError.innerHTML = 'Phone number is required.';
    return false;
  }
  if (isNaN(phone)) {
    phoneError.innerHTML = 'Only numbers are allowed.';
    return false;
  }
  if (phone.length !== 11) {
    phoneError.innerHTML = 'Phone number must be 11 digits.';
    return false;
  }
  return true;
}
function validateDob() {
  let dob = document.getElementById('dob').value;
  let dobError = document.getElementById('dob_error');
  if (dob === '') {
    dobError.innerHTML = 'Date of birth is required.';
    return false;
  }
  return true;
}
function validateGender() {
  let genderMale = document.getElementById('gender_male').checked;
  let genderFemale = document.getElementById('gender_female').checked;
  let genderError = document.getElementById('gender_error');
  if (!genderMale && !genderFemale) {
    genderError.innerHTML = 'Gender is required.';
    return false;
  }
  return true;
}
function validateBusinessName() {
  let businessName = document.getElementById('business_name').value;
  let businessNameError = document.getElementById('business_name_error');
  if (businessName === '') {
    businessNameError.innerHTML = 'Business name is required.';
    return false;
  }
  return true;
}
function validateBusinessType() {
  let businessType = document.getElementById('business_type').value;
  let businessTypeError = document.getElementById('business_type_error');
  if (businessType === '') {
    businessTypeError.innerHTML = 'Business type is required.';
    return false;
  }
  return true;
}
function validateAgreeTerms() {
  let agreeTerms = document.getElementById('agree_terms').checked;
  let agreeTermsError = document.getElementById('agree_terms_error');
  if (!agreeTerms) {
    agreeTermsError.innerHTML = 'You must agree to the terms and conditions.';
    return false;
  }
  return true;
}

function validateForm() {
  return validateFirstName() && validateLastName() && validateEmail() && validatePassword() && validatePhone() && validateDob() && validateGender() && validateBusinessName() && validateBusinessType() && validateAgreeTerms();
}