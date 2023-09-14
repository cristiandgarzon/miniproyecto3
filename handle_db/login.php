<?php
if($_SERVER ["REQUEST_METHOD"] === "POST"){

    $correo=$_POST["correo"];
    $contrasena=$_POST["contrasena"];

    require_once($_SERVER["DOCUMENT_ROOT"]. "/config/database.php");

    $stmnt=$mysqli->query("SELECT * FROM usuarios WHERE email='$correo'");

    if($stmnt->num_rows===1){
        $result=$stmnt->fetch_assoc();
        
    
        
        if(password_verify($contrasena, $result["contrasena"])){
            session_start();
            $_SESSION["user_data"]=$result;
            header("Location: /views/dashboard.php");
        }else{
            
            session_start();
            $_SESSION["invalida"]=true;
            header("Location: /views/login.php");
        };
    }

    


}