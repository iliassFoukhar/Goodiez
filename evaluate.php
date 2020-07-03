<?php 
    include("connexion.php");
    session_start();
    //get info from form
    
    $evaluation = $_POST["evaluation"];
    $username = $_SESSION["username"];
    //sql
    $sql = "UPDATE `goodiez`.`user` SET `evaluation` = '$evaluation' WHERE `user`.`username` = '$username';";
    $result = mysqli_query($link, $sql);
    //change Session Vars
    
    $_SESSION["evaluation"] = $evaluation;
    header("location: cart.php");
?>