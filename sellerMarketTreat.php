<?php 
    include("connexion.php");
    session_start();
    $adress = $_POST["adress"];
    $description = $_POST["description"];
    $name = $_POST["name"];
    $id = $_SESSION["id"];
    //idPhoto
    $logoId = $name;
    /* ----IMPORT THE Logo */
    $dossier1 = 'MarketsLogos/';
    $dossier2 = 'MarketSlider/';
    //$_FILES['logo'] = $_POST["logo"];
    //$_FILES['portrait'] = $_POST["portrait"];
        $nom_temporaire1 = $_FILES["logo"]["tmp_name"];
        $nom_temporaire2 = $_FILES["portrait"]["tmp_name"];
    //upload Logo
    if(!is_uploaded_file($nom_temporaire1) )
    {
        exit("Le logo est introuvable");
    }
    $nom_fichier1 = $_FILES['logo']['name'];
    if(move_uploaded_file($nom_temporaire1, $dossier1.$nom_fichier1) )
    {
        rename($dossier1.$nom_fichier1, $dossier1.$logoId.".png");
    }
    else
    { 
        exit("Impossible de copier la photo dans $dossier1");
    }
    //upload portrait
    if(!is_uploaded_file($nom_temporaire2) )
    {
        exit("Le logo est introuvable");
    }
    $nom_fichier2 = $_FILES['portrait']['name'];
    if(move_uploaded_file($nom_temporaire2, $dossier2.$nom_fichier2) )
    {
        rename($dossier2.$nom_fichier2, $dossier2.$logoId.".png");
    }
    else
    { 
        exit("Impossible de copier la photo dans $dossier2");
    }
    $namePhoto = $logoId.".png";
    //Insert everything into the Data Base
     $sqlInsert ="INSERT INTO `goodiez`.`market` (
     `name`, `adress`, `description`, `image`, `addedBy`, `valider`) VALUES ('$name', '$adress', '$description', '$namePhoto', NULL, 0);";
    //Not do it until everything is set up :
    $resultat = mysqli_query($link,$sqlInsert);
    header("location: admin.php");
?>