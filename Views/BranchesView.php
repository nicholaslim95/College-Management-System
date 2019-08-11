<?php

class BranchesView extends BranchesController {

    public function showAllBranches() {

        $datas = $this->getBranches();

        echo "<table border='1' class='table table-hover'><br />";
        echo "<tr><th colspan='7' style='text-align:center;'> All Branches</th></tr>";
        echo "<tr><th style='text-align:center;'>Branch ID</th>"
        . "<th style='text-align:center;'>Branch Name</th>"
        . "<th style='text-align:center;'>Address</th>"
        . "<th style='text-align:center;'>Faculties</th>"
        . "<th style='text-align:center;'>Accomodation Fee</th>"
        . "<th style='text-align:center;'>Financial Aid</th>"
        . "<th style='text-align:center;'>Action</th></tr>";
        foreach ($datas as $data) {
            echo "<tr>";
            echo "<td style='text-align:center;'>" . $data['branchId'] . " </td>";
            echo "<td style='text-align:center;'>" . $data['branchName'] . " </td>";
            echo "<td style='text-align:center;'>" . $data['Address'] . " </td>";
            echo "<td style='text-align:center;'>" . $data['faculties'] . " </td>";
            echo "<td style='text-align:center;'>" . $data['accomodationFee'] . " </td>";
            echo "<td style='text-align:center;'>" . $data['financialAid'] . " </td>";
            echo "<td style='text-align:center;'><a class='btn btn-default' href='showBranches.php?branch=" . $data['branchId'] . "'>Shortlist</a></td>";
            echo "</tr>";
        }
    }

    public function showcompareBranches($id, $number) {

        $datas = $this->getBranches();
        echo "<tr><td style='text-align:center;'>" . $number . " Branch</th>"
        . "<td style='text-align:center;'>"
        . "<select name='" . $id . "' class=form-control onchange=AjaxFunction();>"
        . "<option value=''>---Select Branch---</option>";
        foreach ($datas as $data) {
            echo "<option value='" . $data['branchId'] . "'>" . $data['branchId'] . " - " . $data['branchName'] . "</option>";
        }
        echo "</td>";
    }

    public function showtableCompareBranch() {
        $fee = array();
        $datas = $this->getCompare(); //aray inside got 2 values
        echo "<tr><td style='text-align:center;'>Branch ID</td>";
        if (!empty($datas)) {
            foreach ($datas as $data) {
                echo "<td style='text-align:center;'>" . $data['branchId'] . "</td>";
            }
            echo "</tr><tr><td style='text-align:center;'>Branch Name</td>";
            foreach ($datas as $data) {
                echo "<td style='text-align:center;'>" . $data['branchName'] . "</td>";
            }
            echo "</tr><tr><td style='text-align:center;'>Address</td>";
            foreach ($datas as $data) {
                echo "<td style='text-align:center;'>" . $data['Address'] . "</td>";
            }
            echo "</tr><tr><td style='text-align:center;'>Faculties</td>";
            foreach ($datas as $data) {
                echo "<td style='text-align:center;'>" . $data['faculties'] . "</td>";
            }
            echo "</tr><tr><td style='text-align:center;'>Accomodation Fee</td>";
            foreach ($datas as $data) {
                echo "<td style='text-align:center;'>" . $data['accomodationFee'] . "</td>";
                array_push($fee, $data['accomodationFee']);
            }
            echo "</tr><tr><td style='text-align:center;'>Financial Aid</td>";
            foreach ($datas as $data) {
                echo "<td style='text-align:center;'>" . $data['financialAid'] . "</td>";
            }
            require 'lib/nusoap.php';
            $client = new nusoap_client("http://localhost:/college-management-system/web_service/service.php?wsdl");
            $accomodationFee = $client->call('compareAccFee', array("branch1Fee" => $fee[0], "branch2Fee" => $fee[1]));
            echo "</tr><tr><td colspan='3' style='text-align:center;'>Cheapest Accomodation Fee:" . $accomodationFee . "</td>";
        } else {
            echo "<td style='text-align:center;'>Please Choose Branch</td>";
        }
        echo "</tr>";
    }

}
