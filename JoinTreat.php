<?php 
    include("connexion.php");
    $username = $_POST["username"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $phone=$_POST["phone"];
    $password = $_POST["pass"];
    $passConfirm = $_POST["pass2"];
    $passWrong = 0;
    $adress = $_POST["adress"];
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
    //si les mots de passe ne sont pas identiques
    if($password != $passConfirm){
        setcookie("passWrong",0,time()+60);
        $passWrong = 0;
    }
    else{
        setcookie("passWrong",1,time()+3600);
        $passWrong = 1;
    }
    
    //Insert everything into the Data Base
     $sqlInsert ="INSERT INTO `goodiez`.`user` (
     `type`, `username`, `password`, `email`, `firstName`, `lastName`, `phone`, `adress`) VALUES ('0', '$username', '$password', '$email', '$firstName', '$lastName', '$phone', '$adress');";
    //Not do it until everything is set up :
    if($passWrong == 1 && $notUnique == 1)
    {
        $resultat = mysqli_query($link,$sqlInsert);
        header('location:successfulJoin.php');
    }
    else
        header('location:join.php');
?>