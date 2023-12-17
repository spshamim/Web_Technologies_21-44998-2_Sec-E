function myJobSearchValidation()
{
    let xhttp = new XMLHttpRequest();

    let title = document.getElementById("title").value;
    let comp_name = document.getElementById("comp_name").value;
    let category = document.getElementById("category").value;
    let type = document.getElementById("type").value;
    let salary = document.getElementById("salary").value;
    let experience = document.getElementById("experience").value;
    let location = document.getElementById("location").value;

    let info = {
        'title': title,
        'comp_name': comp_name,
        'category': category,
        'type': type,
        'salary': salary,
        'experience': experience,
        'location': location
    }

    let info1 = JSON.stringify(info);
     
    xhttp.open("POST", "../../controller/seeker_controller/myJobSearchControl.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('data=' + info1);
    xhttp.onreadystatechange = function() 
    {
        if (this.readyState == 4 && this.status == 200) 
        {
            if(this.responseText === "error")
            {
                document.getElementById('error-message').innerHTML = "<p style='color: red; font-size: 22px; font-weight:bold;'>No matching jobs found!...</p>";
            }
            else
            {
                let resp = JSON.parse(this.responseText);
                createTable(resp);
            }
        }
    };
}

/*---------------------------------------------------------------------------------------*/
// Table Create
function createTable(data) 
{
    let tableHtml = '<table border="3" style="border-collapse:collapse; width:100%;">';

    tableHtml += '</tr>';
    for (let key in data[0]) 
    { 
        tableHtml += '<th style="background-color:aquamarine; height:40px;">' + key + '</th>'; // data(main associative array)
    }
    tableHtml += '<th style="background-color:aquamarine; height:40px;">' + "Option" + '</th>';
    tableHtml += '</tr>';

    for (let i = 0; i < data.length; i++) 
    { // table rows (iterating over eacha associative arrays)
        tableHtml += '<tr>';
        for (let key in data[i]) 
        {
            tableHtml += '<td style="background-color:#EEF5FF; height:30px;">' + data[i][key] + '</td>'; // associative array inside data(main array)
        }  // data[i][key] - Represent the key values of the associative arrays 
        tableHtml += '<td style="background-color:#EEF5FF; height:30px;">' + 
            '<a href="#" onclick="apply(\'' + data[i]['comp_name'] + '\', \'' + data[i]['salary'] + '\', \'' + data[i]['title'] + '\', \'' + data[i]['category'] + '\', \'' + data[i]['type'] + 
                '\')" style="text-decoration:none; padding:2px; background-color:green; color:white; font-weight:bold; border:2px solid black; border-radius:6px; margin-left:15px;">' 
                + "Apply" + '</a>' +
                    '</td>';
        tableHtml += '</tr>';
    }

    tableHtml += '</table>'; // table end

    document.getElementById('error-message').innerHTML = tableHtml;
}

// Job Apply
function apply(compName, salary, title, category, type) 
{
    let xhttp = new XMLHttpRequest();

    let info2 = {
        'compName': compName,
        'salary': salary,
        'title': title,
        'category': category,
        'type': type
    }

    let info3 = JSON.stringify(info2);

    xhttp.open("POST","../../controller/seeker_controller/jobapplycontrol.php",true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('data=' + info3);
    xhttp.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200) 
        {
            alert("Applied!");
            window.location.href = '../../view/seeker/seeker_profile.php';
        }
    };
}
/*---------------------------------------------------------------------------------------*/

function deleteRow(userID) 
{
    let xhttp = new XMLHttpRequest();

    xhttp.open("POST","../../controller/seeker_controller/anonymous.php",true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('id=' + userID)
    xhttp.onreadystatechange = function() 
    {
        if (this.readyState==4 && this.status==200) 
        {
            if(this.responseText === "success")
            {
                alert("Deleted Successfully..");
                window.location.reload();
            }
            else
            {
                alert("Error in database.");
            }
        }
    } 
}