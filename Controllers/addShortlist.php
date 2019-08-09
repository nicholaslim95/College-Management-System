<?php

if (isset($_POST['submitShortlist'])) {
    $xml = new DOMDocument("1.0");
    $xml->preserveWhiteSpace = false;
    $xml->formatOutput = true;
    $xml->load("shortlists.xml");

    $rootTag = $xml->getElementsByTagName("shortlists")->item(0);

    $courseIdForXML = $_POST['courseId'];
    $dataTag = $xml->createElement("shortlist");
    $shortlistAttribute = $xml->createAttribute('courseId');
    $shortlistAttribute->value = $courseIdForXML;
    $courseIdTag = $xml->createElement("courseId", $_POST['courseId']);
    $courseNameTag = $xml->createElement("courseName", $_POST['courseName']);


    $dataTag->appendChild($courseIdTag);
    $dataTag->appendChild($courseNameTag);
    $dataTag->appendChild($shortlistAttribute);

    $rootTag->appendChild($dataTag);

    $xml->save("shortlists.xml");
}

