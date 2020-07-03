<!DOCTYPE html>
<?php 
            //get Infos
            session_start();?>
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
<body style="background-image : url('slider/slide1.jpg');background-repeat : no-repeat;  background-size: 100% 100%;background-position: right 30% top -10% ;">    
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
                            <a class="nav-link " href="gainsGestion.php">Gains</a>
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
        <!-- Join Form -->
    <h2 style ="background-color:rgba(0,0,0,0.7); text-decoration : none; color:white; margin : 12px 33%;padding: 10px 10px; border-radius: 3px; border : solid 2px black;"align="center">Your account</h2>
        <form id="joinForm" method="post" action="settingsTreat.php" style ="color: white; background-color :rgba(0,0,0,0.6);">
        <?php 
            //get Infos
           
            $username = $_SESSION["username"];
            $email = $_SESSION["email"];
            $firstName = $_SESSION["firstName"];
            $lastName = $_SESSION["lastName"];
            $phone = $_SESSION["phone"];
            $adress = $_SESSION["adress"];
            $evaluation = $_SESSION["evaluation"];
            echo '
  <div class="form-group" align="center">
    <label for="firstname">First Name :</label><br>
    <input type="text" class="form-control-md" name="firstName" size ="50" value="'.$firstName.'" required>
      
  </div>
    <div class="form-group" align="center">
    <label for="lastName">Last Name :</label><br>
    <input type="text" class="form-control-md" name="lastName" size ="50" value="'.$lastName.'" required><br>
  </div>
    
    
    <div class="form-group" align="center">
    <label for="phone">Phone Number :</label><br>
    <input type="text" class="form-control-md" name="phone" size ="50" value="'.$phone.'" required>
  </div>
      
  
            <div class="form-group" align="center">
                    <label for="adress">Adress :</label><br>
            <textarea id="msg" class="form-control z-depth-1" name="adress" rows="3" cols = "20" required>'.$adress.'</textarea>
                </div>
                <div class="form-group" align="center">
                
    <label for="evaluation">Evaluation :</label><br>
    <small align="center" style="color:white;" class="error">How did you find goodiez on a scale of 1 to 10 ?</small><br>
  <input type="range" class="custom-range" min="0" max="10" step="1" name="evaluation" id="customRange3" value="'.$evaluation.'">
  </div>
                
                ';
            
            
            ?>
            <div class="form-row text-center">
    <div class="col-12">
        <button type="submit" class="btn btn-warning">Edit Account</button>
    </div>       
 </div>
</form>
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