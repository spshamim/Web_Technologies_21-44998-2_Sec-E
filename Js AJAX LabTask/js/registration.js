function validateRegistration() {
    let empname = document.getElementById('empname').value;
    let compname = document.getElementById('compname').value;
    let contact = document.getElementById('contact').value;
    let uname = document.getElementById('uname').value;
    let pass = document.getElementById('pass').value;

    let errors = [];

    // Validation for empname
    if (empname.trim() === '' || empname.split(' ').length < 2 || /\d/.test(empname)) {
        errors.push('Invalid empname. Must contain at least two words and no numbers.');
    }

    // Validation for compname
    if (compname.trim() === '' || /\d/.test(compname)) {
        errors.push('Invalid compname. Must not be empty and should not contain numbers.');
    }

    // Validation for contact
    if (!/^\d{11}$/.test(contact)) {
        errors.push('Invalid contact number. Must be an 11-digit integer.');
    }

    // Validation for uname
    if (uname.length < 6 || /\s/.test(uname)) {
        errors.push('Invalid username. Must be at least 6 characters and should not contain spaces.');
    }

    // Validation for pass
    if (pass.length < 8 || !/[!@#$%^&*(),.?":{}|<>]/.test(pass)) {
        errors.push('Invalid password. Must be at least 8 characters and contain at least one special character.');
    }

    return errors;
}

function registration() {
    let errors = validateRegistration();

    let errorContainer = document.getElementById('error-container');
    errorContainer.innerText = ''; // Clearing existing errors

    if (errors.length === 0) {
        let xhttp = new XMLHttpRequest();

        let empname = document.getElementById('empname').value;
        let compname = document.getElementById('compname').value;
        let contact = document.getElementById('contact').value;
        let uname = document.getElementById('uname').value;
        let pass = document.getElementById('pass').value;

        xhttp.open('POST', '../../controller/regcheck.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        let requestBody = 'empname=' + empname +
            '&compname=' + compname +
            '&contact=' + contact +
            '&uname=' + uname +
            '&pass=' + pass;

        xhttp.onreadystatechange = function () {
            if ((this.readyState == 4)&&(this.status == 200)) {
                if (this.responseText.trim() === 'success') { // successful registration
                    window.open('../view/admin.php');
                } else { // if database error occurred
                    errorContainer.innerHTML = '<ul><li>Error during registration. Please try again.</li></ul>';
                }
            }
        }
        xhttp.send(requestBody);
    }
    else { // To display validation errors
        errorContainer.innerHTML = '<ul>' + errors.map(error => '<li>' + error + '</li>').join('') + '</ul>';
    }

    return false; // Prevent the default form submission
}
