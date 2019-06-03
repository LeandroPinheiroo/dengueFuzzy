<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Util\LeituraArquivo;
use App\Fuzzy\Fuzzy;



class FuzzyController extends Controller
{
    public function gera_solucao(Request $request){
        if(!empty($_FILES['file']['name'])) { 
            //recupera o nome do arquivo temporario
            $file_tmp = $_FILES["file"]["tmp_name"];
            //realiza a leitura e recebe a matriz de pacientes por sintomas
            $pacientes_sintomas = LeituraArquivo::realiza_leitura($file_tmp);
            //caso retorne null indica que houve erro ao ler do arquivo
            if($pacientes_sintomas == null){
                //retorna para a view
                return redirect()->back()->withErrors(['erro'=>'Ocorreu um erro ao ler arquivo']);
            }
            //cria objeto para realizar fuzzy
            $fuzzy = new Fuzzy($pacientes_sintomas);
            //calcula solucao e retorna o resultado
            $resultado = $fuzzy->calcula_solucao();
            //Caso resultado null
            if($resultado == null){
                //retorna para a view
                return redirect()->back()->withErrors(['erro'=>'Ocorreu um erro ao gerar o resultado']);
            }
            //retorna resultado
            return view('resultado',['matriz_resultado'=>$resultado]);
        }
        //retorna para a view anterior
        return redirect()->back()->withErrors(['erro'=>'Arquivo de entrada não informado']);
    }
}
