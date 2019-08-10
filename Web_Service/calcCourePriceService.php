<?php
require_once(__DIR__.'/../lib/nusoap.php');
require_once './coursePrice.php.php';

function calculateCoursePrice($creditHour, $coursePrice) {
    $coursePrice = new coursePrice($creditHour, $coursePrice);
    return $coursePrice->calculateCoursePrice();
}

$server = new nusoap_server(); //create a instance for nusoap server

$server->configureWSDL("Soap Demo", "urn:soapdemo"); //configure wdsl file

$server->register(
        "calculateCoursePrice", //name of function
        array("creditHour" => "xsd:int", "coursePrice" => "xsd:double"), //inputs
        array("return" => "xsd:double")); //outputs

$server->service(file_get_contents("php://input"));


