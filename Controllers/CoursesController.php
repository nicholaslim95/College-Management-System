<?php

class CoursesController extends Database {

    public function getCourses() {
        $sql = "SELECT * FROM courses`";
        $result = $this->connect()->query($sql);
        $numRows = $result->fetchColumn();
        if($numRows > 0){
            while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                $data[] = $row;
            }
            return $data;
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
