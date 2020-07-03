<?php 
    include("connexion.php");
    $username = $_POST["username"];
    $password = $_POST["pass"];
    $id=0;
    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password';";
    if(isset($_POST["username"]) && isset($_POST["pass"]))
    {
        $result = mysqli_query($link,$sql);
        $row = mysqli_fetch_assoc($result);
        if($row == 0)
        {            
            echo "Wrong username or password";
            setcookie("loginWrong", 0, time() + 60);
            header("location:index.php");
        }
        else
        {
            $type = $row["type"];
            switch ($type)
            {
                case 0:
                    //ordinary client
                    session_start();
                    $_SESSION["username"] = $username;
                    $_SESSION["email"] = $row["email"];
                    $_SESSION["id"] = $row["id_user"];
                    $id = $_SESSION["id"];
                    $_SESSION["firstName"] = $row["firstName"];
                    $_SESSION["lastName"] = $row["lastName"];
                    $_SESSION["phone"] = $row["phone"];
                    $_SESSION["adress"] = $row["adress"];
                    $_SESSION["id"]=$row["id_user"];
                    if($row["evaluation"] != NULL)
                        $_SESSION["evaluation"] = $row["evaluation"];
                    else
                        $_SESSION["evaluation"] = 0;
                    setcookie("loginWrong", 1, time() + 3600);
                    header("location: client.php?id=".$id);
                    break;
                case 1:
                    //admin
                    session_start();
                    $_SESSION["admin"] = $username;
                    $_SESSION["email"] = $row["email"];
                    $_SESSION["firstName"] = $row["firstName"];
                    $_SESSION["lastName"] = $row["lastName"];
                    $_SESSION["phone"] = $row["phone"];
                    $_SESSION["adress"] = $row["adress"];
                    $id = $row["id_user"];
                    $_SESSION["id"]=$row["id_user"];
                    $_SESSION["username"] = $username;
                    if($row["evaluation"] != NULL)
                        $_SESSION["evaluation"] = $row["evaluation"];
                    else
                        $_SESSION["evaluation"] = 0;

                    setcookie("loginWrong", 1, time() + 3600);
                    header("location: admin.php?id=".$id);
                    break;
                case 2:
                    //gestionnaire
                    session_start();
                    $_SESSION["gestionnaire"] = $username;
                    $_SESSION["username"] = $username;
                    if($row["evaluation"] != NULL)
                        $_SESSION["evaluation"] = $row["evaluation"];
                    else
                        $_SESSION["evaluation"] = 0;
                    $_SESSION["email"] = $row["email"];
                    $_SESSION["firstName"] = $row["firstName"];
                    $_SESSION["lastName"] = $row["lastName"];
                    $_SESSION["phone"] = $row["phone"];
                    $_SESSION["adress"] = $row["adress"];
                    $id = $row["id_user"];
                    $_SESSION["id"]=$row["id_user"];
                    setcookie("loginWrong", 1, time() + 3600);
                    header("location: gestionnaire.php?id=".$id);
                    break;
                case 3:
                    //Livreuur
                    session_start();
                    $_SESSION["livreur"] = $username;
                    $_SESSION["username"] = $username;
                    if($row["evaluation"] != NULL)
                        $_SESSION["evaluation"] = $row["evaluation"];
                    else
                        $_SESSION["evaluation"] = 0;
                    $_SESSION["email"] = $row["email"];
                    $_SESSION["firstName"] = $row["firstName"];
                    $_SESSION["lastName"] = $row["lastName"];
                    $_SESSION["phone"] = $row["phone"];
                    $_SESSION["adress"] = $row["adress"];
                    $id = $row["id_user"];
                    $_SESSION["id"]=$row["id_user"];
                    setcookie("loginWrong", 1, time() + 3600);
                    header("location: livreur.php?id=".$id);
                    break;
            }
        }
    }
?>