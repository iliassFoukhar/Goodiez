 <?php session_start();
    $market = $_SESSION["market"];
?>
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
                            <a class="nav-link" href="addCatalogue.php">Catalogue<span style='color:#343a40;'>_</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="addCategory.php">Category<span style='color:#343a40;'>_</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="addProduct.php">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="addPromotion.php">Promotion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="gainsGestion.php">Gains</a>
                        </li>
                        <li></li>
                        <li></li>
                    </ul>
                </div></div>
                      <div class="col-md-4">  
                          <!-- SearchBar -->
                    <form method="post" action="#">
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
                <a href="gestionnaire.php"><button type="button" class="btn btn-sm btn-warning" style="padding: 5px 10px;">Admin<span></span></button></a>
                    </div>
            
            </div>
            </div>
        </nav>
        <!-- Menu Gestionnaire-->
        <div class="container-fluid" style="margin : 20px 0;padding: 10px 0 6px 0">
        <div class="row text-center">
            <div class="col-md-5 offset-md-1 overflow-auto ">                
                <form method ="post" action="assignG.php" style="background-color:rgba(0,0,0,0.7); border-radius : 5px; padding: 20px 5px;" id="loginForm.php" class="overflowww">

                <h3 class="titleIndex" style="border : solid 3px white;">Turnover</h3>
                <img class="aboutIcons" src="slider/CA.png"><br>
                    <hr class="light">
                    <?php 
                        include("connexion.php");
                        $sqlT = "SELECT DISTINCT * FROM market WHERE id_market='$market'";
                    
                        $resultT = mysqli_query($link, $sqlT);
                        while($var = mysqli_fetch_assoc($resultT))
                        {
                            $msg = "<h3 class='infoText'>You are an administrator of <span style='color:orange'>".$var["name"]."</span></h3>";
                            echo $msg;
                            $image = "marketsLogos/".$var["image"];
                            $total = 0;
                            
                            $idMarket = $var["id_market"];
                            $sqlK = "SELECT p.unit_price as price, c.quantity as qte FROM product as p INNER JOIN commande as c ON c.id_produit=p.id_Product  WHERE p.id_market='$idMarket';";
                            $resultK = mysqli_query($link, $sqlK);
                            while($var2=mysqli_fetch_assoc($resultK))
                            {
                                $total += $var2["qte"]*$var2["price"];
                            }
                            echo "<img id='marketLogo2' src='".$image."'>";
                            echo "<h3 class='infoText'>".$total."<span style='color:gold'> MAD</span></h3><br><br>";
                            
                        }
                    ?>
                  
                    <br>
                    <br>
                </form>
            </div>
                    <!-- Menu livreur-->

            <div class="col-md-5">
                <form method ="post" action="assignS.php" style="background-color:rgba(0,0,0,0.7); border-radius : 5px; padding: 20px 5px;  overflow-y:auto;height :100%;" id="loginForm.php">
                    <h3 class="titleIndex" style="border : solid 3px white;">Deliveries</h3>
                    <img class="aboutIcons" src="slider/delivery3.png">
                    <hr class="light">
                <?php 
                        //pull delivery guys
                        include("connexion.php");
                        $sqlPullCatalogue = "SELECT * FROM product WHERE id_market ='$market';";
                        $resultPullCatalogue =mysqli_query($link, $sqlPullCatalogue);
                        while($dataaa = mysqli_fetch_assoc($resultPullCatalogue))
                        {
                        $product = $dataaa["id_Product"];
                        $sqlS = "SELECT * FROM commande WHERE command_state = 3 AND id_produit = '$product';";
                        $resultS = mysqli_query($link, $sqlS);
                        $total = 0;
                        while($var = mysqli_fetch_assoc($resultS))
                        {
                            //client smia
                            $idclient = $var["id_client"];
                            $sqlClient = "SELECT firstName,lastName FROM user WHERE id_user='$idclient';";
                            $result = mysqli_query($link,$sqlClient);
                            $data = mysqli_fetch_assoc($result);
                            $fullNameClient = $data["firstName"]."  ".$data["lastName"];
                            //smlia
                            $idlivreur = $var["id_livreur"];
                            $sqllivreur = "SELECT firstName,lastName FROM user WHERE id_user='$idlivreur';";
                            $result = mysqli_query($link,$sqllivreur);
                            $data1 = mysqli_fetch_assoc($result);
                            $fullNameLivreur = $data1["firstName"]."  ".$data1["lastName"];
                            //khasni prix
                            $idProduit = $var["id_produit"];
                            $sqlProduct = "SELECT unit_price as p FROM product WHERE id_Product='$idProduit';";
                            $result = mysqli_query($link,$sqlProduct);
                            while($data2 = mysqli_fetch_assoc($result))
                            {
                            $unitPrice = $data2["p"];
                            $total += $unitPrice * $var["quantity"];  
                        }
                    echo "<h3 class='infoText' style='color:orange;'> Deliverd to <span style='color : white;'>".$fullNameClient."</span></h3>";
                    echo "<h3 class='infoText' style='color:orange;'> By <span style='color : white;'>".$fullNameLivreur."</span></h3>";
                     echo "<h3 class='infoText' style='color:orange;'>Total of<span style='color : white;'> ".$total." MAD</span></h3>";
                            echo "<hr class='dark'>";
                        }
                        }
                                           
                    ?>
                    <br><br>
                    
                </form>
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