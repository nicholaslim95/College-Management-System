<?php

class ProgrammeView extends ProgrammeController {
    
        public function showAllProgramme() {
        $datas = $this->getProgramme();
        foreach ($datas as $data) {
            echo "Programme Name: " . $data['ProgrammeName'] . "<br>";
              echo "ProgrammeID: " . $data['programmeId'] . "<br>";
                echo "Programme Description: " . $data['programDesc'] . "<br>";
                  echo "MER: " . $data['MER'] . "<br>";
            echo "Duration: " . $data['duration'] . "<br><br>";
        }
    }
    
      public function showXMLtable() {

        $programmeXML = new DOMDocument();
        $programmeXML->load('xmlstuff/programme.xml');

        $programmeXSL = new DOMDocument;
        $programmeXSL->load('xmlstuff/programme.xsl');

        $proc = new XSLTProcessor();
        $proc->importStyleSheet($programmeXSL);

        echo $proc->transformToXML($programmeXML);
    }
   
}
