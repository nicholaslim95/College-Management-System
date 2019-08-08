<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Faculty
 *
 * @author LJW
 */
class Faculty {
   private $facultyCode, $facultyName;
    
    function __construct($facultyCode="", $facultyName="") {
        $this->facultyCode = $facultyCode;
        $this->facultyName = $facultyName;
    }

    function getFacultyCode() {
        return $this->facultyCode;
    }

    function getFacultyName() {
        return $this->facultyName;
    }

    function setFacultyCode($facultyCode) {
        $this->facultyCode = $facultyCode;
    }

    function setFacultyName($facultyName) {
        $this->facultyName = $facultyName;
    }


}
