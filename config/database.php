<?php
try{
    
    $hostname="localhost";
    $username= "root";
    $password= "";
    $dbname="miniproyecto";

    $mysqli= new mysqli($hostname, $username, $password, $dbname);



}catch(mysqli_sql_exception $e){
    echo "error: ". $e->getMessage();
}




?>