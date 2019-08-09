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
            <form class="form-inline" method="POST" action="shortlist.php">
                <?php
                include_once 'classes/Database.php';
                include_once 'controllers/CoursesController.php';
                include_once 'views/CoursesView.php';

                $courses = new CoursesView();
                $courses->showAllCourses();
                
                
                require "db_connect.php"; // connection to database 
                //delete row on button delete click and show alert
                if (isset($_GET["short"])) {
                    $courseid = $_GET["short"];
                    setcookie(course1, $cookie_value);
                    echo "<script type='text/javascript'>alert(''.$courseid.' Add to shortlist.');</script>";
                }

                $sqlcourses = "SELECT * FROM courses";  // Query to collect data from table 
                $result = $dbConn->query($sqlcourses);
                if ($result->num_rows > 0) {
                    echo "<table border='1' class=table><br />";
                    echo "<tr><th colspan='4' style='text-align:center;'> All Courses</th></tr>";
                    echo "<tr><th style='text-align:center;'>Course ID</th>"
                    . "<th style='text-align:center;'>Course Name</th>"
                    . "<th style='text-align:center;'>Faculty</th>"
                    . "<th style='text-align:center;'>Action</th></tr>";
                    foreach ($dbConn->query($sqlcourses) as $row) {
                        echo "<tr>";
                        echo "<td style='text-align:center;'>" . $row["courseId"] . " </td>";
                        echo "<td style='text-align:center;'>" . $row["courseName"] . " </td>";
                        echo "<td style='text-align:center;'>" . $row["faculty"] . " </td>";
                        echo "<td style='text-align:center;'><a class='btn btn-default' href='showCourses.php?short=" . $row["courseId"] . "'>Shortlist</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<p>&nbsp;</p>";
                    echo "No Course.";
                }
                ?> 

        </div>
        <div>
            <table class="table">
                <tr>
                    <td align="center">
                        <input type="button" value="Compare Courses" class="btn btn-default" id="btnCompare" 
                               onClick="document.location.href = 'compareCourses.php'"
                    </td>
                    <td align="center">
                        <input type="button" value="View Shortlist" class="btn btn-default" id="btnShortlist" 
                               onClick="document.location.href = 'viewShortlist.php'"
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
