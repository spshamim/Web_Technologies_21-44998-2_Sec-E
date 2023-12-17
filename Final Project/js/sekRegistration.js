function sekregValidation() 
{
    let name = document.getElementById("sek_name").value;
    let username = document.getElementById("user_name").value;
    let password = document.getElementById("sek_pass").value;
    let confirmPassword = document.getElementById("scp").value;
    let email = document.getElementById("email").value;
    let hasUppercase = false;
    let hasLowercase = false;
    let hasSpecialCharacter = false;

    // Name validation
    if (name === "") 
    {
        alert("Seeker name cannot be empty.");
        return false;
    } 
    else 
    {

        let Characters1 = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ .-";
        for(let i = 0; i < name.length; i++)
        {
            let char1 = name[i];
            if (!Characters1.includes(char1))
            {
                alert("Seeker name can only contain letters, space, dots, or dashes");
                return false;
            }
        }

        let words = name.split(" ");
        if (words.length < 2) 
        {
            alert("Seeker name must contain at least two words.");
            return false;
        } 
        else 
        {
            // Check if it starts with a letter
            let startChar = name.charAt(0);
            if (!((startChar >= 'A' && startChar <= 'Z') || (startChar >= 'a' && startChar <= 'z'))) 
            {
                alert("Seeker name must start with a letter.");
                return false;
            }
        }
    }


    // Username validation
    if (username === "") 
    {
        alert("Seeker user name cannot be empty.");
        return false;
    } 
    else 
    {

        let Characters2 = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ .-";
        for(let i = 0; i < username.length; i++)
        {
            let char2 = username[i];
            if (!Characters2.includes(char2))
            {
                alert("Seeker username can only contain letters, numbers, space, dots, or dashes");
                return false;
            }
        }

        if (username.length < 6) 
        {
            alert("Seeker username must contain at least 6 characters.");
            return false;
        } 
        else
        {
            // Check if it starts with a letter
            let startChar = username.charAt(0);
            if (!((startChar >= 'A' && startChar <= 'Z') || (startChar >= 'a' && startChar <= 'z'))) 
            {
                alert("Seeker username must start with a letter.");
                return false;
            }
        }
    }

    // Email validation
    if (email === "") 
    {
        alert("Email cannot be empty.");
        return false;
    } 
    else 
    {
        function validemail(email) 
        {
            for (let i = 0; i < email.length; i++) 
            {
                let char = email[i];
                if (char === '@' || char === '.') 
                {
                    return true;
                }
            }
            return false;
        }

        if (!validemail(email)) 
        {
            alert("Invalid Email!");
            return false;
        }
    }


    // Password validation
    if (password === "" || confirmPassword === "") 
    {
        alert("Both passwords cannot be empty!");
        return false;
    } 
    else 
    {
        let upLetters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        let lowLetters = 'abcdefghijklmnopqrstuvwxyz';
        let specialCharacters = '!@#$%^&*()-_+=[]{}|;:,.<>?';

        for (let i = 0; i < password.length; i++) 
        {
            let char = password[i];

            if (upLetters.includes(char)) 
            {
                hasUppercase = true;
            } 
            else if (lowLetters.includes(char)) 
            {
                hasLowercase = true;
            } 
            else if (specialCharacters.includes(char)) 
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
    }

    return true;
}
