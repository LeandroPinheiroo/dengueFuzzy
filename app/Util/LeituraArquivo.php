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
                //falta verificar melhor forma para quantificar os valores
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
}