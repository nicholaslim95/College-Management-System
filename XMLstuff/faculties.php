<?php
   //Reading XML using the SAX(Simple API for XML) parser 
   
   $faculties   = array();
   $elements   = null;
   
   // Called to this function when tags are opened 
   function startElements($parser, $name, $attrs) {
      global $faculties, $elements;
      
      if(!empty($name)) {
         if ($name == 'FACULTY') {
            // creating an array to store information
            $faculties []= array();
         }
         $elements = $name;
      }
   }
   
   // Called to this function when tags are closed 
   function endElements($parser, $name) {
      global $elements;
      
      if(!empty($name)) {
         $elements = null;
      }
   }
   
   // Called on the text between the start and end of the tags
   function characterData($parser, $data) {
      global $faculties, $elements;
      
      if(!empty($data)) {
         if ($elements == 'FACULTYCODE' || $elements == 'FACULTYNAME') {
            $faculties[count($faculties)-1][$elements] = trim($data);
         }
      }
   }
   
   // Creates a new XML parser and returns a resource handle referencing it to be used by the other XML functions. 
   $parser = xml_parser_create(); 
   
   xml_set_element_handler($parser, "startElements", "endElements");
   xml_set_character_data_handler($parser, "characterData");
   
   // open xml file
   if (!($handle = fopen('faculties.xml', "r"))) {
      die("could not open XML input");
   }
   
   while($data = fread($handle, 4096)){ // read xml file {
      xml_parse($parser, $data);  // start parsing an xml document 
   }
   
   xml_parser_free($parser); // deletes the parser
   $i = 1;
   
   foreach($faculties as $faculty) {
      echo "Faculty code - ".$faculty['FACULTYCODE'].'<br/>';
      echo "Faculty name- ".$faculty['FACULTYNAME'].'<br/>';
      $i++; 
   }
?>