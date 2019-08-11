<?php

class CoursesController extends Database {

    public function getCourses() {

        $xml = simplexml_load_file("xmlstuff/shortlists.xml") or die("Error: Cannot create object");



        if (!isset($_GET['type'])) {
            $sql = "SELECT * FROM courses WHERE courseId NOT IN ( ";
            foreach ($xml->children() as $shortlists) {
                $sql = $sql . "'" . $shortlists->courseId . "', ";
            }
            $sql = $sql . " '' )";
        } elseif ($_GET['type'] == 'compareShortlist') {
            $sql = "SELECT * FROM courses WHERE courseId IN ( ";
            foreach ($xml->children() as $shortlists) {
                $sql = $sql . "'" . $shortlists->courseId . "', ";
            }
            $sql = $sql . " '' )";
        } else {
            $sql = "SELECT * FROM courses";
        }

        $result = $this->connect()->query($sql);
        $numRows = $result->rowCount();
        if ($numRows > 0) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
            return $data;
        } else {
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
    }

    public function getCompare() {
        //got 2 courses id to compare
        if (isset($_POST['submit'])) {
            if (isset($_POST['c1']) && isset($_POST['c2'])) {


                if ($_POST['c1'] != $_POST['c2']) {
                    $sql = "SELECT * FROM courses WHERE courseId='" . $_POST['c1'] . "' OR courseId='" . $_POST['c2'] . "'";
                    $result = $this->connect()->query($sql);
                    $numRows = $result->rowCount();
                    if ($numRows > 0) {
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            $data[] = $row;
                        }
                        return $data;
                    }
                } else {
                    echo "<script type='text/javascript'>alert('Cannot choose the same course');</script>";
                    header("Refresh:0");
                }
            } else {
                //no course choosed
                return null;
            }
        }
    }

    public function insertIntoXML() {
        $xml = simplexml_load_file("xmlstuff/shortlists.xml") or die("Error: Cannot create object");
        $data = array();
        foreach ($xml->children() as $shortlists) {
            array_push($data, $shortlists->courseId);
        }
        if (!empty($_GET['short']) && isset($_GET['short']) && !in_array($_GET['short'], $data)) {
            $xml = new DOMDocument("1.0");
            $xml->preserveWhiteSpace = false;
            $xml->formatOutput = true;
            $xml->load("xmlstuff/shortlists.xml");

            $rootTag = $xml->getElementsByTagName("shortlists")->item(0);

            $courseIdForXML = $_GET['short'];
            $dataTag = $xml->createElement("shortlist");
            $shortlistAttribute = $xml->createAttribute('courseId');
            $shortlistAttribute->value = $courseIdForXML;
            $courseIdTag = $xml->createElement("courseId", $courseIdForXML);


            $dataTag->appendChild($courseIdTag);
            $dataTag->appendChild($shortlistAttribute);

            $rootTag->appendChild($dataTag);

            $xml->save("xmlstuff/shortlists.xml");
            echo "<script type='text/javascript'>alert(''.$courseIdForXML.' has been deleted.');</script>";
            //refresh page
            header("Refresh:0");
        }
    }

    public function showXMLtable() {

        $shortlistXML = new DOMDocument();
        $shortlistXML->load('xmlstuff/shortlists.xml');

        $shortlistXSL = new DOMDocument;
        $shortlistXSL->load('xmlstuff/shortlists.xsl');

        $proc = new XSLTProcessor();
        $proc->importStyleSheet($shortlistXSL);

        echo $proc->transformToXML($shortlistXML);
    }

    public function getSpecificXMLElement() {
        $xml = simplexml_load_file("xmlstuff/shortlists.xml") or die("Error: Cannot create object");
        foreach ($xml->children() as $shortlists) {
            return $datas[] = $shortlists->courseId;
        }
    }
    
    //Jia Wei (Easier to find)
    public function getCoursesBasedOnFacultyID() {
        $facultyId = $_GET['editCourseFacultyId'];
        $courseIdQuery = "SELECT courseId FROM courses WHERE faculty = '$facultyId'";
        $result = $this->connect()->query($courseIdQuery);
        $numRows = $result->rowCount();
         foreach ($result as $row){
                echo "<option value=$row[courseId]>$row[courseId]</option>";
            }
    }

    //Jia Wei (Easier to find)
    public function getCoursesBasedOnCourseId() {
        $courseId = $_GET['selectCourseId'];
        $courseIdQuery = "SELECT * FROM courses WHERE courseId= '$courseId'";
        $result = $this->connect()->query($courseIdQuery);
        $numRows = $result->rowCount();
                    
        if($numRows > 0){
            foreach ($result as $row){
                return $row['courseName'];
            }
            //1echo '<input  name="courseName" type="text" value="'.$result.'" ';
        }
    }
    
    public function getCoursesCreditHourAndPrice(){
        
    }
}
