<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class PrimeFactorController extends BaseController
{
    private function decompose($number)
    {
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

        return $decomposition;
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

        $decomposition = $this->decompose($number);
        
        $json = array("number" => $number,
                      "decomposition" => $decomposition);
        return response()->json($json);
    }

    private function getPrimes() {
        $number = 2;
        $primes = array(2,3,5);
        
        for($i = 6; $i < 5000; $i++)
        {
            $isPrime = $this->isPrime($i);
            if($isPrime)
            {
                $primes[] = $i;
            }
        }
        return $primes;
    }
    
    private function isPrime($number)
    {
        for($i = 2; $i < $number; $i++)
        {
            $mod = ($number % $i);
            if($mod === 0)
            {
                return false;
            }
        }
        
        return true;
    }
}
