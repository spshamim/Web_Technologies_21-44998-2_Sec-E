function validateRegistration() {
    let empname = document.getElementById('empname').value;
    let contact = document.getElementById('contact').value;
    let uname = document.getElementById('uname').value;
    let pass = document.getElementById('pass').value;

    let errors = [];

    // Validation for empname
    if (empname.trim() === '' || empname.split(' ').length < 2) {
        errors.push('Invalid empname. Must contain at least two words.');
    }

    // Validation for contact
    if (contact.length < 11) {
        errors.push('Invalid contact number. Must be an 11-digit.');
    }

    // Validation for uname
    if (uname.length < 6) {
        errors.push('Invalid username. Must be at least 6 characters and should not contain spaces.');
    }

    // Validation for pass
    if (pass.length < 8) {
        errors.push('Invalid password. Must be at least 8 characters and contain at least one special character.');
    }

    return errors;
}

function rregistration() {
    let errors = validateRegistration();

    let errorContainer = document.getElementById('error-container');
    errorContainer.innerText = ''; // Clearing existing errors

    if (errors.length === 0) {
        let xhttp = new XMLHttpRequest();

        let empname = document.getElementById('empname').value;
        let contact = document.getElementById('contact').value;
        let uname = document.getElementById('uname').value;
        let pass = document.getElementById('pass').value;

        xhttp.open('POST', '../controller/regcheck.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        let requestBody = 'empname=' + empname +
            '&contact=' + contact +
            '&uname=' + uname +
            '&pass=' + pass;

        xhttp.onreadystatechange = function () {
            if ((this.readyState == 4) && (this.status == 200)) {
                if (this.responseText === 'success') { // successful registration
                    window.open('../view/admin.php');
                }else if(this.responseText === 'failure'){
                   alert("database error occured..!"); 
                }else { // if database error occurred
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
