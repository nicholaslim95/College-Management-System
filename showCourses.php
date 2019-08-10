<!DOCTYPE html>
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
            <form class="form-inline" method="POST" action="#">
                <?php
                include_once 'classes/Database.php';
                include_once 'controllers/CoursesController.php';
                include_once 'views/CoursesView.php';

                $courses = new CoursesView();
                $courses->showAllCourses();
                $courses->insertIntoXML();
                ?> 
            </form>
            <table class="table">
                <tr>
                    <td align="center">
                         <a name="type" style="display: none">normal</a>
                         <input type="submit" name="submit" value="Compare" class="btn btn-default"/>
                    </td>
                    <td align="center">
                        <input type="button" value="View Shortlist" class="btn btn-default" id="btnShortlist" 
                               onClick="document.location.href = 'viewShortlist.php'"/>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
