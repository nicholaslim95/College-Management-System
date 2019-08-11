<?php

class branchFee {

    private $branch1Fee;
    private $branch2Fee;

    public function branchFee($branch1Fee, $branch2Fee) {
        $this->branch1Fee = $branch1Fee;
        $this->branch2Fee = $branch2Fee;
    }

    public function getBranch1Fee() {
        return $this->branch1Fee;
    }

    public function setBranch1Fee($branch1Fee) {
        $this->branch1Fee = $branch1Fee;
    }

    function getBranch2Fee() {
        return $this->branch2Fee;
    }

    function setBranch2Fee($branch2Fee) {
        $this->branch2Fee = $branch2Fee;
    }

    public function getCheapest() {
        if($this->branch1Fee < $this->branch2Fee){
            return $this->branch1Fee;
        }  elseif ($this->branch1Fee == $this->branch2Fee) {
            return "Both are same";
        }  else{
            return $this->branch2Fee;
        }

    }

}

