function gettingUser(){
    let username = document.getElementById('search').value;
    let xhttp = new XMLHttpRequest();

    xhttp.open('POST', '../controller/searchFeature.php', true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('searchResults').innerHTML =
            '<tr style="background-color: blue; color:white; font-weight:bold">' +
                '<td>Employee Name</td>' +
                '<td>Contact</td>' +
                '<td>UserName</td>' +
                '<td>Password</td>' +
                '<td>Operations</td>' +
            '</tr>' + this.responseText;

            console.log("response not coming...");
        }
    };
    xhttp.send('uname=' + username);
}