<?php
if (isset($_SESSION["login"])){
    $email = $_SESSION["email"];
    $conn = new mysqli("localhost", "root", "", "loginandregister");
    $user = mysqli_query($conn, "SELECT * FROM register WHERE email = $email Limit 1");
    $res = mysqli_fetch_assoc($user);
    $output = array("name" => $res["name"], 
    "gender"=>$res["gender"], "age"=>$res["age"], "dob"=>$res["dob"], "email"=>$res["email"], "contact"=>$res["contact"], "username"=>$res["username"]);
    $jason =  json_encode($output);
    echo ($jason);
    header("Location: /profile.html");
    
}

?>