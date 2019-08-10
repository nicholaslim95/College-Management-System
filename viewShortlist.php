<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title></title>
    </head>
    <body>
        <div class="container">
            <h3>
                <?php
                include_once 'classes/Database.php';
                include_once 'controllers/CoursesController.php';
                include_once 'views/CoursesView.php';

                $courses = new CoursesView();
                $courses->showXMLtable();
                ?>
            </h3>
        </div>
        <div>
            <table class="table">
                <tr>
                    <td align="center">
                        <input type="button" value="Compare Shortlist" class="btn btn-default" id="btncompShortlist" 
                               onClick="document.location.href = 'compareCourses.php?type=compareShortlist'"/>
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>
