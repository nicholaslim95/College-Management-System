<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title></title>
    </head>
    <body>
        <form method="POST">
        <p>Staff Faculty Page</p>
        Enter programme name:               <input  type="text" name="ProgrammeName" value="" align="" /><br />
        Enter programme ID:                 <input type="text" name="ProgrammeID" value="" /><br />
        Enter programme Description:        <input type="text" name="ProgrammeDesc" value="" /><br />
        Enter Minimum Entry Requirements:   <input type="text" name="MER" value=""/><br />
        Enter Duration Period:              <input type="text" name="duration" value=""/><br />
        <input type="submit" name="submitProgrammeInfo" value="Submit" /></br>
        
        <?php
        include_once 'classes/Database.php';
        include_once 'controllers/ProgrammeController.php';
        include_once 'views/ProgrammeView.php';
        $programme = new ProgrammeController();
        $programme-> insertIntoDatabase();
        $programme->insertIntoXML();
       
        $programme2 = new ProgrammeView();
        $programme2->showXMLtable();
        
        ?>
        </form>
        

    </body>
</html>
