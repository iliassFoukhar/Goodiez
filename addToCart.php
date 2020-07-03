<?php 
include("connexion.php");
session_start();
//Get the variables
$productId = $_GET["id"];
$userId = $_SESSION["id"];
if(isset($_POST["quantity"]))
    $quantityChosen = $_POST["quantity"];
else
    header("location: product.php?id=".$productId);
$sqlQ = "SELECT quantity AS q FROM cart WHERE id_user='$userId' AND id_product='$productId';";
$resultQ = mysqli_query($link, $sqlQ);
if(mysqli_num_rows($resultQ) == 1)
{
    $var=mysqli_fetch_assoc($resultQ);
    $quantity = $var["q"] + $quantityChosen;
    $sqlInsert = "UPDATE `goodiez`.`cart` SET  `quantity`= '$quantity' WHERE id_user = '$userId' AND id_product ='$productId';";
}
else{
    $quantity = $quantityChosen;
    $sqlInsert = "INSERT INTO `goodiez`.`cart` (`id_user`, `id_product`, `quantity`, `nvm`) VALUES ('$userId', '$productId', '$quantity', NULL);";
}
//insert into database

echo "product to insert : ".$productId;
echo "user to buy :".$userId;
echo "quantity in cart + this :".$quantity;
if(mysqli_query($link, $sqlInsert))
{
    header("location: cart.php");
}
?>