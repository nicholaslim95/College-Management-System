<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form method="POST" ><!--action="addFacultyToDB.php" -->
              <h3>Create new faculty</h3>
            Enter faculty code: <input type="text" name="facultyCode" value="" /><br />
            Enter faculty name: <input type="text" name="facultyName" value="" /><br />
            <input type="submit" name="submitFaculty" value="Submit" /></br>
            <?php
            include_once 'classes/Database.php';
            include_once 'controllers/FacultyController.php';
            include_once 'views/FacultyView.php';
            $faculty = new FacultyView();

            $faculty->insertIntoXML();
            $faculty->showXMLtable();
            $faculty->insertIntoDatabase();
            ?>
            </br></br></br>
        </form>

        <form method="POST" action="addFacultyToDB.php">
            <h3>Create new course</h3>
            Enter course id: <input type="text" name="courseId" value="" /><br />
            Enter course name: <input type="text" name="courseName" value="" /><br />
            Select level of study<select name="levelOfStudy">
                <option>Diploma</option>
                <option>Degree</option>
                <option>Masters</option>
                <option>PHD</option>
            </select><br />
            Which faculty does this course belong to? <select name="facultyId">
                <?php
                include_once 'classes/Database.php';
                include_once 'controllers/FacultyController.php';
                
                $faculty = new FacultyView();
                $faculty -> getFaculties();
                
               
//                require('db_connect.php');
//                $facultyCodeQuery = "SELECT facultyCode FROM faculties";
//                foreach ($dbConn->query($facultyCodeQuery) as $row) {
//                    echo "<option value=$row[facultyCode]>$row[facultyCode]</option>";
//                }
                ?>
            </select></br>
            How many credit hour this course has?: <input type="text" name="createCourseCreditHour" value="" /><br>
            What is the price per credit hour? <input type="text" name="createCoursePricePerCredit" value="" /><br>
            <input type="submit" value="Submit" /></br></br></br>
        </form>
        <form>
            <h3>Edit course</h3>
            Select a faculty <select name="editCourseFacultyId" onChange="this.form.submit()">
                <option value="" disabled selected>---Please select a course---</option>
                <?php
                $faculty = new FacultyView();
                $faculty->getFaculties();
//                require('db_connect.php');
//                $facultyCodeQuery = "SELECT facultyCode FROM faculties";
//                foreach ($dbConn->query($facultyCodeQuery) as $row) {
//                    echo "<option value=$row[facultyCode]>$row[facultyCode]</option>";
//                }
                ?>
            </select></br>

        </form>

        <form method="GET"> <!--action="addFacultyToDB.php"-->
            Select a course <select name="selectCourseId" onchange="this.form.submit()">
                <option value="" disabled selected>---Please select a course---</option>
                <?php
                include_once 'classes/Database.php';
                include_once 'controllers/CoursesController.php';
                $courseBasedOnFacultyId = new CoursesController();
                
                $courseBasedOnFacultyId->getCoursesBasedOnFacultyID();
                
                ?>
            </select></br>
            Course name: <input type="text" name="courseName" value="<?php echo $courseBasedOnFacultyId->getCoursesBasedOnCourseId()?>" /><br>
            Current level of study:  <input type="text" name="levelOfStudy" value="" /> New level of study:<select name="dropDownListLevelOfStudy">
                <option>Diploma</option>
                <option>Degree</option>
                <option>Master</option>
                <option>PHD</option>
            </select><br>
            <!--<input type="submit" value="Submit" />-->
        </form>
        <form>
            <h3>Calculate course price</h3>
            <?php
                include_once 'views/CoursesView.php';
                $showCourses = new CoursesView();
                $showCourses->showAllCoursesToCalculate();
            ?>
        </form>
    </body>
</html>
