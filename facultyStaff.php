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
        <form method="POST">
        <p>Staff Faculty Page</p>
        Enter programme name:               <input type="text" name="ProgrammeName" value="" align="" /><br />
        Enter programme ID:                 <input type="text" name="ProgrammeID" value="" /><br />
        Enter programme Description:        <input type="text" name="ProgrammeDesc" value="" /><br />
        Enter Minimum Entry Requirements:   <input type="text" name="MER" value=""/><br />
        Enter Duration Period:              <input type="text" name="duration" value=""/><br />
        <input type="submit" name="submitProgrammeInfo" value="Submit" /></br>
        
        <?php
        include_once 'classes/Database.php';
        include_once 'controllers/ProgrammeController.php';
        $programme = new ProgrammeController();
        $programme-> insertIntoDatabase();
        
        ?>
        </form>
    </body>
</html>
