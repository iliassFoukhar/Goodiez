<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Goodiez</title>
        <meta name="author" content="Iliass Foukhar, Hamza Benjelloun">
        <meta name="description" content="A platform to buy goodies online and get pay cash on delivery">
        <meta name="keywords" content="buy, cash, delivery, ecommerce">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Varela Round   -->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round&display=swap" rel="stylesheet">
        <!-- Bootstrap   -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	   <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
        <!-- CSS   -->
        <link href="main.css" type="text/css" rel="stylesheet"/>
    </head>
    <body>
    <!-- NavBar -->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
            <div class="container-fluid">
                <div class="col-3">
                <a class="navbar-brand" id= "brandy" href="index.php" >Goodiez</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-md-center col-9" id="navbarResponsive">
                    <div class="container">
                        <div class="col-md-5">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="catalogues.php">Catalogues</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="markets.php">Markets</a>
                        </li>
                        <li></li>
                        <li></li>
                    </ul>
                </div></div>
                      <div class="col-md-4">  
                          <!-- SearchBar -->
                    <form method="post" action="traitSearch.php">
                        <div class="input-group xs-form form-xs form-0 pl-0" style="">
                            <div class="input-group-prepend">
                                <span class="input-group-text cyan lighten-2" style=" background-color : orange; border : 1px solid orange;"><i class="fas fa-search text-blue"aria-hidden="true"></i>
                                </span>
                            </div>
                            <input name="searchBar" class="form-control my-0 py-1" type="text" placeholder="Search..." aria-label="Search"></div></form>
                    </div>
                    <div class="container">
                    <!-- User menu -->
                    <button type="button" id="dropdownMenu1" data-toggle="dropdown" data-target="#menu0" class="btn btn-sm btn-outline-warning" style="position : relative; left : 20px;">
                        <?php 
                                        session_start();
                                        $username = $_SESSION["username"];
                                        echo $username;
                                    ?><span></span></button>
                    <!-- Drop the menu Of login -->
                    <ul id="menu0" class="dropdown-menu dropdown-menu mt-2 pull-right" style=" background-color : #3a3a3a;">
                   <li class="px-3 py-3">
                       <ul>
                           <img src="slider/user.png" id="userPic">
                           <br><br>
                           <a href="settings.php"><li>Edit Account</li></a>
                           <a href="changePassword.php"><li>Change Password</li></a>
                           <a href="logout.php"><li>Logout</li></a>
                       </ul>
                </ul></div>
                <!--Your Cart -->
                        <div class="container pull-left">
                <a href="cart.php"><button type="button" class="btn btn-sm btn-warning" style="padding: 5px 10px;">Your cart<span></span></button></a>
                    </div>
            
            </div>
            </div>
        </nav>
        <!-- Product -->
        <div class="container">
            <div class="row text-center" style="border : double white 8px;border-radius : 35px;background-color:black; opacity:0.8; padding : 10px;position :relative; right : 50px; height : 100%; margin: 30px 0;">
                    <!-- name -->
                            <div class="col-md-12"><h4 class="infoText">
                                <?php
                                    include("connexion.php");
                                    $idProduct = $_GET["id"];
                                    $sql = "SELECT * FROM product WHERE id_Product = '$idProduct';";
                                    $result = mysqli_query($link, $sql);
                                    $data = mysqli_fetch_assoc($result);
                                    $name = $data["name"];
                                    $marketId= $data["id_market"];
                                    $description = $data["description"];
                                    echo "<h4 style='color : gold; font-size: 30px;' class='infoText'>".$name."</h4>";
                                ?>
                                </h4>
                            <hr class="light">
                            </div>
                      
                     <!-- image -->
                            <div class="col-md-5">
                    <?php echo '<img id="productImg2" src= "Products/'.$_GET["id"].'.jpg"'.'>'; ?>
                        </div>
                            <!-- from -->
                            <div class="col-md-5">
                                
                           <?php 
                                $sql2 = "SELECT * FROM market WHERE id_market = '$marketId';";
                                $result2 = mysqli_query($link, $sql2);
                                $data2 = mysqli_fetch_assoc($result2);
                                echo "<h4 style='color : white; font-size: 22px;' class='infoText'>Posted by</h4>";
                                $image = $data2["image"];
                                echo "<img id='marketLogo2' src='MarketsLogos/".$image."'/>";
                                echo "<hr class='light'>";
                                $stock = $data["stock"];
                                $price = $data["unit_price"];
                                echo "<h4 style='color : white; font-size: 22px;' class='infoText'>".$description."</h4>";
                                echo "<hr class='light'>";
                                if($stock > 0)
                                {
                                echo "<form method='post' action='addToCart.php?id=".$idProduct."'>";
                                echo "<h4 class='infoText'>Price per unit ".$price." MAD</h4>";
                                echo "<div class='col-sm-5' style='margin-left: 50px;'><select class='form-control input-sm' name='quantity'>";
                                for($i=1; $i < $stock + 1; $i++)
                                {
                                    echo "<option value=".$i.">".$i."</option>";
                                }
                                echo '</select></div><button type="submit" class="btn btn-sm btn-warning" style="padding: 5px 10px;position : relative; bottom : 35px;margin-left: 100px;">Add to cart<span></span></button>';
                                echo '</form>';
                                }
                                else
                                {
                                     echo "<h4 class='error' style='color : orange;'>We are so sorry but this product is out of stock !</h4>";
                                }
                                ?>
                        </div>
        </div>
        </div>
        
        
        <!-- Footer -->
        <footer>
        <div class="container-fluid padding">
            <div class="row text-center">
                <div class="col-md-4">
                    <hr class="light">
                    <h3  style="color : orange;">Goodiez</h3>
                    <hr class="light">
                    <p>contact@goodiez.com</p>
                    <p>Kenitra</p>
                    <p>MAROC</p>
                </div>
                <div class="col-md-4">
                <hr class="light">
                    <h5>About us:</h5>
                    <hr class="light">
                    <p>Ensa Kenitra</p>
                    <p>Studies Project</p>
                    <p>Supervised by Mme.OUMAIRA</p>
                </div>
                <div class="col-md-4">
                <hr class="light">
                    <h5>Follow us on :</h5>
                    <hr class="light">
                    <a href="#" class="btn-floating btn-lg btn-fb" type="button" role="button"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="btn-floating btn-lg btn-gplus" type="button" role="button"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="btn-floating btn-lg btn-ins" type="button" role="button"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="btn-floating btn-lg btn-yt" type="button" role="button" ><i class="fab fa-youtube" ></i></a>
                    <a href="#" class="btn-floating btn-lg btn-tw" type="button" role="button" ><i class="fab fa-twitter" ></i></a>
                </div>
                <div class="col-12">
                <hr class="light">
                    <p>&copy; All Rights reserved to PauseTech !</p>
                </div>
            </div>
            </div>
        </footer>
    </body>
</html>