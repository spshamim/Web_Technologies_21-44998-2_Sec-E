function resumeDetails()
{
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200)
        {
            if(this.responseText === "failed"){
                alert("Failed to fetch data..");
            }else{
                let data = JSON.parse(this.responseText);

                document.getElementById("name").innerHTML = data.name;
                document.getElementById("prof_title").innerHTML = data.prof_title;
                document.getElementById("about_me").innerHTML = data.aboutMe;
                document.getElementById("gender").innerHTML ="Gender: " + data.gender;
                document.getElementById("age").innerHTML ="Age: " + data.age;
                document.getElementById("phone").innerHTML ="Phone Number: " + data.phone;
                document.getElementById("email").innerHTML ="Email: " + data.email;
                document.getElementById("website").innerHTML ="My Personal Website: " + data.website;
                document.getElementById("address").innerHTML ="Home Address: " + data.address;
                document.getElementById("city").innerHTML ="City: " + data.city;
                document.getElementById("skill").innerHTML ="Skills On: " + data.skill;
                document.getElementById("deg_name").innerHTML ="Degree: " + data.deg_name;
                document.getElementById("yeartoyear").innerHTML ="Passing year: " + data.yeartoyear;
                document.getElementById("ins_name").innerHTML ="Institution Name: " + data.ins_name;
                document.getElementById("designation").innerHTML ="Work as: " + data.designation;
                document.getElementById("year").innerHTML ="Working Time: " + data.year;
                document.getElementById("description").innerHTML ="Company Name: " + data.description;
                document.getElementById("experience").innerHTML ="Work Experience: " + data.experience;

                document.getElementById("google").innerHTML =data.google;
                document.getElementById("twitter").innerHTML =data.twitter;
                document.getElementById("facebook").innerHTML =data.facebook;
                document.getElementById("linkedin").innerHTML =data.linkedin;

            }
            
            
            
        }
    };
    xhttp.open("POST", "../../controller/seeker_controller/myResumeDetailsControl.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
    
}

function showContent(elementId) 
{
    var content = document.getElementById(elementId).innerHTML;
    alert(content);
}