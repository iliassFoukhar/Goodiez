<?php 
    include("connexion.php");
    session_start();
    //get info from form
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $phone = $_POST["phone"];
    $adress = $_POST["adress"];
    $evaluation = $_POST["evaluation"];
    $username = $_SESSION["username"];
    //sql
    $sql = "UPDATE `goodiez`.`user` SET `firstName` = '$firstName', `lastName` = '$lastName', `phone` = '$phone', `adress` = '$adress', `evaluation` = '$evaluation' WHERE `user`.`username` = '$username';";
    $result = mysqli_query($link, $sql);
    //change Session Vars
    $_SESSION["firstName"] = $firstName;
    $_SESSION["lastName"] = $lastName;
    $_SESSION["phone"] = $phone;
    $_SESSION["adress"] = $adress;
    $_SESSION["evaluation"] = $evaluation;
    header("location: index.php");
?>