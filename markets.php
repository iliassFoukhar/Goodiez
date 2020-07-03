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
                            <a class="nav-link active" href="markets.php">Markets</a>
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
                    <!-- Slider -->
        <?php
        include("connexion.php");
        //number of slides
        $sqlNb = "SELECT count(id_market) AS max FROM market WHERE valider = 1;";
        $resultNb = mysqli_query($link, $sqlNb);
        $dataNb = mysqli_fetch_assoc($resultNb);
        $numberSlides = $dataNb["max"];
        //slides themselves
        echo '
        <div id="slides" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">';
        for($i = 1; $i<$numberSlides +1; $i++)
        {
            //dataTargets
            echo'
                <li data-target="#slides" data-slide-to="'.$i.'"></li>';
        }
         echo  '</ul>
            <div class="carousel-inner">';
        
        for($i = 1; $i<$numberSlides +1; $i++)
        {
            if($i == 6)
            echo '<div class="carousel-item active">';
            else
            echo '<div class="carousel-item">';
                
            //Get ALL from DATABASE
            $sqlPull = "SELECT * FROM market WHERE id_market='$i' AND valider = 1;";
            $resultPull = mysqli_query($link, $sqlPull);
            $dataPull = mysqli_fetch_array($resultPull);
            //fetch data from market DAATABASE
            $title = $dataPull[1];
            $adress = $dataPull[2];
            $description = $dataPull[3];
            $image = $dataPull[4];
            //images
                    echo '<img style="opacity : 0.3;"class="d-block w-100"src="MarketSlider/'.$image.'">';
            echo '
                    <div class="carousel-caption">
                        <h1 class="display-2" style="color: gold;">'.$title.'</h1>
                        <h3>'.$description.'</h3>
                        <h3><span style="color: gold;">Adress: </span>'.$adress.'</h3>
                        <a href="catalogues.php?market='.$i.'"><button type="button" class="btn btn-warning btn-lg" style="padding : 10px 15px;">View Catalogues</button></a>
                    </div>
                </div>';
        }
        echo '
            </div>
        </div>';
        ?>
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