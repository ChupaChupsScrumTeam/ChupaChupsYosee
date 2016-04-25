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
        $copy = $number;
        
        while($copy != 1)
        {
            $decomposition[] = 2;
            $copy = $copy / 2;
        }
        
        $decomposition_json = json_encode($decomposition);
        
        header("Content-Type: application/json");
        
        $json = <<<JSON
{ "number" : $number , "decomposition" : $decomposition_json }
JSON;
        
        echo $json;
        
        return view('primeFactors');
    }

    public function astroport()
    {
        echo "<p id='astroport-name'>Astroport</p>";
    }
}
