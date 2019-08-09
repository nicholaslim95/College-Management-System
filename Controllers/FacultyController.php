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
            $xml->load("faculties.xml");

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

            $xml->save("faculties.xml");

            //uploadToMySql($xml);
        }
    }

}
