<!DOCTYPE html>
<!--
// @author: Kee Siang Hock
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
                include_once 'controllers/BranchesController.php';
                include_once 'controllers/CoursesController.php';
                include_once 'views/BranchesView.php';
                include_once 'views/CoursesView.php';

                if (isset($_GET['shortlistType'])) {
                    if ($_GET['shortlistType'] == 'Courses') {
                        $courses = new CoursesView();
                        $courses->showXMLtable();
                    } else {
                        $branches = new BranchesView();
                        $branches->showXMLtable();
                    }
                } else {
                    $courses = new CoursesView();
                    $courses->showXMLtable();
                }
                ?>
            </h3>
        </div>
        <div>
            <table class="table">
                <tr>
                    <td align="center">
                        <?php
                        if (isset($_GET['shortlistType'])) {
                            if ($_GET['shortlistType'] == 'Courses') {
                                ?>
                                <input type="button" value="Compare Shortlist" class="btn btn-default" id="btncompShortlist" 
                                       onClick="document.location.href = 'compareCourses.php?type=compareShortlist'"/>
                                       <?php
                                   } else {
                                       ?>
                                <input type="button" value="Compare Shortlist" class="btn btn-default" id="btncompShortlist" 
                                       onClick="document.location.href = 'compareBranches.php?type=compareBranches'"/>
                                       <?php
                                   }
                               } else {
                                   ?> 
                            <input type="button" value="Compare Shortlist" class="btn btn-default" id="btncompShortlist" 
                                   onClick="document.location.href = 'compareCourses.php?type=compareShortlist'"/>                           
                                   <?php
                               }
                               ?>

                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>
