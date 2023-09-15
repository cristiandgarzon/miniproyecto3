<?php
if ($_SERVER["REQUEST_METHOD"]=== "POST"){
 var_dump($_POST);


  $id=$_POST["id"];
  $newemail= trim($_POST["email"]);
  $newcontrasena=trim($_POST["contrasena"]);
  $newphoto=$_POST["imagen"];
  $newname=$_POST["nombre"];
  $newbio=$_POST["bio"];
  $newphone=$_POST["phone"];


 

$new_hash=password_hash($newcontrasena, PASSWORD_DEFAULT);

  require_once($_SERVER["DOCUMENT_ROOT"]."/config/database.php");

 try{

    $result=$mysqli->query("UPDATE usuarios SET email='$newemail',contrasena='$new_hash', photo='$newphoto', nombre='$newname', bio='$newbio', phone=$newphone WHERE id=$id");

    if($result){
       header("location:/views/dashboard.php");
       
   }else{
       echo"error: ". $e->getMessage();;
   }





 }catch(mysqli_sql_exception $e){
        
    if($mysqli->errno === 1062){
        
        session_start();
        $_SESSION["duplicado"]=true; 
        header("Location: /views/update.php");
        
    }else{
        echo"error: ". $e->getMessage();
    };
};
    
 
    // se tiene que revisar que el correo no este duplicado nuevamente ya que de estarlo se crea la variable de session duplicado 

};








?>