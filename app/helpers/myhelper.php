<?php

    function getMyText()
    {
        return "Welcome To Laravel";
    }

    function makeArray($val){
        $myarr = explode(" ",$val);
        return $myarr;
    }