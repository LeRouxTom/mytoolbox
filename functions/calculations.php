<?php

    function getPercent($percent = null, $of = null , $result =null){

        if($result === null){
            $result = $percent * $of / 100;

            return [
                'result' => $result,
            ];
        }
        if($percent === null){
            $percent = $of / $result * 100;

            return [
                'percent' => $percent,
            ];
        }
        if($of === null){
            $of = $result * 100 / $percent;

            return [
                'of' => $of,
            ];
        }
    }

    function ruleOfThird($a = 1, $b = 1, $c = 1): array
    {
        return [
            'd' => ($b * $c)  / $a,
        ];
    }

    function cesar($clear, $key, $reverse = false){
        $alphabet = 'abcdefghijklmnopqrstuvwxyz';
        $alphabetM = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $alphabet = str_split($alphabet);
        $alphabetM = str_split($alphabetM);
        $clear = str_split($clear);
        $result = '';

        foreach ($clear as $letter){
            $index = array_search($letter, $alphabet);
            $indexM = array_search($letter, $alphabetM);
                if ($index !== false) {
                    $index = $reverse ? $index - $key : $index + $key;
                    if($index > 25){
                        $index = $index - 26;
                    }
                    $result .= $alphabet[$index];
                } 
                elseif ($indexM !== false){
                    $indexM = $reverse ? $indexM - $key : $indexM + $key; 
                    if($indexM > 25){
                        $indexM = $indexM - 26;
                    }
                    $result .= $alphabetM[$indexM];
                }
                else {
                    $result .= $letter;
                }
            }

        if($reverse){
            return [
                'clear' => $result,
            ];
        } else {
            return [
                'result' => $result,
            ];
        }
    }

    /*function convertEuroDollars($euro = null, $dollars = null){
        $currency = $euro === null ? 'USD' : 'EUR';
        $reverseCurrency = $currency === 'EUR' ? 'USD' : 'EUR';

        $url = 'https://open.er-api.com/v6/latest/' . $currency;

        $data = file_get_contents($url);
        $data = json_decode($data, true);
        $rate = $data['rates'][$reverseCurrency];

        if($euro === null){
            $euro = $dollars * $rate;
            return [
                'EUR' => $euro,
            ];
        }
        if($dollars === null){
            $dollars = $euro * $rate;
            return [
                'USD' => $dollars,
            ];
        }
    }*/

    function convertEuroDollars($montant = null, $from = null, $to = null){

        $url = 'https://open.er-api.com/v6/latest/' . $from;

        $data = file_get_contents($url);
        $data = json_decode($data, true);
        $rate = $data['rates'][$to];

        $resultat = $montant * $rate;
        return[
            'reponse' => $resultat,
        ];
    }

    function convertLitre($debut = null, $de = null, $vers = null){

        if($de == 'L'){
            if($vers == 'dL'){
                $resu = $debut * 10;
                return[
                    'resultat' => $resu,
                ];
            }
            if($vers == 'cL'){
                $resu = $debut * 100;
                return[
                    'resultat' => $resu,
                ];
            }
            if($vers == 'mL'){
                $resu = $debut * 1000;
                return[
                    'resultat' => $resu,
                ];
            }
        }
        if($de == 'dL'){
            if($vers == 'L'){
                $resu = $debut * 0.1;
                return[
                    'resultat' => $resu,
                ];
            }
            if($vers == 'cL'){
                $resu = $debut * 10;
                return[
                    'resultat' => $resu,
                ];
            }
            if($vers == 'mL'){
                $resu = $debut * 100;
                return[
                    'resultat' => $resu,
                ];
            }
        }
        if($de == 'cL'){
            if($vers == 'L'){
                $resu = $debut * 0.100;
                return[
                    'resultat' => $resu,
                ];
            }
            if($vers == 'dL'){
                $resu = $debut * 0.10;
                return[
                    'resultat' => $resu,
                ];
            }
            if($vers == 'mL'){
                $resu = $debut * 10;
                return[
                    'resultat' => $resu,
                ];
            }
        }
        if($de == 'mL'){
            if($vers == 'L'){
                $resu = $debut * 0.1000;
                return[
                    'resultat' => $resu,
                ];
            }
            if($vers == 'dL'){
                $resu = $debut * 0.100;
                return[
                    'resultat' => $resu,
                ];
            }
            if($vers == 'cL'){
                $resu = $debut * 0.10;
                return[
                    'resultat' => $resu,
                ];
            }
        }

    }
