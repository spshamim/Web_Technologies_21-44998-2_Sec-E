<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') { // checking if value passed through SUBMIT
    $errors = array(); // Array to store the validation error messages

    // Checking if a file has been uploaded/selected
    if (!isset($_FILES['profile_picture']) || $_FILES['profile_picture']['error'] === UPLOAD_ERR_NO_FILE) {
        $errors[] = "Please select a profile picture.";
    } else {
        $allowed_formats = array('image/jpeg', 'image/jpg', 'image/png'); // allowed formats
        $max_file_size = 4 * 1024 * 1024; // 4MB in bytes

        // Checking if the uploaded file format is allowed (JPEG, JPG, PNG)
        if (!in_array($_FILES['profile_picture']['type'], $allowed_formats)) {
            $errors[] = "Invalid file format. Allowed formats: JPEG, JPG, PNG.";
        }

        // Checking if the file size is within the allowed limit
        if ($_FILES['profile_picture']['size'] > $max_file_size) {
            $errors[] = "File size should not exceed 4MB.";
        }

        if (empty($errors)) {
            $upload_directory = 'uploads/'; // directory for storing the files
            $uploaded_file = $upload_directory . $_FILES['profile_picture']['name'];

            if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $uploaded_file)) {
                echo "<h2>Profile picture uploaded successfully.</h2>";
            } else {
                $errors[] = "Failed to upload the profile picture.";
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Picture</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend><b>Profile Picture</b></legend>
            <img src="picon.png" alt="" srcset="" height=140" width="140"><br>
            <input type="file" name="profile_picture" id=""><hr>
            <input type="submit" value="Submit">
        </fieldset>
    </form><br>

    <?php
        // To display error messages from the error array
        if(!empty($errors)){
            echo "<h3>Warning</h3>";
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
        }
    ?>
</body>
</html>