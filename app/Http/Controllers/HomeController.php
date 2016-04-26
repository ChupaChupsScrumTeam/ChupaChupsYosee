<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class HomeController extends BaseController
{
    public function welcome()
    {
      return view('welcome');  
    }
    
    public function primeFactors()
    {
        $number = $_GET["number"];

        if(!is_numeric($number))
        {
            $json = array("number" => $number,
                          "error" => "not a number");
            return response()->json($json);
        }

        $decomposition = array();
        $copy = $number;
        
        while($copy != 1)
        {
            $decomposition[] = 2;
            $copy = $copy / 2;
        }
       
        $json = array("number" => $number,
                      "decomposition" => $decomposition);
        return response()->json($json);
    }
}
