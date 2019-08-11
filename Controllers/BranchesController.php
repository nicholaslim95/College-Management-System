<?php

class BranchesController extends Database {

    public function getBranches() {

        $xml = simplexml_load_file("xmlstuff/branches.xml") or die("Error: Cannot create object");

        if (!isset($_GET['type'])) {
            $sql = "SELECT * FROM branch WHERE branchId NOT IN ( ";
            foreach ($xml->children() as $branches) {
                $sql = $sql . "'" . $branches->branchId . "', ";
            }
            $sql = $sql . " '' )";
        } elseif ($_GET['type'] == 'compareBranches') {
            $sql = "SELECT * FROM branch WHERE branchId IN ( ";
            foreach ($xml->children() as $branches) {
                $sql = $sql . "'" . $branches->branchId . "', ";
            }
            $sql = $sql . " '' )";
        } else {
            $sql = "SELECT * FROM branch";
        }



        $result = $this->connect()->query($sql);
        $numRows = $result->rowCount();
        if ($numRows > 0) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
            return $data;
        } else {
            $sql = "SELECT * FROM branch";
            $result = $this->connect()->query($sql);
            $numRows = $result->rowCount();
            if ($numRows > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    $data[] = $row;
                }
                return $data;
            }
        }
    }

    public function getCompare() {
        //got 2 branches id to compare
        if (isset($_POST['submit'])) {
            if (isset($_POST['b1']) && isset($_POST['b2'])) {
                if ($_POST['b1'] != $_POST['b2']) {
                    $sql = "SELECT * FROM branch WHERE branchId='" . $_POST['b1'] . "' OR branchId='" . $_POST['b2'] . "'";
                    $result = $this->connect()->query($sql);
                    $numRows = $result->rowCount();
                    if ($numRows > 0) {
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            $data[] = $row;
                        }
                        return $data;
                    }
                } else {
                    echo "<script type='text/javascript'>alert('Cannot choose the same branch');</script>";
                    header("Refresh:0");
                }
            } else {
                //no branches choosed
                return null;
            }
        }
    }

    public function insertIntoXML() {
        $xml = simplexml_load_file("xmlstuff/branches.xml") or die("Error: Cannot create object");
        $data = array();
        foreach ($xml->children() as $branches) {
            array_push($data, $branches->branchId);
        }
        if (!empty($_GET['branch']) && isset($_GET['branch']) && !in_array($_GET['branch'], $data)) {
            $xml = new DOMDocument("1.0");
            $xml->preserveWhiteSpace = false;
            $xml->formatOutput = true;
            $xml->load("xmlstuff/branches.xml");

            $rootTag = $xml->getElementsByTagName("branches")->item(0);

            $branchIdForXML = $_GET['branch'];
            $dataTag = $xml->createElement("branch");
            $branchAttribute = $xml->createAttribute('branchId');
            $branchAttribute->value = $branchIdForXML;
            $branchIdTag = $xml->createElement("branchId", $branchIdForXML);


            $dataTag->appendChild($branchIdTag);
            $dataTag->appendChild($branchAttribute);

            $rootTag->appendChild($dataTag);

            $xml->save("xmlstuff/branches.xml");
            echo "<script type='text/javascript'>alert(''.$branchIdForXML.' has been deleted.');</script>";
            //refresh page
            header("Refresh:0");
        }
    }

    public function showXMLtable() {

        $branchXML = new DOMDocument();
        $branchXML->load('xmlstuff/branches.xml');

        $branchXSL = new DOMDocument;
        $branchXSL->load('xmlstuff/branches.xsl');

        $proc = new XSLTProcessor();
        $proc->importStyleSheet($branchXSL);

        echo $proc->transformToXML($branchXML);
    }

    public function getSpecificXMLElement() {
        $xml = simplexml_load_file("xmlstuff/branches.xml") or die("Error: Cannot create object");
        foreach ($xml->children() as $branches) {
            return $datas[] = $branches->branchId;
        }
    }

}
