<?php
session_start();
$email = $_POST['email'];
$password = $_POST['password'];

if (!empty($email) || !empty($password)){
    $conn = mysqli_connect("localhost", "root", "", "loginandregister");
    if (mysqli_connect_error()){
        die("Connection failed: ". mysqli_connect_error());
    }
    else{
        $select = "SELECT * from register Where email = $email";
        $result = mysqli_query($conn, $select);
        
        if (mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            if ($row["password"] == $password){
                echo "login success";
                $_SESSION["login"] = true;
                $_SESSION["id"] = $email;
            }
            
            else{
                echo "invalid password";
            }
            }
            else{
                echo "invalid email address";
            }
        }
}
else{
    echo "Please enter your email address and password.";
}

 
?>