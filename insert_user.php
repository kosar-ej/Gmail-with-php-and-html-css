<?php
    session_start();
    include("function/functions.php");
    include("config.php");
    $name=$_POST['name'];
    $username=$_POST['email'];
    $mobile=$_POST['mobile'];
    $birthday=$_POST['birthday'];
    $password=$_POST['password'];

    if(empty($name) || empty($username) || empty($mobile) || empty($birthday) || empty($password)){
        $_SESSION['message']="Please fill in all the fields!";
        header("Location:register.php");
    }
    $password_hash=password_hash($password);
    $sql = "INSERT INTO users (name, username, mobile, birthday, password)
    VALUES ('$name', '$username', '$mobile', '$birthday','$password_hash' )";

    if (mysqli_query($conn, $sql)) {
        do_login($username,$password);
        header("Location:home.php");
    } else {
        $_SESSION['message']="system can not save your data!";
        header("Location:register.php");
    }
    mysqli_close($conn);
?>
