<?php
    session_start();
    if(!isset($_SESSION["user_data"])){
        echo"Debes iniciar sesion<br><br>";
        echo"<a href='/views/login.php'>Login</a>";
        die();

    }
  
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/4baf7d2e5d.js" crossorigin="anonymous"></script>

    <title>dashboard</title>
    <link rel="stylesheet" href="/css/dashboard.css">
</head>

<body class="bodyDashboard">
    <?php
        

        

     
 
 
    
     $id=$_SESSION["user_data"]["id"];
    
     require_once($_SERVER["DOCUMENT_ROOT"]. "/config/database.php");
     $stmnt= $mysqli->query("SELECT*FROM usuarios WHERE id=$id");
     $result=$stmnt->fetch_assoc();
    // var_dump($result);
     $texto=strval($result["bio"]);
    
 



        $email = $result["email"];

        $name= ($result["nombre"]!=NULL)? $result["nombre"]:"Add your name";

        $bio= ($result["bio"]!=NULL)?$result["bio"]:"Edit your Bio";

        $phone=($result["phone"]!=NULL)?$result["phone"]:"Edit your phone number";

        $photo=($result["photo"]!=NULL)?base64_encode($result["photo"]):"Add a profile picture";



        $password=$_SESSION["user_data"]["contrasena"];
        $letters=substr($password,0, 10);
        $hidenpass=str_repeat('*',strlen($letters));


       
        
        //echo"<h1>Bienvenido, usuario con el correo: $email</h1>";


    ?>
    <nav class="navbar navbar-light bg-light navbar">
        <div class="container">
            <img class="logolg" src="/assets/devchallenges.svg" alt="">
            <div class="profileInfo">
                <div class="namecontainer">
                    <div class=imagendropdown>

                        <?php  
                        if($result["photo"]!=NULL){
                            echo "<img src='data:image/jpeg;base64," . $photo . "'>";
                        }else{
                            echo"<img src='/assets/user-solid.svg' alt='' width='30' >";
                        }
                        ?>
                    </div>


                    <p class="name"><strong><?php echo$name?></strong></p>
                </div>


                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle btnn1" type="button" data-bs-toggle="dropdown"
                        data-bs-display="static" aria-expanded="false"></button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start listadrp">
                        <li class="eli"><button class="btnli"><i class="fa-solid fa-user"></i><a
                                    href="/views/dashboard.php">My Profile</a></button></li>
                        <li class="eli"><button class="btnli"><i class="fa-solid fa-user-group"></i><a href="#">Group
                                    chat</a></button></li>
                        <li class="eli"><button class="btnli"><i class="fa-solid fa-arrow-right-from-bracket"></i><a
                                    href="/handle_db/logout.php">Logout</a></li></button>
                    </ul>
                </div>

            </div>
            <script>
            function redirect() {
                window.location.href = '/views/edit.php'
            }
            </script>


    </nav>
    <div class="titulolog">
        <h1>Personal Info</h1>
        <p>Basic info, like your name and photo</ 
    </div>



        <div class="genContainer">

            <div class="detailsContainer">
                <div class="Profiled">
                    <div class="profh">
                        <h2>Profile</h2>
                        <P>Some info may be visible to other people</P>
                    </div>
                    <div>
                        <button class="buttonEdt" onclick="redirect()">edit</button>
                    </div>
                </div>



                <ul class="listLog">
                    <li class="elist">
                        <p class="dcrptFirst">PHOTO </p>
                        <div class="imgcontainer">
                            <div class="imageninfo">
                                <?php  
                             if($result["photo"]!=NULL){
                            echo "<img src='data:image/jpeg;base64," . $photo . "'>";
                            }else{
                            echo"<img src='/assets/user-solid.svg' alt=''  >";
                            }
                        ?>
                            </div>
                        </div>


                    </li>
                    <li class="elist">
                        <p class="dcrpt">NAME </p><?php echo"<p class='useri'> $name</p>"?>
                    </li>
                    <li class="elist">
                        <p class="dcrpt">BIO </p><?php echo"<p class='useri'> $bio</p>"?>
                    </li>
                    <li class="elist">
                        <p class="dcrpt">PHONE </p><?php echo"<p class='useri'> $phone</p>"?>
                    </li>
                    <li class="elist">
                        <p class="dcrpt">EMAIL </p><?php echo"<p class='useri'> $email</p>"?>
                    </li>
                    <li class="elistLast">
                        <p class="dcrpt">PASSWORD </p><?php echo"<p class='useri'> $hidenpass</p>"?>
                    </li>
                </ul>

            </div>


        </div>




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>