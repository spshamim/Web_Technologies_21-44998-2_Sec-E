function myChangePassValidation() 
{
    let currPass = document.getElementById("curr_pass").value;
    let newPass = document.getElementById("new_pass").value;
    let confPass = document.getElementById("conff_pass").value;

    if (currPass === "" || newPass === "" || confPass === "") {
        alert("All fields must be filled out");
        return false;
    }

    if (currPass === newPass) 
    {
        alert("Current Password and New password cannot be the same");
        return false;
    }


    if (newPass !== confPass) 
    {
        alert("New Password and Confirm Password do not match");
        return false;
    }


    // Initialize variables
    let hasUppercase = false;
    let hasLowercase = false;
    let hasSpecialCharacter = false;

    if (newPass.length < 8) {
        alert("New Password must be at least 8 characters long");
        return false;
    }

    
    // Check for uppercase, lowercase, and special characters
    let upLetters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    let lowLetters = 'abcdefghijklmnopqrstuvwxyz';
    let specialCharacters = '!@#$%^&*()-_+=[]{}|;:,.<>?';

    for (let i = 0; i < newPass.length; i++) {
        let char = newPass[i];

        if (upLetters.includes(char)) 
        {
            hasUppercase = true;
        } else if (lowLetters.includes(char)) 
        {
            hasLowercase = true;
        } else if (specialCharacters.includes(char)) 
        {
            hasSpecialCharacter = true;
        }
    }


    if (!hasUppercase) {
        alert("Password must contain at least one uppercase letter.");
        return false;
    }

    if (!hasLowercase) {
        alert("Password must contain at least one lowercase letter.");
        return false;
    }

    if (!hasSpecialCharacter) {
        alert("Password must contain at least one special character.");
        return false;
    }

    alert("Password changed successfully!");
    return true;
}

