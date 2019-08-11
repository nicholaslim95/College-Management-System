<?php

/**
 * Description of FacultyController
 *
 * @author Lim Jia Wei
 */
class FacultyController extends Database {

    //put your code here
    public function getFaculties() {
        $sql = "SELECT * FROM faculties";
        $result = $this->connect()->query($sql);
        $numRows = $result->rowCount();
        if ($numRows > 0) {
            foreach ($result as $row){
                echo "<option value=$row[facultyCode]>$row[facultyCode]</option>";
            }
        }
    }

    public function insertIntoXML() {
        if (isset($_POST['submitFaculty'])) {
//            To set settings on xml document
//            Making it more readable
            $facultyxml = new DOMDocument("1.0");
            $facultyxml->preserveWhiteSpace = false;
            $facultyxml->formatOutput = true;
            $facultyxml->load("xmlstuff/faculties.xml");

            $rootTag = $facultyxml->getElementsByTagName("faculties")->item(0);

            $facultyCodeForXML = $_POST['facultyCode'];
            $dataTag = $facultyxml->createElement("faculty");
            $facultyAttribute = $facultyxml->createAttribute('facultyCode');
            $facultyAttribute->value = $facultyCodeForXML;
            $facultyCodeTag = $facultyxml->createElement("facultyCode", $_POST['facultyCode']);
            $facultyNameTag = $facultyxml->createElement("facultyName", $_POST['facultyName']);


            $dataTag->appendChild($facultyCodeTag);
            $dataTag->appendChild($facultyNameTag);
            $dataTag->appendChild($facultyAttribute);

            $rootTag->appendChild($dataTag);

            $facultyxml->save("xmlstuff/faculties.xml");

        }
    }
    
    public function insertIntoDatabase() {
        if (isset($_POST['facultyCode']) and isset($_POST['facultyName'])) {
            $facultyCode = $_POST['facultyCode'];
            $facultyName = $_POST['facultyName'];

            $query = "INSERT INTO faculties (facultyCode, facultyName) VALUES ('$facultyCode','$facultyName');";
            
            $result = $this->connect()->query($query);
        }
    }

}
