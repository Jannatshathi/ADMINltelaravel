<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelperTestController extends Controller
{
    public function checkhelper(){
        $value = getMyText();
        $arrvalue = makeArray($value);
        return $arrvalue;
    }
}
