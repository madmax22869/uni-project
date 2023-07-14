<?php

function dbconnect(){

    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "e_commerce_database";

    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name) or die("Could not connect to db ". $conn->error);

    return $conn;


}

function closeconnection($conn){
    $conn->close();
}

?>


