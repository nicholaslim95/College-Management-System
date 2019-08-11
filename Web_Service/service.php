<?php
// @author: Kee Siang Hock
require_once(__DIR__ . '/../lib/nusoap.php');
require_once 'courseFee.php';
require_once 'branchFee.php';

function compareFee($course1Fee, $course2Fee) {
    $courseFee = new courseFee($course1Fee, $course2Fee);
    return $courseFee->getCheapest();
}

function compareAccFee($branch1Fee, $branch2Fee) {
    $branchFee = new branchFee($branch1Fee, $branch2Fee);
    return $branchFee->getCheapest();
}

$server = new nusoap_server(); //create a instance for nusoap server

$server->configureWSDL("Soap Demo", "urn:soapdemo"); //configure wdsl file

$server->register(
        "compareFee", //name of function
        array("course1Fee" => "xsd:double", "course2Fee" => "xsd:double"), //inputs
        array("return" => "xsd:double")); //outputs

$server->register(
        "compareAccFee", //name of function
        array("branch1Fee" => "xsd:double", "branch2Fee" => "xsd:double"), //inputs
        array("return" => "xsd:double")); //outputs

$server->service(file_get_contents("php://input"));
