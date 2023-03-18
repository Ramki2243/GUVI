<?php
$name = $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$dob = $_POST['dob'];
$username = $_POST['username'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$password = $_POST['password'];

if (!empty($name) || !empty($gender) || !empty($age) || !empty($dob) || !empty($username) || !empty($email) || !empty($contact) || !empty($password)) {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "loginandregister";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()){
        die('connect Error(' . mysqli_connect_error() . ')' . mysqli_connect_error());
    }
    else{
        $SELECT = "SELECT email FROM register Where email = ? Limit 1";
        $INSERT = "INSERT INTO register ( name, gender, age, dob, username, email, contact, password ) VALUES(?,?,?,?,?,?,?,?)";
        
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;
        
        if ($rnum == 0){
            $stmt->close();
            
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("ssisssss", $name, $gender, $age, $dob, $username, $email, $contact, $password);
            $stmt->execute();
            echo "New record inserted succesfully";
        } 
        else{
            echo "email already in use";
        }
        $stmt->close();
        $conn->close();
    }
    }
else{
    echo "All fields are required";
    die();
}
?>