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

    private function getUriParams()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $justParams = preg_replace('/^.+[?]/', '', $uri);
        $keyValueStrings = preg_split('/[&]/', $justParams);
        $params = array();
        foreach($keyValueStrings as $keyValueString) {
            $keyValueList = preg_split('/[=]/', $keyValueString);
            if(count($keyValueList) !== 2) { continue; }
            $key = $keyValueList[0];
            $value = $keyValueList[1];
            $params[] = array('key' => $key, 'value' => $value);
        }
        return $params;
    }
    
    public function primeFactors()
    {
        $params = $this->getUriParams();

        if(count($params) === 1) {
            $param = $params[0];
            $json = $this->getDecomOfNumber($param['value']);
            return response()->json($json);
        }

        $json = array();
        foreach($params as $param) {
            $json[] = $this->getDecomOfNumber($param['value']);
        }
        return response()->json($json);
    }

    private function getDecomOfNumber($number)
    {
        if(!is_numeric($number))
        {
            $json = array("number" => $number,
                          "error" => "not a number");
            return $json;
        }

        if($number > 1000000)
        {
            $json = array("number" => $number,
                          "error" => "too big number (>1e6)");
            return $json;
        }

        $decomposition = $this->decompose($number);
        
        $json = array("number" => $number,
                      "decomposition" => $decomposition);
        return $json;
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
