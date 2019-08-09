<?php

class CoursesView extends CoursesController{
    public function showAllCourses(){
        $datas = $this->getCourses();
        foreach ($datas as $data){
            echo "Course Id: ".$data['courseId']."<br>";
            echo "Course Name: ".$data['courseName']."<br>";
            echo "Level Of Study: ".$data['levelOfStudy']."<br>";
            echo "Faculty: ".$data['faculty']."<br><br>";
        }
    }
}
