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
                            <a class="nav-link active" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Catalogues</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#">Markets</a>
                        </li>
                        <li></li>
                        <li></li>
                    </ul>
                </div></div>
                      <div class="col-md-4">  
                          <!-- SearchBar -->
                    <form method="post" action="livreur.php">
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
                <a href="livreur.php"><button type="button" class="btn btn-sm btn-warning" style="padding: 5px 10px;">Delivery man<span></span></button></a>
                    </div>
            
            </div>
            </div>
        </nav>
        <!--livreur etat -->
            <div class="container-fluid" style='margin : 50px;'>
                <div class="row text-center">
                    <div class="col-md-12">
                        <h2 class="titleIndex">Delivery man's page</h2>
                    </div>
                    <div class="col-md-2 offset-md-1" id="catalogueBg">
                        <h4 class="livreurLib" style='color: gold;'>State</h4>
                        <img src='slider/delivery1.png' class='aboutIcons'><br>
                        <?php 
                            include("connexion.php");
                            $idUser = $_SESSION["id"];
                            $sql = "SELECT * FROM livreur WHERE id_user = '$idUser';";
                            $result = mysqli_query($link, $sql);
                            $data = mysqli_fetch_array($result);
                            $state = $data[1];
                            switch($state)
                            {
                                case 0:
                                        echo "<h3 class='infoText'>unavailable</h3>";
                                    echo "<hr class='light'>";
                                        echo "<h3 class='infoText'>Edit your state</h3>";
                                        echo '<a href="livAv.php"><button type="button" class="btn btn-xl btn-warning" style="padding: 5px 10px;">Available<span></span></button></a><br><br>';
                                        break;
                                case 1:
                                        echo "<h3 class='infoText'>available</h3>";
                                        
                                        echo "<hr class='light'>";
                                        echo "<h3 class='infoText'>Edit your state</h3>";
                                        echo '<a href="livUnav.php"><button type="button" class="btn btn-xl btn-danger" style="padding: 5px 10px;">Unavailable<span></span></button></a><br><br>';
                                        break;
                                case 2:
                                        echo "<h3 class='infoText'>Shipping</h3>";
                                        echo '<a href="delivered.php"><button type="button" class="btn btn-xl btn-success" style="padding: 5px 10px;">Delivered<span></span></button></a><br><br>';
                                        break;
                            }
                        ?>
                    </div>
                    <!--commande affectée -->
                    <div class="col-md-7 offset-md-1" id="catalogueBg">
                        <h4 class="livreurLib" style='color: gold;'>Delivering</h4>
                        <img src='slider/delivery3.png' class='aboutIcons'><br>
                        <?php 
                            include("connexion.php");
                            $sql1="SELECT u.firstName as name,u.lastName as lastName, c.quantity as quantity, u.adress as adress, c.id_Produit as product , u.phone as phone FROM commande as c INNER JOIN user as u ON c.id_client = u.id_user WHERE c.id_livreur ='$idUser' AND c.command_state=1;";
                            $result1 = mysqli_query($link, $sql1);
                            if(mysqli_num_rows($result1) == 0)
                            {
                                echo "<hr class='light'>";
                                echo "<h3 class='infoText'>You haven't been assigned to any order.</h3>";
                            }
                            else
                            {
                                $total = 0;
                                echo "<hr class='light'>";
                                while($data1 = mysqli_fetch_assoc($result1))
                                {
                                echo "<h3 class='infoText'><span style='color:orange;'>Client's Name : </span>".$data1["name"]." ".$data1["lastName"]."</h3>";
                                echo "<h3 class='infoText'><span style='color:orange;'>Shipping Adress : </span>".$data1["adress"]."</h3>";
                                echo "<h3 class='infoText'><span style='color:orange;'>Phone Number : </span>".$data1["phone"]."</h3>";
                                echo "<hr class='dark'>";
                                    break;
                                }
                                echo "<h3 class='infoText' style='color:orange;'>Products</h3>";
                                $result2 = mysqli_query($link, $sql1);
                                // var1 quantity and product ID
                                while($var1 = mysqli_fetch_assoc($result2))
                                {
                                    $idProduct = $var1["product"];
                                    $sql3 = "SELECT * FROM product WHERE id_Product = '$idProduct';";
                                    $result3 = mysqli_query($link, $sql3);
                                    while($data3 = mysqli_fetch_assoc($result3))
                                    {
                                        $total += $var1["quantity"] * $data3["unit_price"];
                                        echo "<h3 class='infoText'>".$data3["name"]."  x  ".$var1["quantity"]."</h3>";
                                    }
                                }
                                echo "<hr class='dark'>";
                                echo "<h3 class='infoText'><span style='color:orange;'>Total Price : </span>".$total."<span style='color:orange;'> MAD</span></h3>";
                                echo "<hr class='light'>";
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