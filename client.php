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
                    <!-- Slider -->
        <div id="slides" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#slides" data-slide-to="0" class="active"></li>
                <li data-target="#slides" data-slide-to="1" class="active"></li>
                <li data-target="#slides" data-slide-to="2" class="active"></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100"src="slider/slide0.jpg">
                    <div class="carousel-caption">
                        <h1 class="display-2">Goodiez</h1>
                        <h3>Shop goodiez online or sell them</h3>
                        <a href="catalogues.php"><button type="button" class="btn btn-warning btn-lg" style="padding : 10px 15px;">Start Shopping</button></a>
                        <a href="markets.php"><button type="button" class="btn btn-success btn-lg">View Markets</button></a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100"src="slider/slide1.jpg">
                    <div class="carousel-caption">
                        <h1 class="display-2">Goodiez</h1>
                        <h3>We ship our products all over Kenitra</h3>
                        <a href="catalogues.php"><button type="button" class="btn btn-danger btn-lg" style="padding : 10px 15px;">Start Shopping</button></a>
                        <a href="markets.php"><button type="button" class="btn btn-success btn-lg">View Markets</button></a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100"src="slider/slide2.jpg">
                    <div class="carousel-caption">
                        <h1 class="display-2">Goodiez</h1>
                        <h3>Start selling your products now, apply your store !</h3>
                        <a href="catalogues.php"><button type="button" class="btn btn-warning btn-lg" style="padding : 10px 15px;">Start Shopping</button></a>
                       <a href="markets.php"><button type="button" class="btn btn-success btn-lg">View Markets</button></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Products -->
        <div class="container padding">
            <div class="row text-center">
                <div class="col-md-12">
                    <h3 class="titleIndex">Recently Added</h3>
                </div>
            </div>
            <table align="center" class="productsTable" cellspacing ="12">
            <?php 
            //SHOW PRODUCTS by NAME
            //connexion
            include("connexion.php");
            $sql = "SELECT * FROM product ORDER BY id_Product DESC;";
            $result = mysqli_query($link, $sql);
            $data= mysqli_fetch_all($result);
            $productsToShow = 9;
            for( $i=0; $i < 3; $i++)
            {
                echo "<tr>";
                for($j = 0; $j< 3; $j++)
                {
                    //Get infos for each column and line
                    $priceJ = $data[$j +3 * $i][3];
                    $nameJ = $data[$j + 3 * $i][1];
                    $pictureJ = $data[$j + 3 * $i][5];
                    $marketId = $data[$j + 3 * $i][4];
                    $productId = $data[$j + 3* $i][0];
                    $productStock = $data[$j + 3* $i][7];
                    //pull The market's pic
                    $sqlMarket = "SELECT image AS i FROM market WHERE id_market = '$marketId';";
                    $resultMarket= mysqli_query($link, $sqlMarket);
                    $marketRow = mysqli_fetch_assoc($resultMarket);
                    $marketImage = $marketRow["i"];
                    
                    
                    echo '<td style="margin : 15px; border : double 10px black; border-radius: 60px; padding : 15px; background-color : #844a21;">
                    <h4 id="productName" align="center">'.$nameJ.'</h4>
                    <img id="productImg" src="Products/'.$pictureJ.'">
                    <div class="MarketButton">
                    <img id="marketLogo" src="MarketsLogos/'.$marketImage.'"/>';
                    if($productStock > 0)
                    echo
                    '<a href="product.php?id='.$productId.'" style="color: #212529;"><button class="btn btn-warning" style="margin-left : 10px; color : #212529;">Buy</button></a>
                    <h4 id="productPrice">'.$priceJ.'Dh</h4>
                    </div>
                    </td>'; 
                    
                    else
                    {
                        echo " <h3 style='color: white;' class='error'> Out of stock</h3>";
                    }
                    
                }
                echo "</tr>";
            }
            ?>
            </table>
        </div>
                 <div id="about">

        <!-- AfterProducts INFOOS -->
        <div class="row text-center">
                <div class="col-md-12">
                    <h3 id="titleIndex2">About Goodiez</h3>
                </div>
            </div>
              <div id="infosAboutt">       
        <!-- The whole body -->
    <div class="container" style="margin-top : 30px; margin-bottom : 30px;">
        <div class="row text-center">
            <!-- Diversity -->
            <div class ="col-md-3" style="border : double white 8px;border-radius : 35px;background-color:brown; padding : 10px;position :relative; right : 50px; height : 100%; ">
                <img src="slider/everything.png" class="aboutIcons">
                <h4 class="infoText">You can buy from a diverse collection of items in this platform.</h4>
            </div>
                               <div class ="col-md-1"></div>


            <!-- Messages -->
            <div class ="col-md-3" style="border : double white 8px;border-radius : 35px;background-color:brown; padding : 10px;position :relative; right : 50px; height : 100%;">
                <img src="slider/freeshipping.png" class="aboutIcons">
                <h4 class="infoText">We ship our products all over Kenitra for free.</h4>
                </div>
             <div class ="col-md-1"></div>
            <!-- Friends -->
            <div class ="col-md-3" style="border : double white 8px;border-radius : 35px;background-color:brown; padding : 10px;position :relative; right : 50px; height : 100%;">
                <img src="slider/cashOnDelivery.png" class="aboutIcons">
                <h4 class="infoText">Once you pass your order, you pay cash on delivery.</h4>

            </div>
        </div>
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