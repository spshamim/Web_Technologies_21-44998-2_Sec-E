function validatelogin() {
    let uname = document.getElementById('uname').value;
    let pass = document.getElementById('pass').value;

    let errors = [];

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

function logincheck() {
    let errors = validatelogin();

    let errorContainer = document.getElementById('error-container');
    errorContainer.innerText = ''; // Clearing existing errors

    if (errors.length === 0) {
        let xhttp = new XMLHttpRequest();

        let uname = document.getElementById('uname').value;
        let pass = document.getElementById('pass').value;

        xhttp.open('POST', '../../controller/logincheck.php', true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        let requestBody ='&uname=' + uname +'&pass=' + pass;

        xhttp.onreadystatechange = function () {
            if ((this.readyState == 4)&&(this.status == 200)) {
                if (this.responseText.trim() === 'success-admin') { // successful registration
                    window.location.href = '../view/admin.php';
                } 
                else if(this.responseText.trim() === 'success-employee') {
                    window.location.href = '../view/empdash.php';
                }
                else if(this.responseText.trim() === 'error-database') { // if database error occurred
                    errorContainer.innerHTML = '<ul><li>Error in database. Please try again.</li></ul>';
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
