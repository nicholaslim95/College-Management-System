<?php

class ProgrammeController extends Database {

    public function insertIntoDatabase() {
        if (isset($_POST['ProgrammeName']) and isset($_POST['ProgrammeID']) and isset($_POST['ProgrammeDesc']) 
                and isset($_POST['MER']) and isset($_POST['duration'])) {
            $programmeName = $_POST['ProgrammeName'];
            $programmeId = $_POST['ProgrammeID'];
            $programDesc = $_POST['ProgrammeDesc'];
            $MER = $_POST['MER'];
            $duration = $_POST['duration'];
            
             $query = "INSERT INTO programme(programmeId, programDesc, MER, duration,programmeName)"
                     . " VALUES ('$programmeId', '$programDesc','$MER','$duration','$programmeName');";
            
            $result = $this->connect()->query($query);
        }
    }
    
        public function insertIntoXML() {
        if (isset($_POST['submitProgrammeInfo'])) {
            $xml = new DOMDocument("1.0");
            $xml->preserveWhiteSpace = false;
            $xml->formatOutput = true;
            $xml->load("xmlstuff/programme.xml");

            $rootTag = $xml->getElementsByTagName("programme")->item(0);

            $programmeIdForXML = $_POST['ProgrammeID'];
            $dataTag = $xml->createElement("programme");
            $programmeAttribute = $xml->createAttribute('programmeId');
            $programmeAttribute->value = $programmeIdForXML;
            $programmeIdTag = $xml->createElement("programmeId", $_POST['ProgrammeID']);
            $programmeNameTag = $xml->createElement("programmeName", $_POST['ProgrammeName']);
            $programmeDescTag = $xml->createElement("programmeDesc", $_POST['ProgrammeDesc']);
            $MERTag = $xml->createElement("MER", $_POST['MER']);
            $durationTag = $xml->createElement("duration", $_POST['duration']);


            $dataTag->appendChild($programmeIdTag);
            $dataTag->appendChild($programmeNameTag);
            $dataTag->appendChild($programmeDescTag);
            $dataTag->appendChild($MERTag);
            $dataTag->appendChild($durationTag);
            $dataTag->appendChild($programmeAttribute);

            $rootTag->appendChild($dataTag);

            $xml->save("xmlstuff/programme.xml");

            //uploadToMySql($xml);
        }
    }
    
}
    