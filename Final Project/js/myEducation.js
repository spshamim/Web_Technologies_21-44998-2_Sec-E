function myEducationValidation()
{
    let degreeName = document.getElementById("deg_name").value;
    let year = document.getElementById("year").value;
    let instName = document.getElementById("inst_name").value;

    // Perform validation checks
    if (degreeName == "" || year == "" || instName == "") 
    {
        alert("All fields must be filled out.");
        return false;
    }

    let Characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ .-";
    for(let i = 0; i < degreeName.length; i++)
    {
        let char = degreeName[i];
        if (!Characters.includes(char))
        {
            alert("Degree Name only contain letters and spaces!");
            return false;
        }
    }
    
    if (!(year >= 1900 && year < 2030)) 
    {
        alert("Invalid year.");
        return false;
    }

    let Characters1 = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ .-";
    for(let i = 0; i < instName.length; i++)
    {
        let char2 = instName[i];
        if (!Characters1.includes(char2))
        {
            alert("Institution Name only contain letters and spaces!");
            return false;
        }
    }

    return true;
}
