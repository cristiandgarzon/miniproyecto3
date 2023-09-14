<?php
    session_start();
    if(!isset($_SESSION["user_data"])){
        echo"Debes iniciar sesion";
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
    <title>dashboard</title>
    <link rel="stylesheet" href="/css/dashboard.css">
</head>

<body class="bodyDashboard">
    <?php
        
        $email = $_SESSION["user_data"]["email"];

        $name= ($_SESSION["user_data"]["name"]!=NULL)? $_SESSION["user_data"]["name"]:"Add your name";

        $bio= ($_SESSION["user_data"]["bio"]!=NULL)?$_SESSION["user_data"]["bio"]:"Edit your Bio";

        $phone=($_SESSION["user_data"]["phone"]!=NULL)?$_SESSION["user_data"]["phone"]:"Edit your phone number";

        $photo=($_SESSION["user_data"]["photo"]!=NULL)?$_SESSION["user_data"]["photo"]:"Add a profile picture";



        $password=$_SESSION["user_data"]["contrasena"];
        $letters=substr($password,0, 10);
        $hidenpass=str_repeat('*',strlen($letters));



       var_dump($_SESSION["user_data"]);

        
        echo"<h1>Bienvenido, usuario con el correo: $email</h1>";


    ?>
    <nav class="navbar navbar-light bg-light navbar">
        <div class="container">
            <img class="logolg" src="/assets/devchallenges.svg" alt="">
            <div class="profileInfo">
                <img src="/assets/user-solid.svg" alt="" width="30">
                <p class="name"><strong><?php echo$name?></strong></p>
            </div>



    </nav>
    <div class="titulolog">
        <h1>Personal Info</h1>
        <p>Basic info, like your name and photo</ </div>



        <div class="genContainer">

            <div class="detailsContainer">
                <div class="Profiled">
                    <h2>Profile</h2>
                    <P>Some info may be visible to other people</P>
                </div>

                <ul class="listLog">
                    <li class="elist"><p class="dcrpt">PHOTO </p><?php echo"<p class='useri'> $photo</p>"?></li>
                    <li class="elist"><p class="dcrpt">NAME </p><?php echo"<p class='useri'> $name</p>"?></li>
                    <li class="elist"><p class="dcrpt">BIO </p><?php echo"<p class='useri'> $bio</p>"?></li>
                    <li class="elist"><p class="dcrpt">PHONE </p><?php echo"<p class='useri'> $phone</p>"?></li>
                    <li class="elist"><p class="dcrpt">EMAIL </p><?php echo"<p class='useri'> $email</p>"?></li>
                    <li class="elist"><p class="dcrpt">PASSWORD </p><?php echo"<p class='useri'> $hidenpass</p>"?></li>
                </ul>

            </div>

            <a href="/handle_db/logout.php">Logout</a>
        </div>





</body>

</html>