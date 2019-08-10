<?php

class CoursesView extends CoursesController {

    public function showAllCourses() {

        $datas = $this->getCourses();

        echo "<table border='1' class='table table-hover'><br />";
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

    public function showcompareCourses($id, $number) {

        $datas = $this->getCourses();
        echo "<tr><td style='text-align:center;'>" . $number . " Courses</th>"
        . "<td style='text-align:center;'>"
        . "<select name='" . $id . "' class=form-control onchange=AjaxFunction();>"
        . "<option value=''>---Select Course---</option>";
        foreach ($datas as $data) {
            echo "<option value='" . $data['courseId'] . "'>" . $data['courseId'] . " - " . $data['courseName'] . "</option>";
        }
        echo "</td>";
    }

    public function showtableCompareCourse() {
        $fee = array();
        $datas = $this->getCompare(); //aray inside got 2 values
        echo "<tr><td style='text-align:center;'>Course ID</td>";
        if (!empty($datas)) {
            foreach ($datas as $data) {
                echo "<td style='text-align:center;'>" . $data['courseId'] . "</td>";
            }
            echo "</tr><tr><td style='text-align:center;'>Course Name</td>";
            foreach ($datas as $data) {
                echo "<td style='text-align:center;'>" . $data['courseName'] . "</td>";
            }
            echo "</tr><tr><td style='text-align:center;'>Level Of Study</td>";
            foreach ($datas as $data) {
                echo "<td style='text-align:center;'>" . $data['levelOfStudy'] . "</td>";
            }
            echo "</tr><tr><td style='text-align:center;'>Faculty</td>";
            foreach ($datas as $data) {
                echo "<td style='text-align:center;'>" . $data['faculty'] . "</td>";
            }
            echo "</tr><tr><td style='text-align:center;'>Fee</td>";
            foreach ($datas as $data) {
                echo "<td style='text-align:center;'>" . $data['fee'] . "</td>";
                array_push($fee, $data['fee']);
            }
            require 'lib/nusoap.php';
            $client = new nusoap_client("http://localhost:/college-management-system/web_service/service.php?wsdl");
            $cheapestFee = $client->call('compareFee', array("course1Fee" => $fee[0], "course2Fee" => $fee[1]));
            echo "</tr><tr><td colspan='3' style='text-align:center;'>Cheapest :" . $fee[0] . "</td>";
        } else {
            echo "<td style='text-align:center;'>Please Choose Course</td>";
        }
        echo "</tr>";
    }

}
