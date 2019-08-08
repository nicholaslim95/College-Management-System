<?php
<<<<<<< HEAD
require_once 'lib/nusoap.php';
require_once './Faculties.php.php';

$server = new nusoap_server(); // Create a instance for nusoap server

$server->configureWSDL("Soap Demo","urn:soapdemo"); // Configure WSDL file

$server->register(
	"getFacultyCode", // name of function
	array("name"=>"xsd:string"),  // inputs
	array("return"=>"xsd:integer")   // outputs
);

$server->service(file_get_contents("php://input"));



=======

require_once 'lib/nusoap.php';
require_once 'Loan.php';

function compMonthlyPayment($amount, $interest, $duration){
    $loan = new Loan($interest, $duration, $amount);
    return $loan->getMonthlyPayment();
}

function totalPayment($amount, $interest, $duration){
    $loan = new Loan($interest, $duration, $amount);
    return $loan->getTotalPayment();
}

$server = new nusoap_server(); //create a instance for nusoap server

$server->configureWSDL("Soap Demo", "urn:soapdemo"); //configure wdsl file

$server->register(
        "compMonthlyPayment", //name of function
        array("amount"=>"xsd:double", "interest"=>"xsd:double", "duration"=>"xsd:integer"), //inputs
        array("return"=>"xsd:double")); //outputs

$server->register(
        "totalPayment", //name of function
        array("amount"=>"xsd:double", "interest"=>"xsd:double", "duration"=>"xsd:integer"), //inputs
        array("return"=>"xsd:double")); //outputs

$server->service(file_get_contents("php://input"));
>>>>>>> origin/master
