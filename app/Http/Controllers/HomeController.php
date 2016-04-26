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

        $primes = $this->getPrimes();
        foreach($primes as $prime)
        {
            $divisible = ($copy % $prime) === 0;
            while($divisible)
            {
                $copy = $copy / $prime;
                $decomposition[] = $prime;
                $divisible = ($copy % $prime) === 0;
            }

            if($copy === 1) {
                break;
            }
        }
        
        $json = array("number" => $number,
                      "decomposition" => $decomposition);
        return response()->json($json);
    }

    private function getPrimes() {
        return array(2,3,5,7,11,13,17,19,23,29,31,37,41,43,47,53,59,61,67,71,73,79,83,89,97,101);
    }
}
