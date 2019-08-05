<?php

require('db_connect.php');

if (isset($_POST['facultyCode']) and isset($_POST['facultyName'])) {
    $facultyCode = $_POST['facultyCode'];
    $facultyName = $_POST['facultyName'];

    $query = "INSERT INTO faculties (facultyCode, facultyName) VALUES ('$facultyCode','$facultyName');";

    mysqli_query($dbConn, $query) or die(mysqli_error($dbConn));

    echo "1 record added";

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die;
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



