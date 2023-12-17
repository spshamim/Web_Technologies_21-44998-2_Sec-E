function loginValidation(){
    let errors = [];

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

    if (email === "") {
        errors.push("Email can't be empty..!");
    }

    if (checkAtSign(email)) {
        errors.push("Email format is not valid..!");
    }

    ////////////////// Password ///////////////////
    let passwordValue = document.getElementById('pass').value;

    if (passwordValue === "") {
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

    if (passwordValue.length < 8) {
        errors.push("Length must be at least 8 characters long...!");
    }

    if (!(containsAtLeastOneSpecialChar(passwordValue))) {
        errors.push("Password must contain at least one @ or # or % or $ characters..!");
    }

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

    return errors.length === 0;
}