 <?php session_start();
    include("connexion.php");
    $idG = $_SESSION["id"];
$sql = "SELECT id_market AS m FROM gestionnaire WHERE id_user='$idG';";
$result = mysqli_query($link, $sql);
$data = mysqli_fetch_assoc($result);
$market = $data["m"];
    $_SESSION["market"] = $market;
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
                            <a class="nav-link active" href="addProduct.php">Product</a>
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
        <!-- Menu -->
        <div class="container">
            <div class="row-text-center">
            <div class="col-md-12">
                                    <h3 class="titleIndex" style="border : solid 3px white; margin-top: 75px;">Add a product</h3>

                    <form id="joinForm" method="post" action ="addProductTreat.php" enctype="multipart/form-data">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Product's name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                    <label for="exampleInputEmail1">Price per unit</label>
    <input type="text" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div> 
                        <div class="form-group">
  <label for="exampleFormControlTextarea1">Description</label>
  <textarea class="form-control rounded-0" name="description" id="exampleFormControlTextarea1" rows="2"></textarea>
</div>
                        <div class="form-group">
                    <label for="exampleInputEmail1">In Stock</label>
    <input type="text" name="stock" class="form-control" placeholder="How much you have in stock" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div> 
                        <div class="form-group">
                    <label for="exampleInputEmail1">Product's Image</label>
    <input type="file" name="photo" class="form-control" placeholder="How much you have in stock" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div> 
                        <label for="exampleInputEmail1">Catalogue</label>
                        <select class="custom-select" name ="catalogue">
  <option value ="" selected>-- Select a catalogue --</option>
                            <?php 
                                $sql1 = "SELECT * FROM catalogue WHERE id_market = '$market';";
                                $result2 = mysqli_query($link, $sql1);
                                while($data1 = mysqli_fetch_assoc($result2))
                                {
                                    $catalogue1 = $data1["lib_catalogue"];
                                    $idCatalogue = $data1["id_catalogue"];
                                    echo "<option value ='".$idCatalogue."'>".$catalogue1."</option>";

                                }
                            
                            ?>
                        </select><br><br>
                        <label for="exampleInputEmail1">Category</label>
                        <select class="custom-select" name ="category">
  <option value ="" selected>-- Select a Category --</option>
                            <?php 
                                $sql2 = "SELECT rub.id_rubrique as category,rub.lib_rubrique as lib FROM rubrique as rub INNER JOIN catalogue as c ON rub.id_catalogue = c.id_catalogue WHERE c.id_market = '$market';";
                                $result3 = mysqli_query($link, $sql2);
                                while($data2 = mysqli_fetch_assoc($result3))
                                {
                                    $category1 = $data2["lib"];
                                    $idCategory = $data2["category"];
                                    echo "  <option value ='".$idCategory."'>".$category1."</option>";

                                }
                            
                            ?>
                        </select><br><br>
                        <div class="col-md-5"></div>
                        <div class="col-md-7">
                <input type="submit" class="btn btn-warning" value="submit">
                </div></form>
                
                </div>
        </div>
        </div>
        <div class='ntg' style='margin-bottom : 150px;'></div>
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