function xx() {
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
    };
    let d2 = JSON.stringify(d1);

    xhttp.open("POST", "../../controller/company/cjsc.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText === "e1") {
                document.getElementById('error-container').innerHTML = "<p style='color: red; font-size: 22px; font-weight:bold;'>No matching jobs found!...</p>";
            } else {
                let resp = JSON.parse(this.responseText);
                createTable(resp);
            }
        }
    };
    xhttp.send('data=' + d2);
}

function createTable(data) {
    let tableHtml = '<table border="3" style="border-collapse:collapse; width:100%;">';

    tableHtml += '</tr>';
    for (let key in data[0]) { 
        tableHtml += '<th style="background-color:aquamarine; height:40px;">' + key + '</th>'; // data(main associative array)
    }
    tableHtml += '</tr>';

    for (let i = 0; i < data.length; i++) { // table rows (iterating over eacha associative arrays)
        tableHtml += '<tr>';
        for (let key in data[i]) {
            tableHtml += '<td style="background-color:#EEF5FF; height:30px;">' + data[i][key] + '</td>'; // associative array inside data(main array)
        }  // data[i][key] - Represent the key values of the associative arrays 
        tableHtml += '</tr>';
    }

    tableHtml += '</table>'; // table end

    document.getElementById('error-container').innerHTML = tableHtml;
}