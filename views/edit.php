<?php
    session_start();
    if(!isset($_SESSION["user_data"])){
        echo"Debes iniciar sesion<br><br>";
        echo"<a href='/views/login.php'>Login</a>";
        die();

    }
  
?>
<?php
 
 
    
    $id=$_SESSION["user_data"]["id"];
    
    require_once($_SERVER["DOCUMENT_ROOT"]. "/config/database.php");
    $stmnt= $mysqli->query("SELECT*FROM usuarios WHERE id=$id");
    $result=$stmnt->fetch_assoc();
    //var_dump($result);
    $texto=strval($result["bio"]);
    $name=$result["nombre"]
    
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>endit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/4baf7d2e5d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/edit.css">
</head>

<body class="bodyedit">
    


    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <img class="logolg" src="/assets/devchallenges.svg" alt="">
            <div class="profileInfo">
                <div class="namecontainer">
                    <img src="/assets/user-solid.svg" alt="" width="30">
                    <p class="name"><strong><?php echo$name?></strong></p>
                </div>


                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle btnn1" type="button" data-bs-toggle="dropdown"
                        data-bs-display="static" aria-expanded="false"></button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-lg-start listadrp">
                        <li class="eli"><button class="btnli"><i class="fa-solid fa-user"></i><a href="/views/dashboard.php">My Profile</a></button></li>
                        <li class="eli"><button class="btnli"><i class="fa-solid fa-user-group"></i><a href="#">Group chat</a></button></li>
                        <li class="eli"><button class="btnli"><i class="fa-solid fa-arrow-right-from-bracket"></i><a
                                href="/handle_db/logout.php">Logout</a></li></button>
                    </ul>
                </div>

            </div>


    </nav>

    <h2>change Info</h2>
    <p>Changes will be reflected to every services</p>
    <a href="/views/dashboard.php">Back</a><br><br>

    <div class="infocontainer">
        <form action="/handle_db/update.php" method="post">
            <input type="number" name="id" hidden value="<?=$result["id"] ?>">
            <div>
                <img src="/assets/user-solid.svg" width="50" alt="">
                <label for="imagen">ADD PHOTO</label>
                <input type="file" id="imagen" name="imagen" accept="iamage/jpeg, image/png " hidden>

            </div><br><br>
            <div class="mb-3">
                <label class="form-label">name</label><br>
                <input type="text" class="form-control" name="nombre" value='<?=($result["nombre"]!=NULL)?$result["nombre"]:"Enter your name . . .";?>'>
            </div>


            <div class="mb-3">
                <label>Bio</label><br>
                <textarea type="text" class="form-control" rows="3" name="bio" minlength="20"><?=($result["bio"]!=NULL)?$result["bio"]:"Enter your bio . . .";?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Phone</label><br>
                <input type="number" class="form-control" name="phone" 
                    
                    value='<?=($result["phone"])?$result["phone"]:"Enter your phone . . .";?>'>
            </div>


            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required value='<?=($result["email"]!=NULL)?$result["email"]:"Enter your Email . . .";?>'>

            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="contrasena" class="form-control" 
                    minlength="4" required>

            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php
        
        if (isset($_SESSION["duplicado"])) {
            echo "<div class='alert alert-danger' role='alert'>
          The email is already in use
          </div>";
            unset($_SESSION["duplicado"]);
        }
        ?>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>