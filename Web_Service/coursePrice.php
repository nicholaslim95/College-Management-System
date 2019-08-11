<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * author : Lim Jia Wei
 */

/**
 * Description of coursePrice
 *
 * @author LJW
 */
class coursePrice {
    //put your code here
    private $creditHour;
    private $pricePerCredit;
    
    public function coursePrice($creditHour, $pricePerCredit) {
        $this->creditHour = $creditHour;
        $this->pricePerCredit = $pricePerCredit;
    }

    function getCreditHour() {
        return $this->creditHour;
    }

    function getPricePerCredit() {
        return $this->pricePerCredit;
    }

    function setCreditHour($creditHour) {
        $this->creditHour = $creditHour;
    }

    function setPricePerCredit($pricePerCredit) {
        $this->pricePerCredit = $pricePerCredit;
    }

    public function calculateCoursePrice(){
        return $this->creditHour * $this->coursePrice;
    }
    
}
