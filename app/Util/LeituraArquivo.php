<?php

namespace App\Util;

/**
 * Classe responsavel por realizar leitura do arquivo e montar matriz de pacientes por sintomas 
*/
class LeituraArquivo 
{
    //Metodo statico para realizar a leitura do arquivo
    public static function realiza_leitura($caminho){
        if ($fh = fopen($caminho, 'r')) { //abre o arquivo em modo leitura
            $pacientes_sintomas = array(array());//instacia da matriz de paceintes por sintomas
            $i = 0;//contador para representar linhas da matriz
            while (!feof($fh)) {//enquanto n chega no fim do arquivo
                $line = fgets($fh);//le a linha atual
                $csv = explode(";", $line);//quebra o csv no ;
                if(sizeof($csv) < 10){// se menor que 10 indica que o arquivo nao foi montado corretamente
                    return null;//retorna null
                }
                $csv = LeituraArquivo::quantifica_valores($csv);
                //caso contrario joga todas as posicoes na linha em questado da matriz
                $pacientes_sintomas[$i] = $csv;
                //soma para a proxima linha
                $i++;
            }
            fclose($fh);//fecha arquivo
            return $pacientes_sintomas;//retorna matriz de sintomas
        }
        //retorna NULL indicando erro ao abrir o arquivo
        return null;
    }
    /**
     * Funcao para quantificar valores do arquivo csv
     * Indica valores de febre acima de 40º para 100%
     */
    public static function quantifica_valores($csv){
        //converte valor de febre para float
        $csv[0] = floatVal($csv[0]);
        //se maior que 40 seta 100%
        if($csv[0] >= 40){
            $csv[0] = 1;
        //entre 37 e 38 e realizado a regra de 3 para quantificar o valor e multiplicado por 0.2 para dar peso
        }else if($csv[0] >= 37.0 && $csv[0] < 38.0){
            $csv[0] = 0.2 * ($csv[0] / 40);
        //entre 38 e 39 e realizado a regra de 3 para quantificar o valor e multiplicado por 0.4 para dar peso
        }else if($csv[0] >= 38.0 && $csv[0] < 39.0){
            $csv[0] = 0.4 * ($csv[0] / 40);
        //entre 39 e 40 e realizado a regra de 3 para quantificar o valor e multiplicado por 0.9 para dar peso (por ser febra elevada)
        }else if($csv[0] >= 39.0 && $csv[0] < 40.0){
            $csv[0] = 0.9 * ($csv[0] / 40);
        }
        //para os demais valores
        for($i = 1; $i < sizeof($csv); $i++){
            if($csv[$i] == "Inesistente"){//se inesistente seta 0%
                $csv[$i] = 0;
            }else if($csv[$i] == "Baixa"){//se Baixa seta 30%
                $csv[$i] = 0.3;
            }
            else if($csv[$i] == "Media"){//se Media seta 60%
                $csv[$i] = 0.6;
            }
            else if($csv[$i] == "Alta"){//se Alta seta 100%
                $csv[$i] = 1;
            }
        }
        //retorna valores quantificados
        return $csv;
    }
}