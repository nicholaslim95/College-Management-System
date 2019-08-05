<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
         require("db_connect.php");
         
         $sql = "SELECT * from users;";
         $result = mysqli_query($dbConn, $sql);
         
         $resultCheck = mysqli_num_rows($result);
         
         if($resultCheck > 0){
             while($row = mysqli_fetch_assoc($result)){
                 echo $row['username'] ."</br>" ;
             }
         }
        ?>
    </body>
</html>
