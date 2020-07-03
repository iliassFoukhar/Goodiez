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
        
        <!--SHOW YOUR CARTYY Cart -->
        
                 <div id="about">

        <div class="row text-center">
                <div class="col-md-12">
                    <h3 style="background-color : brown; opacity : 0.8;" id="titleIndex2">Your Cart</h3>
                </div>
            </div>
    <div id="infosAboutt">       
        <!-- The whole body -->
    <div class="container" style="margin-top : 30px; margin-bottom : 30px;">
        <div class="row text-center">
            <!-- total price and stuff -->
            <div class ="col-md-3" id="smally" style="border : double white 8px;border-radius : 35px;background-color:black; padding : 10px;position :relative; right : 50px;opacity : 0.8; height:100%;">
                <img src="slider/cart.png" class="aboutIcons"><br>
                <h4 style="color: orange;"class="infoText">Checkout</h4>
                <?php 
                    include("connexion.php");
                    $idUser = $_SESSION["id"];
                    //get the total price
                    $sql = "SELECT c.quantity AS q, c.id_product AS i, p.unit_price AS p FROM cart AS c INNER JOIN product AS p ON c.id_product=p.id_Product WHERE c.id_user='$idUser';";
                    $result = mysqli_query($link, $sql);
                    $total = 0;
                    while($var = mysqli_fetch_assoc($result))
                    {
                        $total += $var["q"] * $var["p"];
                    }
                    echo "<h4 style='font-size : 15px;'class='infoText'><span style='color : orange;'>total : </span>".$total." MAD</h4>";
                ?>
                
                <a href="checkout.php"><button type="button" class="btn btn-sm btn-warning" style="padding: 5px 10px;">Checkout<span></span></button></a>
                <a href="emptyCart.php"><button type="button" class="btn btn-sm btn-danger" style="padding: 5px 10px;">Empty cart<span></span></button></a><br><br>
            </div>
                               <div class ="col-md-1"></div>


            <!-- things u bought -->
            <div class ="col-md-8" id ="biggy" style="border : double white 8px;border-radius : 35px;background-color:black; opacity:0.8; padding : 10px;position :relative; right : 50px; height : 20%;">
                <img src="slider/product.png" class="aboutIcons">
                <h4 class="infoText" style="color: orange;">Products</h4>
                <hr class='light'>
                <?php  
                include("connexion.php");
                $sql2 = "SELECT p.name AS product, p.unit_price, p.id_market,c.quantity FROM product AS p INNER JOIN cart AS c ON p.id_Product = c.id_product WHERE c.id_user = '$idUser';";
                $result2 = mysqli_query($link, $sql2);
                if(mysqli_num_rows($result2) > 0)
                while ($var2 = mysqli_fetch_array($result2))
                {
                    echo "<h4 class='infoText'>".$var2[0]."   :   ".$var2[1]."  x ".$var2[3]."</h4>";
                }
                else
                    echo "<h4 class='infoText'>Try to buy something</h4>"
                ?>
                </div>
           
            
        </div>
    </div>
        <div class="container" style="margin-top : 30px; margin-bottom : 30px;">
        <div class="row text-center">
            <!-- valid command -->
            <div class ="col-md-3" id="smally" style="border : double white 8px;border-radius : 35px;background-color:black; padding : 10px;position :relative; right : 50px; opacity : 0.8; ">
                <img src="slider/rate.png" class="aboutIcons">
                <h4 style="color: orange;"class="infoText">Rate our service</h4>
                <form action="evaluate.php" method="post">
                <?php 
                    $evaluation = $_SESSION["evaluation"];
                    echo ' <small align="center" style="color:white;" class="error">How did you find goodiez on a scale of 1 to 10 ?</small><br>
                    <input type="range" class="custom-range" min="0" max="10" step="1" name="evaluation" id="customRange3" value="'.$evaluation.'">';
                ?>
                <button type="submit" class="btn btn-sm btn-warning" style="padding: 5px 10px;">Submit<span></span></button>
                </form>
            </div><div class ="col-md-1"></div>
                <div class ="col-md-8" id ="biggy" style="border : double white 8px;border-radius : 35px;background-color:black; opacity:0.8; padding : 10px;position :relative; right : 50px;">
                <img src="slider/order.png" class="aboutIcons">
                <h4 class="infoText" style="color: orange;">Orders made</h4>
                    <?php 
                    include("connexion.php");
                    $sql = "SELECT DISTINCT id_commande, id_client, command_state as etat FROM commande WHERE (command_state BETWEEN 0 AND 2) AND id_client = '$idUser';";
                    $result = mysqli_query($link, $sql);
                    echo "<hr class='light'>";  
                    $msgEtat = "";
                    if(mysqli_num_rows($result)>0)
                        while($varr = mysqli_fetch_assoc($result))
                        {
                            $etat =  $varr["etat"];
                            $idCommand = $varr["id_commande"];
                            $sql1 = "SELECT p.name as name, c.quantity as q,c.command_state as etat FROM product AS p INNER JOIN commande AS c ON p.id_Product = c.id_produit WHERE c.id_client = '$idUser' AND c.id_commande = '$idCommand';";
                            $result1 = mysqli_query($link, $sql1);
                            while($data = mysqli_fetch_assoc($result1))
                            {
                                echo "<h3 class='infoText'>".$data["name"]."  x ".$data["q"]."</h3>";
                            }
                            if($etat == 0)
                                    $msgEtat = "<h3 class='infoText'>Waiting for a delivery man to be assigned</h3>";
                            else if($etat == 1)
                                    $msgEtat = "<h3 class='infoText'>being delivered</h3>";
                            else if($etat == 2)
                                    $msgEtat = '<br><h3 class="infoText">did you recieve it ? </h3><a href="validCommand.php?id='.$idCommand.'"><button type="button" class="btn btn-sm btn-warning" style="padding: 5px 10px;">Submit<span></span></button></a>';
                            
                            echo "<hr class='dark'><h4 class='error' style='color : gold; font-size : 18px;'>Order state</h4>".$msgEtat;
                            echo "<hr class='light'><br>";
                        }
                    else
                    {
                        echo "<h4 style='color:white;' class='infoText'>You havent made any order</h4>";
                    }
                    ?>
                </div>
            
            </div>
</div>    </div>

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