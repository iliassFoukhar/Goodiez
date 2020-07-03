<?php 
    include("connexion.php");
    session_start();
    $username = $_POST["username"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $idGestion = $_COOKIE["idGestion"];
    $phone = $_POST["phone"];
    $adress = $_POST["adress"];
    $email = $_POST["email"];

    $exEmail = $_COOKIE["exEmail"];
    $exUsername = $_COOKIE["exUsername"];
    //L'unicité du Username et Pseudo:
    $sqlUnique = "SELECT email FROM user WHERE email = '$email';";
    $resultatUnique = mysqli_query($link, $sqlUnique);
    $var2 = mysqli_fetch_array($resultatUnique);
    if($var2){
        setcookie("notUnique", 0, time()+60);
        $notUnique = 0;
    }
    else{
        setcookie("notUnique", 1, time()+60);
        $notUnique = 1;
    }

    $sqlUnique1 = "SELECT username FROM user WHERE username = '$username';";
    $resultatUnique1 = mysqli_query($link, $sqlUnique1);
    $var3 = mysqli_fetch_array($resultatUnique1);
    if($var3){
        setcookie("notUnique1", 0, time()+60);
        $notUnique = 0;
    }
    else{
        setcookie("notUnique1", 1, time()+60);
        $notUnique = 1;
    }
    //hit modify
    if($notUnique == 0 && $username == $exUsername)
    {
        setcookie("notUnique1", 1, time()+60);
        $notUnique = 1;
    }
    if($notUnique == 0 && $email == $exEmail)
    {
        setcookie("notUnique", 1, time()+60);
        $notUnique = 1;
    }
    //Insert everything into the Data Base
     $sqlInsert ="UPDATE user SET firstName='$firstName', lastName='$lastName', adress='$adress', phone='$phone', email='$email', username='$username' WHERE id_user=$idGestion";
    //Not do it until everything is set up 
    if($notUnique == 1)
        $resultat = mysqli_query($link,$sqlInsert);
    else
        header("location: modifyG.php?id=".$idGestion);
    if($resultat)
    header("location: modifyAdmin.php");
    else
        exit("mistake");
?>