<?php

// Create connection
$conn = mysqli_connect("localhost","root","","crud") ;

//chech connection 
if(!$conn){
    die("connection failed:" .mysqli_connect_error());
}


?>