<?php

namespace App\Fuzzy;


class Fuzzy 
{
    private $pacientes = null;
    private $doencas = null;

    public function __construct($pacientes,$doencas){
        $this->pacientes = $pacientes;
        $this->doencas = $doencas;
    }

    public function calcula_solucao(){
        $resultado = array(array());
        for($i = 0; $i < sizeof($this->pacientes); $i++){
            for($j = 0; $j < sizeof($this->doencas); $j++){
                $vetor = array();
                for($k = 0; $k < sizeof($this->doencas); $k++){
                    if ($this->pacientes[$i][$k] <= $this->doencas[$k][$j]) {
                        $vetor[$k] = $this->pacientes[$i][$k];
                    } else if ($this->pacientes[$i][$k] >= $this->doencas[$k][$j]) {
                        $vetor[$k] = $this->doencas[$k][$j];
                    }                    
                }
                $resultado[$i][$j] = max($vetor);
            }
        }
        return $resultado;
    }
}