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
function validateAmount() {
  let amount = document.getElementById('amount').value;
  let amountError = document.getElementById('amount_error');
  if (amount === '') {
    amountError.innerHTML = 'Amount is required.';
    return false;
  }
  if (isNaN(amount)) {
    amountError.innerHTML = 'Only numbers are allowed.';
    return false;
  }
  if (amount <= 0) {
    amountError.innerHTML = 'Amount must be greater than zero.';
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
  if(validateFirstName() && validateLastName() && validateEmail() && validatePhone() && validateDob() && validateGender() && validateBusinessName() && validateBusinessType()) {
    updateProfile();
    return false;
  };
    return false;
}
function validateFormTransfer() {
  if(validateEmail() && validateAmount()) {
    sendTransfer();
    return false;
  };
    return false;
}
function deleteTransaction(transactionId) {
    // Confirm deletion
    if (confirm("Are you sure you want to delete this transaction?")) {
        let xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // If the response is successful, remove the transaction from the DOM
                let transactionElement = document.getElementById("trx-" + transactionId);
                transactionElement.remove();
            } else if (this.readyState == 4) {
                alert("Error deleting transaction. Please try again.");
            }
          }
        xhttp.open("POST", "../controls/delete_transaction.php", true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.send("transactionId=" + transactionId);
    }
}

function updateProfile() {
    let form = document.getElementById('profileForm');
    let formData = new FormData(form);
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('profile_success').innerHTML = "Profile updated successfully!";
        } else if (this.readyState == 4) {
            document.getElementById('profile_error').innerHTML = "Error updating profile. Please try again.";
        }
    }
    xhttp.open("POST", "../controls/profile_merchant.php", true);
    xhttp.send(formData);
}

function sendTransfer() {
    let form = document.getElementById('transferForm');
    let formData = new FormData(form);
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('transfer_success').innerHTML = 'Money transfer successful!';
            jsonData = JSON.parse(this.response);
            document.getElementById('available_balance').innerHTML = jsonData.balance;
            document.getElementById('transferForm').reset();
            document.getElementById('transfer_error').innerHTML = '';
        } else if (this.readyState == 4) {
            document.getElementById('transfer_error').innerHTML = this.response;
            document.getElementById('transfer_success').innerHTML = '';
        }
    }
    xhttp.open("POST", "../controls/transfer_merchant.php", true);
    xhttp.send(formData);
}