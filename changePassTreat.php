<?php 
    session_start();
    include("connexion.php");
    //get post
    $actualPassword = $_POST["actual"];
    $newPassword = $_POST["new"];
    $confirmPassword=$_POST["confirm"];
    $match = false;
    $username = $_SESSION["username"];
    //sql ActualPass
    $sql1 = "SELECT password FROM user WHERE username='$username';";
    $result1 = mysqli_query($link, $sql1);
    $data = mysqli_fetch_assoc($result1);
    $passDataBase= $data["password"];
    //check if the password is real
    if($passDataBase != $actualPassword)
    {
        setcookie("errorTrue", 1, time()+60);
        header("location: changePassword.php");
        exit();
    }
    else
    {
        setcookie("errorTrue", 0, time()+60);
    }
    //check if passwords Match
    if($newPassword == $confirmPassword)
    {
        $match = true;
        setcookie("errorMatch", 1, time()+60);
    }
    else
    {
        $match = false;
        setcookie("errorMatch", 1, time()+60);
    }
    //sql
    $sql = "UPDATE `goodiez`.`user` SET `password` = '$newPassword' WHERE `user`.`username` = '$username';";
    if($match == true)
    {
        $result = mysqli_query($link, $sql);
        header("location: index.php");
    }
    else
    {
        header("location: changePassword.php");
    }
?>