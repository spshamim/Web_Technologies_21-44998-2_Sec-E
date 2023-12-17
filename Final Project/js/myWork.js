function myWorkValidation()
{
    var designationtitle = document.getElementById("designation").value;
    var year1 = document.getElementById("year1").value;
    var year2 = document.getElementById("year2").value;
    var compname = document.getElementById("comp_name").value;

    if (designationtitle === "" || year1 === "" || year2 === "" || compname === "") {
        alert("All fields must be filled out.");
        return false;
    }

    let Characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ .-";
    for(let i = 0; i < designationtitle.length; i++)
    {
        let char = designationtitle[i];
        if (!Characters.includes(char))
        {
            alert("Designation Name only contain letters and spaces!");
            return false;
        }
    }

    if (year1 > year2) 
    {
        alert("Please make sure the start year is less than the end year.");
        return false;
    }
    else
    {
        if ((year1 < 1900 || year2 >= 2025)) 
        {
            alert("Invalid year.");
            return false;
        }
    }

    let Characters1 = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ .-";
    for(let i = 0; i < compname.length; i++)
    {
        let char = compname[i];
        if (!Characters1.includes(char))
        {
            alert("Company Name only contain letters and spaces!");
            return false;
        }
    }

    return true;
}