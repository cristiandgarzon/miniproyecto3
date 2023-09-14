<?php
if ($_SERVER["REQUEST_METHOD"]=== "POST"){
    
    $correo= trim($_POST["correo"]); 
    $contrasena = trim($_POST["contrasena"]);
    $hash=password_hash($contrasena, PASSWORD_DEFAULT);
    
    require_once($_SERVER["DOCUMENT_ROOT"]."/config/database.php");

    try{
        $result=$mysqli->query("INSERT INTO usuarios(email, contrasena)VALUES('$correo','$hash')");

        if($result){
            header("location:/views/dashboard.php");
            
        }else{
            echo"error al registrar usuario";
        }
     
     //aca estamos viendo si el correo esta duplicado y de estarlo se crea duplicado 
   }catch(mysqli_sql_exception $e){
        
        if($mysqli->errno === 1062){
            
            session_start();
            $_SESSION["duplicado"]=true; 
            header("Location: /index.php");
            
        }else{
            echo"error: ". $e->getMessage();
        };
    };
 
    
    
}
