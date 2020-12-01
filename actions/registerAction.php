<?php

// Check If form submitted, insert form data into users table.
if(isset($_POST['Submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confpassword = $_POST['confpassword'];

    // include database connection file
    include_once("../config.php");

    // Insert user data into table
    if($password === $confpassword){
        // $result = mysqli_query($mysqli, "INSERT INTO mahasiswa(nama_mahasiswa,mobile,nik_wali) VALUES('$name','$mobile')");
        $result = mysqli_query($mysqli, "INSERT INTO `admin` (`username`, `password`) VALUES ('$username', MD5('$password'))");
    }

    // Show message when user added
    unset($_POST['Submit']);
    echo "Admin added successfully. <a href='../loginPage.php'>Go to Login Page</a>";
}
?>