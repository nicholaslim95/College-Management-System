<?php

/**
 * Description of FacultyController
 *
 * @author LJW
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
            $xml = new DOMDocument("1.0");
            $xml->preserveWhiteSpace = false;
            $xml->formatOutput = true;
            $xml->load("xmlstuff/faculties.xml");

            $rootTag = $xml->getElementsByTagName("faculties")->item(0);

            $facultyCodeForXML = $_POST['facultyCode'];
            $dataTag = $xml->createElement("faculty");
            $facultyAttribute = $xml->createAttribute('facultyCode');
            $facultyAttribute->value = $facultyCodeForXML;
            $facultyCodeTag = $xml->createElement("facultyCode", $_POST['facultyCode']);
            $facultyNameTag = $xml->createElement("facultyName", $_POST['facultyName']);


            $dataTag->appendChild($facultyCodeTag);
            $dataTag->appendChild($facultyNameTag);
            $dataTag->appendChild($facultyAttribute);

            $rootTag->appendChild($dataTag);

            $xml->save("xmlstuff/faculties.xml");

            //uploadToMySql($xml);
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
