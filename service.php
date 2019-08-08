<?php
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



