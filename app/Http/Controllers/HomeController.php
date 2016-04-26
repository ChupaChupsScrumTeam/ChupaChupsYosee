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
        header("Content-Type: application/json");
        
        $number = $_GET["number"];
        
        $error = array("number" => $number, "error" => "not a number");

        if(!is_numeric($number))
        {
            
            echo json_encode($error);
            return view('primeFactors');
        }

        $decomposition = array();
        $copy = $number;
        
        while($copy != 1)
        {
            $decomposition[] = 2;
            $copy = $copy / 2;
        }
        
        $decomposition_json = json_encode($decomposition);
        
        $json = <<<JSON
{ "number" : $number , "decomposition" : $decomposition_json }
JSON;
        
        echo $json;
        return view('primeFactors');
    }

    public function astroport()
    {
        echo "<p id='astroport-name'>Astroport</p>";
        echo "<ul>";
        for ($i = 1; $i <= 3; $i++){
            echo "<li id='gate" & $i & "'> Gate " & $i & "</li>";
            echo "<dl id='ship" & $i & "'> Ship " & $i & "</dl>";
        }
        echo "</ul>";
    }
}
