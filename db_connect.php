<?php

$dbUser = "root";
$dbPass = "";
$dbDatabase = "testq";
$dbHost = "localhost";

$dbConn = mysqli_connect($dbHost, $dbUser, $dbPass);
if($dbConn){
   mysqli_select_db($dbConn, $dbDatabase); 
} else {
    die("<strong>Error:</strong> Could not connect to database");
}


