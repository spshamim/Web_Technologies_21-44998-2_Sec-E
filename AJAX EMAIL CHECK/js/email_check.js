function checkEmailAvailability() {
    let email = document.getElementById('email').value;
    let errorTd = document.getElementById('001');
    errorTd.innerHTML = ''; // Clear previous errors

    // Email validation
    if (!email) {
        errorTd.innerHTML = "Email cannot be empty.";
        return;
    }

    // Check for @ symbol
    if (email.indexOf('@') === -1) {
        errorTd.innerHTML = "Invalid email format. Must contain @ symbol.";
        return;
    }

    // Check for at least one character before @
    let localPart = email.split('@')[0];
    if (!localPart) {
        errorTd.innerHTML = "Invalid email format. Must have at least one character before @.";
        return;
    }

    // Check for at least one character after @ and present of dot (.)
    let domainPart = email.split('@')[1];
    if (!domainPart || domainPart.indexOf('.') === -1) {
        errorTd.innerHTML = "Invalid email format. Must have at least one character after @ and a dot (.) in the domain part.";
        return;
    }

    // Check for . not present before and after @
    if (localPart.charAt(localPart.length - 1) === '.' || domainPart.charAt(0) === '.') {
        errorTd.innerHTML = "Invalid email format. Dot (.) must not be present before or after @.";
        return;
    }

    // Check for other special characters
    let specialCharacters = "!#$%^&*()_+{}[]:;<>,?~/";
    for (let i = 0; i < email.length; i++) {
        if (specialCharacters.includes(email[i])) {
            errorTd.innerHTML = "Invalid email format. No other special characters allowed.";
            return;
        }
    }

    // Check for at least one character after dot in the domain part
    let domainAfterDot = domainPart.split('.')[1];
    if (!domainAfterDot) {
        errorTd.innerHTML = "Invalid email format. Must have at least one character after the dot in the domain part.";
        return;
    }

    let xhttp = new XMLHttpRequest();

    xhttp.open("POST", "../controller/check_mail.php", true);

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            errorTd.innerHTML = this.responseText;
        }
    };

    xhttp.send("email=" + email);
}
