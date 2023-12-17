function loginValidation(){
    let errors = [];

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

    /*AJAX request for password match with database
    let xhttp = new XMLHttpRequest();
    xhttp.open("POST","../../controller/anonymous.php",true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if(this.responseText !== passwordValue){
                errors.push("Password not matched with database..!");
            }else if(this.responseText == "error"){
                errors.push("Database error occurred..!");
            }  
        }
    };
    xhttp.send('uname=' + unameValue);*/
    
    /*onreadystatechange function will be called at some point in the future when the response is received from the server. However, the rest of the code continues to execute immediately after sending the AJAX request.

    In this case, I'm are checking for password matching and pushing errors into the errors array inside the onreadystatechange function. But by the time the response is received, the loginValidation function has already completed execution, and the errors array has been returned.

    One way to do this is to make the AJAX request synchronous, but this is generally not recommended as it can freeze the browser until the request is complete.
    */

    if (passwordValue.length < 8) {
        errors.push("Length must be at least 8 characters long...!");
    }

    if (!(containsAtLeastOneSpecialChar(passwordValue))) {
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
        li.style.fontSize = "15px"; 
        li.style.fontWeight = "bold"; 

        ul.appendChild(li);
    }
   
    // If there are errors, prevent form submission
    // if errors.length === 0 is truthy value, then it will return boolean true
    // if errors.length === 0 is not truthy value, then it will return boolean false
    return errors.length === 0;
}