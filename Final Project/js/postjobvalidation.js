function postValidation() {
    var errors = [];

    // Title Validation
    var title = document.getElementById('title').value;
    if (title.length < 2 || containsNumbersOrSpecialChars(title)) {
        errors.push("Title must be at least 2 characters long, and should not contain numbers or special characters.");
    }
    
    function containsNumbersOrSpecialChars(input) {
        for (let char of input) {
            if (!isLetterOrSpace(char)) {
                return true;
            }
        }
        return false;
    }
    
    function isLetterOrSpace(char) {
        return (char >= 'a' && char <= 'z') || (char >= 'A' && char <= 'Z') || char === ' ';
    }
    
    // Type Validation
    var type = document.querySelector('input[name="type"]:checked');
    if (!type) {
        errors.push("Please select a job type.");
    }

    // Location Validation
    var location = document.getElementById('location').value;
    if (isEmptyOrContainsNumbers(location)) {
        errors.push("Location should not be empty and should not contain numbers.");
    }
    
    function isEmptyOrContainsNumbers(input) {
        // Check if the input is empty or contains numbers
        return input.trim() === "" || containsNumbers(input);
    }
    
    function containsNumbers(input) {
        for (let char of input) {
            if (isDigit(char)) {
                return true;
            }
        }
        return false;
    }
    
    function isDigit(char) {
        return char >= '0' && char <= '9';
    }      

    // Category Validation
    var category = document.querySelector('select[name="category"]').value;
    if (category === "") {
        errors.push("Please select a category.");
    }

    // Experience Validation
    var exp = document.getElementById('exp').value;
    if (isEmptyOrNotInteger(exp)) {
        errors.push("Experience must be a non-empty integer.");
    }
    
    function isEmptyOrNotInteger(input) {
        return input.trim() === "" || isNaN(parseInt(input, 10)) || !Number.isInteger(parseFloat(input));
    }    

    // Salary Validation
    var salary = document.getElementById('salary').value;
    if (isEmptyOrNotInteger(salary)) {
        errors.push("Salary must be a non-empty integer.");
    }
    
    function isEmptyOrNotInteger(input) {
        // Check if the input is empty or not a valid integer
        return input.trim() === "" || !isInteger(input);
    }
    
    function isInteger(input) {
        // Check if the input is a valid integer
        return !isNaN(input) && parseInt(input) == input && Number.isInteger(Number(input));
    }
    
    // Vacancy Validation
    var vacancy = document.getElementById('vacancy').value;
    if (isEmptyOrNotInteger(vacancy)) {
        errors.push("Vacancy must be a non-empty integer.");
    }
    
    function isEmptyOrNotInteger(input) {
        // Check if the input is empty or not a valid integer
        return input.trim() === "" || !isInteger(input);
    }
    
    function isInteger(input) {
        // Check if the input is a valid integer
        return !isNaN(input) && parseInt(input) == input && Number.isInteger(Number(input));
    }
    
    // Description Validation
    var desc = document.getElementById('desc').value;
    if (desc.trim() === "" || desc.length < 5) {
        errors.push("Description must not be empty and should be at least 5 characters long.");
    }

    // Display errors in the <ul>
    let ul = document.getElementById("errorList");
    ul.innerHTML = ""; // Clear previous errors
       
    for (let i = 0; i < errors.length; i++) {
        let li = document.createElement("li");
        li.appendChild(document.createTextNode(errors[i]));
        li.id = "error" + (i + 101); // Create unique IDs for each error
    
        li.style.color = "red";
        li.style.fontSize = "16px";
        li.style.fontWeight = "bold";
    
        ul.appendChild(li);
    }
   
    // If there are errors, prevent form submission
    // if errors.length === 0 is truthy value, then it will return boolean true
    // if errors.length === 0 is not truthy value, then it will return boolean false
    return errors.length === 0;
}