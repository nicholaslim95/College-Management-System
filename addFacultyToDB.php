<?php

require('db_connect.php');

//if (isset($_POST['facultyCode']) and isset($_POST['facultyName'])) {
//    $facultyCode = $_POST['facultyCode'];
//    $facultyName = $_POST['facultyName'];
//
//    $query = "INSERT INTO faculties (facultyCode, facultyName) VALUES ('$facultyCode','$facultyName');";
//
//    mysqli_query($dbConn, $query) or die(mysqli_error($dbConn));
//
//    echo "1 record added";
//
//    header('Location: ' . $_SERVER['HTTP_REFERER']);
//    die;
//}

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

function uploadToMySql($uploadXML){
    foreach ($uploadXML -> $item as $row){
        $facultyCode = $uploadXML -> facultyCode;
        $facultyName = $uploadXML -> facultyName;
    }
    
    $insertFacultyQuery= "INSERT INTO faculties (facultyCode, facultyName) VALUES ('$facultyCode', '$facultyName');";
    
    $result = mysql_qmysqli_query($dbConn, $insertFacultyQuery) or die(mysqli_error($dbConn));
    
    
}
if (isset($_POST['courseId']) and isset($_POST['courseName']) and isset($_POST['levelOfStudy']) and isset($_POST['facultyId'])) {
    $courseId = $_POST['courseId'];
    $courseName = $_POST['courseName'];
    $levelOfStudies = $_POST['levelOfStudy'];
    $facultyId = $_POST['facultyId'];
    $query = "INSERT INTO courses (courseId, courseName, levelOfStudy, faculty) VALUES ('$courseId','$courseName','$levelOfStudies', '$facultyId');";

    mysqli_query($dbConn, $query) or die(mysqli_error($dbConn));

    echo "1 record added";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die;
}

if (isset($_POST['editCourseFacultyId'])) {
    $editCourseFacultyId = $_POST["editCourseFacultyId"];
    echo $editCourseFacultyId;
    session_start();
    $_SESSION['editCourseFacultyId'] = $editCourseFacultyId;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die;
}

if (isset($_GET['id'])) {
    $FacultyId = $_GET['id'];
    echo $FacultyId;
}



