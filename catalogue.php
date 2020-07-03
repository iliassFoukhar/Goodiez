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
                            <a class="nav-link active" href="catalogues.php">Catalogues</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="markets.php">Markets</a>
                        </li>
                        <?php
                        session_start();
                        if(!isset($_SESSION["username"]))
                        echo '<li class="nav-item">
                            <a class="nav-link " href="sell.php">Sell</a>
                        </li>'
                            ?>
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
                    
                        <?php 
                                        
                                        if(isset($_SESSION["username"]))
                                        {
                                            $username = $_SESSION["username"];
                                            echo '<button type="button" id="dropdownMenu1" data-toggle="dropdown" data-target="#menu0" class="btn btn-sm btn-outline-warning" style="position : relative; left : 20px;"<span></span>'.$username.'</button>">';
                                            
                                
                                        }
                                        else{
                                            echo '<button type="button" id="dropdownMenu1" data-toggle="dropdown" data-target="#menu0" class="btn btn-sm btn-warning" style="position : relative; left : 20px;">Sign in<span></span></button>';
                                        }
                                    ?>
                    <!-- Drop the menu Of login -->
                         <?php 
                        if(isset($_SESSION["username"]))
                            echo ' <ul id="menu0" class="dropdown-menu dropdown-menu mt-2 pull-right" style=" background-color : #3a3a3a;">
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
                    ';
                        else
                        {
                            echo '<ul id="menu0" class="dropdown-menu dropdown-menu mt-2 pull-right" style=" background-color : #3a3a3a;">
                   <li class="px-3 py-3">
                       <form class="form" method="Post" action="treatLogin.php" role="form">
                            <div class="form-group">
                                <input id="login" placeholder="Login" class="form-control form-control-sm" type="text" name ="username"  required>
                            </div>
                            <div class="form-group">
                                <input id="password" placeholder="Password" class="form-control form-control-sm" type="password" name ="pass" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-warning btn-block">Sign in</button>
                            </div>
                            <div class="form-group text-center">
                                <small><a href="#" data-toggle="modal" data-target="#modalPassword" class="error">Forgot password?</a></small>
                            </div>
                        </form>
                    </li>
                </ul></div>
                <!--Register -->
                        <div class="container pull-left">
                <a href="join.php"><button type="button" class="btn btn-sm btn-outline-warning" style="padding: 5px 10px;">Sign Up<span></span></button></a>
                    </div>';    
                        }
                        
                        ?>
            </div>
            </div>
            </div>
        </nav>
        <!--Catalogues -->
            <div class="container-fluid">
                <div class="row text-center">
                <div class="col-md-12">
                    <h4 class="titleIndex">Catalogue</h4>
                </div>
                    <?php 
                        include("connexion.php");
                        $idCatalogue = $_GET["id"];
                        $sql ="SELECT p.name, p.stock, p.unit_price, r.id_rubrique,p.image, p.id_Product,p.id_catalogue FROM product AS p INNER JOIN rubrique AS r ON p.id_rubrique = r.id_rubrique WHERE p.id_catalogue='$idCatalogue';";
                        $result = mysqli_query($link, $sql);
                        while($data = mysqli_fetch_array($result))
                        {
                            $image = $data[4];
                            $lib = $data[0];
                            $idProduct = $data[5];
                            $unitPrice = $data[2];
                            echo "<div class='col-md-3 offset-md-1' style='position : relative; right : 50px;margin-bottom : 20px;margin-top:10px;padding : 5px;' id='catalogueBg'>";
                            echo "<h3 class='catalogueLib'>".$lib."</h3>";
                            echo "<img id ='productImg' src=\"Products/".$image."\"><br><br>";
                            echo "<h3 class='infoText'>".$unitPrice."</h3>";
                            echo '<a href="product.php?id='.$idProduct.'"><button type="button" class="btn btn-md btn-warning" style="padding: 5px 10px;">Add to cart<span></span></button></a><br><br>';
                            echo "</div>";
                            
                        }
                    ?>
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