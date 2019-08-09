<?php

/**
 * Description of FacultyView
 *
 * @author LJW
 */
class FacultyView extends FacultyController {

    public function showAllFaculties() {
        $datas = $this->getFaculties();
        foreach ($datas as $data) {
            echo "Faculty Id: " . $data['courseId'] . "<br>";
            echo "Faculty Name: " . $data['courseName'] . "<br><br>";
        }
    }

    public function showXMLtable() {

        $facultyXML = new DOMDocument();
        $facultyXML->load('xmlstuff/faculties.xml');

        $facultyXSL = new DOMDocument;
        $facultyXSL->load('xmlstuff/faculties.xsl');

        $proc = new XSLTProcessor();
        $proc->importStyleSheet($facultyXSL);

        echo $proc->transformToXML($facultyXML);
    }

}
