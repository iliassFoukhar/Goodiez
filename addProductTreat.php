<?php 
include("connexion.php");
session_start();
//is empty
if(!empty($_POST["catalogue"]))
    $catalogue = $_POST["catalogue"];
else
    exit("Choose a catalogue !");

if(!empty($_POST["category"]))
    $category = $_POST["category"];
else
    exit("Category field is empty !");

if(!empty($_POST["name"]))
    $name = $_POST["name"];
else
    exit("Name field is empty !");

if(!empty($_POST["price"]))
    $price = $_POST["price"];
else
    exit("Price field is empty !");

if(!empty($_POST["description"]))
    $description = $_POST["description"];
else
    exit("Description field is empty !");

if(!empty($_POST["stock"]))
    $stock = $_POST["stock"];
else
    exit("Stock field is empty !");

//get the product's Id
    $sqlID = "SELECT Max(id_Product) AS id FROM product;";
    $resultID = mysqli_query($link, $sqlID);
    $dataID = mysqli_fetch_assoc($resultID);
    $photoId = $dataID["id"] +1;
    $productId = $photoId;
    $photoName = $photoId.".jpg";
/* ----IMPORT THE PICTURE */
    $dossier = 'Products/'; 
    //$_FILES['photo'] = $_POST["photo"];
    $nom_temporaire = $_FILES["photo"]["tmp_name"];
    if(!is_uploaded_file($nom_temporaire) )
    {
        exit("Upload a picture Please");
    }
    $nom_fichier = $_FILES['photo']['name'];
    if(move_uploaded_file($nom_temporaire, $dossier.$nom_fichier) )
    {
        rename($dossier.$nom_fichier, $dossier.$photoId.".jpg");
    }
    else
    { 
        exit("Impossible de copier la photo dans $dossier");
    }

    $market = $_SESSION["market"];
//Know what market are wee responsible of
$market = $_SESSION["market"];
//add to database
$sqlInsert = "INSERT INTO `goodiez`.`product` (`id_Product`, `name`, `description`, `unit_price`, `id_market`, `image`, `id_rubrique`, `id_catalogue`, `stock`) VALUES ('$productId', '$name', '$description', '$price', '$market', '$photoName', '$category', '$catalogue', '$stock');";
if(mysqli_query($link, $sqlInsert))
{
    header("location: addProduct.php");
   
}
else
    exit("something's wrong");

?>