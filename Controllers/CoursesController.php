<?php

class CoursesController extends Database {

    public function getCourses() {
        $sql = "SELECT * FROM courses";
        $result = $this->connect()->query($sql);
        $numRows = $result->rowCount();
        if ($numRows > 0) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function getCoursesBasedOnFacultyID() {
        $facultyId = $_GET['editCourseFacultyId'];
        $courseIdQuery = "SELECT courseId FROM courses WHERE faculty = '$facultyId'";
        $result = $this->connect()->query($courseIdQuery);
        $numRows = $result->rowCount();
         foreach ($result as $row){
                echo "<option value=$row[courseId]>$row[courseId]</option>";
            }
    }

//
//    public function getSpecificCoursesData($courseId) {
//        $stmt = $this->connect()->query("SELECT * FROM courses WHERE courseId = '" . $courseId . "'");
//        while ($row = $stmt->fetch()) {
//            $this->courseName = $row['courseName'];
//            $this->levelOfStudy = $row['levelOfStudy'];
//            $this->faculty = $row['faculty'];
//        }
//    }
}
