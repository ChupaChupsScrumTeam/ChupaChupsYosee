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
        if (isset($_GET['ship'])){
            echo "<p id='astroport-name'>Astroport</p>";

            for ($i = 1; $i <= 3; $i++){
                if ($i == 1){
                    echo "<ul id='gate-" . $i . "' class='occupied'> Gate " . $i;
                    echo "<li id='ship-" . $i . "'>" . $_GET['ship'];
                }else{
                    echo "<ul id='gate-" . $i . "'>Gate " . $i;
                    echo "<li id='ship-" . $i . "'>Ship " . $i;
                }
                echo "</li>";
                echo "</ul>";
            }
            echo "<a id='info'>hello</a>";
            echo "<form>";
            echo 'Ship <input type="text" id="ship" name="ship" onkeypress="document.getElementById("info").className = "hidden""/>';
            echo "<input type='submit' name='dock' value='Dock' action='#'/>";
            echo "</form>";
        }else{
            echo "<p id='astroport-name'>Astroport</p>";

            for ($i = 1; $i <= 3; $i++){
                echo "<ul id='gate-" . $i . "' class='free'> Gate " . $i;
                echo "<li id='ship-" . $i . "'>Ship " . $i;
                echo "</li>";
                echo "</ul>";
            }
            echo "<a id='info' class='hidden'>hello</a>";
            echo "<form>";
            echo "Ship <input type='text' id='ship' name='ship'/>";
            echo "<button id='dock' action='#'/>Dock</button>";
            echo "</form>";
        }
        
    }
}
