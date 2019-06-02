<?php

namespace App\Fuzzy;


class Fuzzy 
{
    private $pacientes_sintomas = null; //Matriz para receber os sintomas dos pacientes
    //Matriz padrao contendo os sintomas e cada peso do mesmo
    private $sintomas_diagnosticos = [
                                        [1, 0.75, 0.75],
                                        [0.75, 1, 0.5],
                                        [0, 0, 0.5],
                                        [0.5, 0.5, 0.75],
                                        [0.5, 0.25, 0.5],
                                        [0, 0.25, 0.75],
                                        [0.5, 0.5, 0.25],
                                        [0, 0.75, 0],
                                        [0.75, 0.75, 0],
                                        [0.25, 0, 0]
                                    ];
    public function __construct($pacientes_sintomas){
        //construtor para instanciar a matriz de pacientes sintomas
        $this->pacientes_sintomas = $pacientes_sintomas;
    }

    /**
     * Funcao para calcular a solucao da logica Fuzzy utilizando operador MIN MAX
    */
    public function calcula_solucao(){
        //Cria matriz de resposta
        $resultado = array(array());
        // for para varrer as linhas dos sintomas dos pacientes
        for($i = 0; $i < sizeof($this->pacientes_sintomas); $i++){
            //for para varrer as colunas da matriz padrao de diagnosticos por pesos
            for($j = 0; $j < sizeof($this->sintomas_diagnosticos[0]); $j++){
                //cria vetor para que seja possivel pegar o maior valor posteriormente
                $vetor = array();
                //for para varrer as colunas dos sintomas dos pacientes
                for($k = 0; $k < sizeof($this->pacientes_sintomas[0]); $k++){
                    //Realiza operador MIN
                    //caso sintoma do paciente na [i][k] menor ou igual que na [k][j]
                    if ($this->pacientes_sintomas[$i][$k] <= $this->sintomas_diagnosticos[$k][$j]) {
                        //joga valor no vetor
                        $vetor[$k] = $this->pacientes_sintomas[$i][$k];
                    //caso contrario
                    } else if ($this->pacientes_sintomas[$i][$k] >= $this->sintomas_diagnosticos[$k][$j]) {
                        // joga valor no vetor
                        $vetor[$k] = $this->sintomas_diagnosticos[$k][$j];
                    }                    
                }
                //Realiza operador MAX jogando na matriz de resultado o maior velor do vetor na passada
                $resultado[$i][$j] = max($vetor);
            }
        }
        //retorna o resultado
        return $resultado;
    }
}