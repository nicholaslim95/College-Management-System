<?php

class courseFee {

    private $course1Fee;
    private $course2Fee;

    public function courseFee($course1Fee, $course2Fee) {
        $this->course1Fee = $course1Fee;
        $this->course2Fee = $course2Fee;
    }

    public function getCourse1Fee() {
        return $this->course1Fee;
    }

    public function setCourse1Fee($course1Fee) {
        $this->course1Fee = $course1Fee;
    }

    function getCourse2Fee() {
        return $this->course2Fee;
    }

    function setCourse2Fee($course2Fee) {
        $this->course2Fee = $course2Fee;
    }

    public function getCheapest() {
        if($this->course1Fee < $this->course2Fee){
            return $this->course1Fee;
        }  elseif ($this->course1Fee == $this->course2Fee) {
            return "Both are same";
        }  else{
            return $this->course2Fee;
        }

    }

}
