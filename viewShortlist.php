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
            <form class="form-inline" method="POST" action="compareCourses.php">
                <div class="form-group">
                    <table class="table table-hover">
                        <tr>
                            <?php
                            require "db_connect.php"; // connection to database 

                            echo "1st Course : <select name=cou1 id='c1' class=form-control onchange=AjaxFunction();>
                            <option value=''>Select Course</option>";

                            $sql2 = "SELECT * FROM courses"; // Query to collect data from table 

                            foreach ($dbConn->query($sql2) as $row) {
                                echo "<option value=$row[courseId]>$row[faculty] - $row[courseName]</option>";
                            }
                            ?>
                        </tr>
                        <tr>
                            <?php
                            require "db_connect.php"; // connection to database 

                            echo "<br>2nd Course : <select name=cou2 id='c2' class=form-control onchange=AjaxFunction();>
                            <option value=''>Select Course</option>";

                            $sql2 = "SELECT * FROM courses"; // Query to collect data from table 

                            foreach ($dbConn->query($sql2) as $row) {
                                echo "<option value=$row[courseId]>$row[faculty] - $row[courseName]</option>";
                            }
                            ?>
                        </tr>
                        <tr>
                        <input type="submit" value="Compare" class="btn btn-default" /> 
                        </tr>
                    </table>

                </div>
            </form>
            <p>&nbsp;</p>
            <h3>
                <?php
                //delete row on button delete click and show alert
                if (isset($_GET["short"])) {
                    $courseid = $_GET["short"];
                    setcookie(course1, $cookie_value);
                    echo "<script type='text/javascript'>alert(''.$courseid.' has been deleted.');</script>";
                }

                $sqlcourses = "SELECT * FROM courses";  // Query to collect data from table 
                echo "Courses : ";
                $result = $dbConn->query($sqlcourses);
                if ($result->num_rows > 0) {
                    echo "<table border='1' class=table><br />";
                    echo "<p>&nbsp;</p>";
                    echo "<tr><th style='text-align:center;'>Course ID</th>"
                    . "<th style='text-align:center;'>Course Name</th>"
                    . "<th style='text-align:center;'>Faculty</th>"
                    . "<th style='text-align:center;'>Action</th></tr>";
                    foreach ($dbConn->query($sqlcourses) as $row) {
                        echo "<tr>";
                        echo "<td style='text-align:center;'>" . $row["courseId"] . " </td>";
                        echo "<td style='text-align:center;'>" . $row["courseName"] . " </td>";
                        echo "<td style='text-align:center;'>" . $row["faculty"] . " </td>";
                        echo "<td style='text-align:center;'><a class='btn btn-default' href='compareCourses.php?short=" . $row["courseId"] . "'>Shortlist</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<p>&nbsp;</p>";
                    echo "No Course.";
                }
                ?>
            </h3>
        </div>
    </body>
</html>
