 <?php session_start();?>
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
    <body style="background-image : url('slider/slide0.jpg');background-repeat : no-repeat;  background-size: 100% 100%;background-position: right 30% top -10% ;">    

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
                            <a class="nav-link" href="admin.php">Add<span style='color:#343a40;'>_</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="modifyAdmin.php">Modify<span style='color:#343a40;'>_</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="assignAdmin.php">Assign</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="requestsAdmin.php">Requests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="gainsAdmin.php">Gains</a>
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
                <a href="admin.php"><button type="button" class="btn btn-sm btn-warning" style="padding: 5px 10px;">Admin<span></span></button></a>
                    </div>
            
            </div>
            </div>
        </nav>
        <!-- Menu Gestionnaire-->
        <div class="container-fluid" style="margin : 20px 0;padding: 10px 0 6px 0">
        <div class="row text-center">
            <div class="col-md-5 offset-md-1">                
                <form method ="post" action="assignG.php" style="background-color:rgba(0,0,0,0.7); border-radius : 5px; padding: 20px 5px;" id="loginForm.php">

                <h3 class="titleIndex" style="background-color : black;border : solid 3px white;">Gestionnaire</h3>
                <img class="aboutIcons" src="slider/gestion.png">
                <select class="browser-default custom-select" name="gestion">
                    <?php 
                        include("connexion.php");
                        $sqlG = "SELECT * FROM gestionnaire WHERE id_market IS NULL;";
                        $resultG = mysqli_query($link, $sqlG);
                    echo "<option value='' selected>"."---- Select An Admin to Market ----"."</option>";
                        while($var = mysqli_fetch_assoc($resultG))
                        {
                            $idG = $var["id_user"];
                            $sqlG2 = "SELECT * FROM user WHERE id_user='$idG'; ";
                            $resultG2 = mysqli_query($link, $sqlG2);
                            $data = mysqli_fetch_assoc($resultG2);
                            $usernameG = $data["username"];
                            echo "<option value='$idG'>".$usernameG."</option>";
                        }
                    ?>
                    </select><br><br>
                  <select class="browser-default custom-select" name="market">
 
                    <?php 
                        include("connexion.php");
                        $sqlM = "SELECT * FROM market;";
                        $resultM = mysqli_query($link, $sqlM);
                        echo "<option value='' selected>"."---- Select A market ----"."</option>";
                        while($varM = mysqli_fetch_assoc($resultM))
                        {
                            $idM = $varM["id_market"];
                            $name = $varM["name"];
                            echo "<option value='$idM'>".$name."</option>";
                        }
                    ?>
                    </select>
                    <br>
                    <br>
                    <input type="submit" value="Assign" class="btn btn-warning">
                </form>
            </div>
                    <!-- Menu livreur-->

            <div class="col-md-5">
                <form method ="post" action="assignS.php" style="background-color:rgba(0,0,0,0.7); border-radius : 5px; padding: 20px 5px;" id="loginForm.php">
                    <h3 class="titleIndex" style="background-color : black;border : solid 3px white;">Delivery</h3>
                    <img class="aboutIcons" src="slider/delivery1.png">
                <select class="browser-default custom-select" name="livreur">

                <?php 
                        //pull delivery guys
                        include("connexion.php");
                        $sqlS = "SELECT * FROM livreur WHERE state = 1;";
                        $resultS = mysqli_query($link, $sqlS);
                    echo "<option value='' selected>"."---- Select A Delivery Man ----"."</option>";
                        while($var = mysqli_fetch_assoc($resultS))
                        {
                            $idS = $var["id_user"];
                            $sqlS2 = "SELECT * FROM user WHERE id_user='$idS'; ";
                            $resultS2 = mysqli_query($link, $sqlS2);
                            $dataS = mysqli_fetch_assoc($resultS2);
                            $usernameS = $dataS["username"];
                            echo "<option value='$idS'>".$usernameS."</option>";
                        }
                    ?>
                    </select><br><br>
                  <select class="browser-default custom-select" name="commande">
 
                    <?php 
                      //pull orders
                        include("connexion.php");
                        $sqlC = "SELECT * FROM commande WHERE command_state=0;";
                        $resultC = mysqli_query($link, $sqlC);
                        echo "<option value='' selected>"."---- Select An order to be assigned ----"."</option>";
                        while($varC = mysqli_fetch_assoc($resultC))
                        {
                            $idC = $varC["id_commande"];
                            $iduserC = $varC["id_client"];
                            $sqlUser = "SELECT * FROM user WHERE id_user ='$iduserC';";
                            $resultUser = mysqli_query($link, $sqlUser);
                            $dataUser = mysqli_fetch_array($resultUser);
                            $fullName = "Order ".$idC." Of ".$dataUser["firstName"]." ".$dataUser["lastName"];
                            echo "<option value='$idC'>".$fullName."</option>";
                        }
                    ?>
                    </select>
                    <br>
                    <br>
                    <input type="submit" value="Assign" class="btn btn-warning">
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