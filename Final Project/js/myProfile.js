function myProfileValidation()
{
    let name = document.getElementById("u_name").value;
    let prof_title = document.getElementById("prof_title").value;
    let gender = document.getElementById("gender").value;
    let age = document.getElementById("age").value;
    let cgpa = document.getElementById("cgpa").value;
    let expt_salary = document.getElementById("expt_salary").value;
    let work_exp = document.getElementById("work_exp").value;
    let website = document.getElementById("website").value;
    let aboutyou = document.getElementById("about_u").value
    let phn_num = document.getElementById("phn_num").value;
    let email = document.getElementById("email").value;
    let address = document.getElementById("address").value;
    let city = document.getElementById("city").value;
    let google = document.getElementById("google").value;
    let twitter = document.getElementById("twitter").value;
    let facebook = document.getElementById("facebook").value;
    let linkedin = document.getElementById("linkedin").value;

    if (name === '' || prof_title === '' || gender === '' || age === '' || cgpa === '' || expt_salary === '' ||
        work_exp === '' || website === '' || aboutyou === '' || phn_num === '' || email === '' || address === '' ||
        city === '' || google == '' || twitter == '' || facebook == '' || linkedin == '') 
    {
        alert('Please fill in all the required fields.');
        return false; 
    }


    let Characters1 = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ .-";
    for(let i = 0; i < name.length; i++)
    {
        let char1 = name[i];
        if (!Characters1.includes(char1))
        {
            alert("Name should only contain letters and spaces!");
            return false;
        }
    }
    let words = name.split(" ");
    if (words.length < 2) 
    {
        alert("Name must contain at least two words.");
        return false;
    }


    let Characters2 = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ .-";
    for(let i = 0; i < prof_title.length; i++)
    {
        let char2 = prof_title[i];
        if (!Characters2.includes(char2))
        {
            alert("Profession title only contain letters and spaces!");
            return false;
        }
    }

    // age check
    if (!(age >= 0 && age <= 75)) 
    {
        alert("Invalid age.");
        return false;
    }

    //CGPA check
    let cgpaFloat = parseFloat(cgpa);
    if (isNaN(cgpaFloat) || cgpaFloat < 0 || cgpaFloat >= 4) 
    {
        alert('Please enter a valid CGPA between 0 and 4.0.');
        return false;
    }

    //salary check
    let salaryFloat = parseFloat(expt_salary);
    if (isNaN(salaryFloat) || salaryFloat < 0) 
    {
        alert('Please enter a valid positive number for expected salary.');
        return false;
    }

    return true;

}