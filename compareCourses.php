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
            <form class="form-inline" method="post" action="#">
                    <table class='table table-hover'>
                        <tr>
                        <tr>
                            <th colspan='2' style='text-align:center;'> Compare Courses</th>
                        </tr>
                        <?php
                        include_once 'classes/Database.php';
                        include_once 'controllers/CoursesController.php';
                        include_once 'views/CoursesView.php';

                        $courses = new CoursesView();
                        $courses->showcompareCourses("c1", "1st");
                        echo '</tr><tr>';
                        $courses->showcompareCourses("c2", "2nd");
                        ?>
                        </tr>
                        <tr>
                            <td colspan='2'  style='text-align:center;'>
                                <input type="submit" name="submit" value="Compare" class="btn btn-default"/>
                            </td>
                        </tr>
                    </table>
            </form>
            <div class="container">
            <form class="form-inline" method="POST" action="">
                    <table border="1" class='table table-hover'>
                        <tr>
                        <tr>
                            <th colspan='3' style='text-align:center;'>Comparison</th>
                        </tr>
                        <?php
                        include_once 'classes/Database.php';
                        include_once 'controllers/CoursesController.php';
                        include_once 'views/CoursesView.php';

                        $courses = new CoursesView();
                        $courses->showtableCompareCourse();
                        
                        
                        ?>
                        </tr>
                    </table>
            </form>
        </div>
    </body>
</html>
