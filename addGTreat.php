<?php 
    session_start();
    $idAdmin = $_SESSION["id"];
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
    //Get User ID
    $sqlIDGE = "SELECT max(id_user) AS id FROM user;";
    $resultIDGE = mysqli_query($link, $sqlIDGE);
    $dataIDGE = mysqli_fetch_assoc($resultIDGE);
    $iDGE = $dataIDGE["id"] +1;
    //Insert everything into the Data Base
     $sqlInsert ="INSERT INTO `goodiez`.`user` (`id_user`,
     `type`, `username`, `password`, `email`, `firstName`, `lastName`, `phone`, `adress`) VALUES ('$iDGE','2', '$username', '$password', '$email', '$firstName', '$lastName', '$phone', '$adress');";
    $sqlInsert2 ="INSERT INTO `goodiez`.`gestionnaire` (
     `id_user`, `id_market`, `added_by`) VALUES ('$iDGE', NULL, '$idAdmin');";
    //Not do it until everything is set up :
    if($passWrong == 1 && $notUnique == 1)
    {
        $resultat = mysqli_query($link,$sqlInsert);
        $resultat2 = mysqli_query($link, $sqlInsert2);
        header('location:admin.php');
    }
    else
        header('location:addGestion.php');
?>