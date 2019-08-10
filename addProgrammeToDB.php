<?php

require('db_connect.php');

if (isset($_POST['ProgrammeName']) and isset($_POST['ProgrammeID']) and isset($_POST['ProgrammeDesc']) and isset($_POST['MER']) and isset($_POST['duration'])) {
    $programmeName = $_POST['ProgrammeName'];
    $programmeId = $_POST['ProgrammeID'];
     $programDesc = $_POST['ProgrammeDesc'];
      $MER = $_POST['MER'];
       $duration = $_POST['duration'];

    $query = "INSERT INTO programme(programmeId, programDesc, MER, duration,programmeName) VALUES ('$programmeId', '$programDesc','$MER','$duration','$programmeName');";

    mysqli_query($dbConn, $query) or die(mysqli_error($dbConn));

    echo "Record added";

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die;
}



