function validateForm() {

    let errors = [];
    
    /////////////////// name ///////////////////
    let value = document.getElementById('name').value;
    let words = value.split(/\s+/); // split by space
    let firstChar = value[0];

    function containsOnlyValidCharacters(name) {
        for (let i = 0; i < name.length; i++) {
            let char = name[i];
            // Skip spaces
            if (char === ' ') {
                continue;
            }
            if (!((char >= 'A' && char <= 'Z') || (char >= 'a' && char <= 'z') || char === '.' || char === '-')) {
                return false;
            }
        }
        return true;
    }

    if (value === "") {
        errors.push("Name can't be empty..!");
    }

    if (words.length < 2) {
        errors.push("Name must contain at least two words..!");
    }

    if (!((firstChar >= 'A' && firstChar <= 'Z') || (firstChar >= 'a' && firstChar <= 'z'))) {
        errors.push("Name must start with a letter..!");
    }

    if (!containsOnlyValidCharacters(value)) {
        errors.push("Name has not allowed characters..!");
    }

    //////////////////// uname ////////////////////
    let unameValue = document.getElementById("uname").value;

    function forUname(uname) {
        for (let i = 0; i < uname.length; i++) {
            let char = uname[i];
            if (!((char >= 'A' && char <= 'Z') || (char >= 'a' && char <= 'z') || char === '.' || char === '_' || char === ' ' || (char >= '0' && char <= '9'))) {
                return false;
            }
        }
        return true;
    }

    if (unameValue === "") {
        errors.push("No username given!");
    }

    // uname DB check missing

    if (unameValue.length < 6) {
        errors.push("Username must contain at least 6 characters..!");
    }

    if (!forUname(unameValue)) {
        errors.push("Username has not allowed characters..!");
    }

    /////////////////// email ///////////////////
    let email = document.getElementById("email").value;

    function checkAtSign(name) {
        for (let i = 0; i < name.length; i++) {
            let char = name[i];
            if (!(char === '@')) {
                return false;
            }
        }
        return true;
    }

    // email DB check missing

    if (email === "") {
        errors.push("Email can't be empty..!");
    }

    if (checkAtSign(email)) {
        errors.push("Email format is not valid..!");
    }

    /////////////////// type ///////////////////
    let typeValue = document.getElementById('type').value;

    if (typeValue === "") {
        errors.push("Please select a type..!");
    }

    /////////////////// Contact ///////////////////
    let contactValue = document.getElementById('contact').value;

    if (contactValue === "") {
        errors.push("Contact can't be empty..!");
    }

    if (contactValue.length < 11) {
        errors.push("Contact number not in length!");
    }

    /////////////////// Location ///////////////////
    let locValue = document.getElementById('loc').value;

    if (locValue === "") {
        errors.push("No location given!");
    }

    /////////////////// Website ///////////////////
    let webValue = document.getElementById('web').value;

    if (webValue === "") {
        errors.push("Website missing!");
    }

    /////////////////// License ///////////////////
    let licValue = document.getElementById('lic').value;

    if (licValue === "") {
        errors.push("License missing!");
    }

    ////////////////// Password ///////////////////
    let passwordValue = document.getElementById('pass').value;
    let confirmPasswordValue = document.getElementById('cpass').value;

    if (passwordValue === "" || confirmPasswordValue === "") {
        errors.push("No password given !");
    }

    function containsAtLeastOneSpecialChar(name) {
        for (let i = 0; i < name.length; i++) {
            let char = name[i];
            if (char === '@' || char === '#' || char === '$' || char === '%') {
                return true;
            }
        }
        return false;
    }

    if (passwordValue !== confirmPasswordValue) {
        errors.push("Passwords do not match!");
    }

    if (passwordValue.length < 8 || confirmPasswordValue.length < 8) {
        errors.push("Length must be at least 8 characters long...!");
    }

    if (!(containsAtLeastOneSpecialChar(passwordValue)) || !(containsAtLeastOneSpecialChar(confirmPasswordValue))) {
        errors.push("Password must contain at least one @ or # or % or $ characters..!");
    }

    // Display errors in the <ul>
    let ul = document.getElementById("errorList");
    ul.innerHTML = ""; // Clear previous errors
       
    for (let i = 0; i < errors.length; i++) {
        let li = document.createElement("li");
        li.appendChild(document.createTextNode(errors[i]));
        li.id = "error" + (i + 101); // Creating unique IDs for each error

        li.style.color = "red";
        li.style.fontSize = "14px"; 
        li.style.fontWeight = "bold"; 

        ul.appendChild(li);
    }
   
    // If there are errors, prevent form submission
    // if errors.length === 0 is truthy value, then it will return boolean true
    // if errors.length === 0 is not truthy value, then it will return boolean false
    return errors.length === 0;
}
