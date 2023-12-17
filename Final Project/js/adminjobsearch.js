function yy() {
    var xhttp = new XMLHttpRequest(); 
    
    var title = document.getElementById("title").value;
    var comp_name = document.getElementById("comp_name").value;
    var category = document.getElementById("category").value;
    var type = document.getElementById("type").value;
    var salary = document.getElementById("salary").value;
    var experience = document.getElementById("experience").value;
    var location = document.getElementById("location").value;

    let d1 = {
        'title': title,
        'comp_name': comp_name,
        'category': category,
        'type': type,
        'salary': salary,
        'experience': experience,
        'location': location
    }
    let d2 = JSON.stringify(d1);

    xhttp.open("POST", "../controller/admin_profile/jobsearchcontrol.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('data='+d2)
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if(this.responseText === "error"){
                document.getElementById('error-container').innerHTML = "<p style='color: red; font-size: 22px; font-weight:bold;'>No matching jobs found!...</p>";
            }else{
                let resp = JSON.parse(this.responseText);
                createTable(resp);
            }
        }
    }
}

function createTable(data) {
    let tableHtml = '<table border="3" style="border-collapse:collapse; width:100%;">';

    tableHtml += '</tr>';
    for (let key in data[0]) { 
        tableHtml += '<th style="background-color:aquamarine; height:40px;">' + key + '</th>'; // data(main associative array)
    }
    tableHtml += '<th style="background-color:aquamarine; height:40px;">' + "Operation" + '</th>';
    tableHtml += '</tr>';

    for (let i = 0; i < data.length; i++) { // table rows (iterating over eacha associative arrays)
        tableHtml += '<tr>';
        for (let key in data[i]) {
            tableHtml += '<td style="background-color:#EEF5FF; height:30px;">' + data[i][key] + '</td>'; // associative array inside data(main array)
        }  // data[i][key] - Represent the key values of the associative arrays 
        tableHtml += '<td style="background-color:#EEF5FF; height:30px;">' + 
                        '<a href="#" onclick="deleteRow(' + data[i]['id'] + ')" style="text-decoration:none; padding:2px; background-color:red; color:white; font-weight:bold; border:2px solid black;border-radius:6px;margin-left:15px;">' 
                        + "Delete" + '</a>' +
                    '</td>';
        tableHtml += '</tr>';
    }

    tableHtml += '</table>'; // table end

    document.getElementById('error-container').innerHTML = tableHtml;
}

function deleteRow(id) {
    let xhttp = new XMLHttpRequest();

    xhttp.open("POST","../controller/anonymous.php",true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('id=' + id)
    xhttp.onreadystatechange = function() {
        if (this.readyState==4 && this.status==200) {
            if(this.responseText === "success"){
                alert("Deleted Successfully..");
                window.location.reload();
            }else{
                alert("Error in database.");
            }
        }
    } 
}
