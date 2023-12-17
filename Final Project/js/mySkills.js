function mySkillsValidation()
{
    let skill_name = document.getElementById("skill_name").value;
    let skill_percent = document.getElementById("skill_percent").value;


    // Perform validation checks
    if (skill_name == "" || skill_percent == "") 
    {
        alert("All fields must be filled out.");
        return false;
    }

    let Characters1 = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ,";
    for(let i = 0; i < skill_name.length; i++)
    {
        let char = skill_name[i];
        if (!Characters1.includes(char))
        {
            alert("Skill Name only contain letters and coma!");
            return false;
        }
    }

    let percentArray = skill_percent.split(',');

    for (let i = 0; i < percentArray.length; i++) 
    {
        let trimmedPercent = percentArray[i].trim();
        let percentFloat = parseFloat(trimmedPercent);

        if (isNaN(percentFloat) || percentFloat < 0 || percentFloat > 100) 
        {
            alert("Please enter valid percentages between 0 and 100 for skill percent.");
            return false;
        }
    }

    //alert("Update successful.");
    return true;
}