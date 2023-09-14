<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/index.css">
    <script src="https://kit.fontawesome.com/4baf7d2e5d.js" crossorigin="anonymous"></script>
    <title>login</title>
</head>

<body class="body_login">
    <div class="Container2">
        <div class="logor">
            <img src="/assets/devchallenges.svg" alt="" class="logo1">
        </div>
        <h3>Login</h3>

        <form action="/handle_db/login.php" method="post" class="formal">

            <div class="mb-3 login">
                <i class="fa-solid fa-envelope iconi"></i>
                <input type="email" name="correo" class="form-control" required placeholder="Email">

            </div>
            <div class="mb-3 login">
                <i class="fa-solid fa-lock iconi"></i>
                <input type="password" name="contrasena" class="form-control" required placeholder="Password">
            </div>

            <button type="submit" class="btn btn-primary btnlog">Login</button>

        </form>
        <br>
        <?php

         session_start();
          if(isset($_SESSION["invalida"])){
            echo"<div class='alert alert-danger' role='alert'>
            Incorrect password
           </div>";
           unset($_SESSION["invalida"]);
           }
    
        ?>
        <br>
        <small>or continue with these social profile</small>
        <div class="redes">
            <img class="red" src="/assets/Google.svg" alt="Google">
            <img class="red" src="/assets/Facebook.svg" alt="Facebook">
            <img class="red" src="/assets/Twitter.svg" alt="Twitter">
            <img class="red" src="/assets/Gihub.svg" alt="Github">
        </div>
        <p>Don't have an account yet? <a href="/index.php">Register</a></p>
    </div>


</body>

</html>