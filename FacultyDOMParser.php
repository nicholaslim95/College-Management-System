<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FacultyDOMParser
 *
 * @author LJW
 */
require_once './Faculties.php';

class FacultyDOMParser {

    private $faculties;

    public function __construct() {
        $this->faculties = new SplObjectStorage();
        $this->readFromXML($filename);
        $this->display;
    }

    public function readFromXML($filename) {
        $xml = simplexml_load_file($filename);
        $facList = $xml->faculties;

        foreach ($facList as $fac) {
            $facTemp = new Faculty($fac->facultyCode, $fac->facultyName);
            $this->faculties->attach($facTemp);
        }
    }

    public function deleteFromXML($faculty) {
        $doc = new DOMDocument;
        $doc->load('faculties.xml');

        $theFaculty = $doc->documentElement;

//this gives you a list of the faculty
        $list = $theFaculty->getElementsByTagName('facultyCode');

//figure out which ones you want -- assign it to a variable (ie: $nodeToRemove )
        $nodeToRemove = null;
        foreach ($list as $facElement) {
            $attrValue = $facElement->getAttribute('faculty');
            if ($attrValue == 'VALUEYOUCAREABOUT') {
                $nodeToRemove = $domElement; //will only remember last one- but this is just an example :)
            }
        }

//Now remove it.
        if ($nodeToRemove != null)
            $thedocument->removeChild($nodeToRemove);

        echo $doc->saveXML();
    }

}
