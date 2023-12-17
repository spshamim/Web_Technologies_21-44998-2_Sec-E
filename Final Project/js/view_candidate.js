function retrCandidate(){
    let xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../../controller/company/view_candidate_control.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if(this.responseText === "failed"){
                document.getElementById('dd1').innerHTML = "<p style='color: red; font-size: 22px; font-weight:bold;'>No Candidates on Queue!...</p>";
            }else{
                let resp = JSON.parse(this.responseText);
                createTable(resp);
            }
        }
    }
}

function createTable(data) {
    let tableHtml = '<table border="3" style="border-collapse:collapse; width:1000px;">';

    tableHtml += '<tr>';
    for (let key in data[0]) {
        // Exclude specific columns (comp_mail and comp_number)
        if (key !== 'comp_mail' && key !== 'comp_number') {
            tableHtml += '<th style="background-color:aquamarine; height:40px;">' + key + '</th>';
        }
    }
    tableHtml += '<th style="background-color:aquamarine; height:40px;">' + "Operation" + '</th>';
    tableHtml += '</tr>';

    for (let i = 0; i < data.length; i++) {
        tableHtml += '<tr>';
        for (let key in data[i]) {
            // Exclude specific columns (comp_mail and comp_number)
            if (key !== 'comp_mail' && key !== 'comp_number') {
                // Check if the column is 'approval' and its value is 0
                if (key === 'approval' && data[i][key] == 0) {
                    tableHtml += '<td style="background-color:#EEF5FF; height:30px;">Pending</td>';
                } else {
                    tableHtml += '<td style="background-color:#EEF5FF; height:30px;">' + data[i][key] + '</td>';
                }
            }
        }
        tableHtml += '<td style="background-color:#EEF5FF; height:30px;">' +
            '<a href="#" onclick="approve(' + data[i]['id'] + ')" style="text-decoration:none; padding:2px; background-color:green; color:white; font-weight:bold; border:2px solid black;border-radius:6px;margin-left:15px;">' +
            "Approve" + '</a>' +
            '</td>';
        tableHtml += '</tr>';
    }

    tableHtml += '</table>';
    document.getElementById('dd1').innerHTML = tableHtml;
}

function approve(id){
    let xhttp = new XMLHttpRequest();

    xhttp.open("POST","../../controller/company/candidate_approval.php",true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('id=' + id)
    xhttp.onreadystatechange = function() {
        if (this.readyState==4 && this.status==200) {
            if(this.responseText === "ss"){
                alert("Approved Successfully...");
                window.location.reload();
            }else{
                alert("Error in database.");
            }
        }
    } 
}