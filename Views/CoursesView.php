<?php

class CoursesView extends CoursesController {

    public function showAllCourses() {

        $datas = $this->getCourses();

        echo "<table border='1' class=table><br />";
        echo "<tr><th colspan='5' style='text-align:center;'> All Courses</th></tr>";
        echo "<tr><th style='text-align:center;'>Course ID</th>"
        . "<th style='text-align:center;'>Course Name</th>"
        . "<th style='text-align:center;'>Faculty</th>"
        . "<th style='text-align:center;'>Level Of Study</th>"
        . "<th style='text-align:center;'>Action</th></tr>";
        foreach ($datas as $data) {
            echo "<tr>";
            echo "<td style='text-align:center;'>" . $data['courseId'] . " </td>";
            echo "<td style='text-align:center;'>" . $data['courseName'] . " </td>";
            echo "<td style='text-align:center;'>" . $data['levelOfStudy'] . " </td>";
            echo "<td style='text-align:center;'>" . $data['faculty'] . " </td>";
            echo "<td style='text-align:center;'><a class='btn btn-default' href='showCourses.php?short=" . $data['courseId'] . "'>Shortlist</a></td>";
            echo "</tr>";
        }
    }

}
