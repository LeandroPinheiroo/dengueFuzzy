@extends('layouts.master')

@section('body')
<style>
/*
 * jquery-filestyle
 * doc: http://markusslima.github.io/jquery-filestyle/
 * github: https://github.com/markusslima/jquery-filestyle
 *
 * Copyright (c) 2017 Markus Vinicius da Silva Lima
 * Version 2.1.0
 * Licensed under the MIT license.
 */
 .jfilestyle {
	display: inline-block;
	margin: 0px 0px 10px 0px;
	padding: 0px;
	position: relative;
	border-collapse: separate;
}

div.jfilestyle label, div.jfilestyle input {
	font-family: sans-serif;
}

div.jfilestyle input {
	border: 1px solid #c0c0c0;
	background: #d9d9d9;
	margin: 0px -5px 0px 0px;
	vertical-align: middle;
	padding: 10px 15px;
	font-size: 14px;
	border-radius: 0px;
	color: #8d8d8d;
	cursor: default;
    line-height: normal;
}

div.jfilestyle label {
	display: inline-block;
	border: 1px solid #c0c0c0;
	background: #ffffff;
	padding: 10px 15px;
	color: #0662ba;
	vertical-align: middle;
	line-height: normal;
	text-align: center;
	margin: 0px;
	font-size: 14px;
	width: auto;
	border-radius: 0px;
    font-weight: normal;
}

div.jfilestyle.jfilestyle-corner input:last-child,
div.jfilestyle.jfilestyle-corner label:last-child {
	margin-left: -1px;
}

div.jfilestyle label[disabled] {
	pointer-events: none;
	opacity: 0.6;
	filter: alpha(opacity=65);
	cursor: not-allowed;
}

div.jfilestyle label:hover {
	cursor: pointer;
	opacity: 0.9;
}

div.jfilestyle .count-jfilestyle {
	background: #303030;
	color: #fff;
	border-radius: 50%;
	padding: 1px 5px;
	font-size: 12px;
	vertical-align: middle;
}

/** 
 * THEMES
 */
div.jfilestyle.jfilestyle-theme-blue input {/**/}
div.jfilestyle.jfilestyle-theme-blue label {
	border-color: #438eff;
	background: #438eff;
	color: #fff;
}
div.jfilestyle.jfilestyle-theme-green input {/**/}
div.jfilestyle.jfilestyle-theme-green label {
	border-color: #18a063;
	background: #18a063;
	color: #fff;
}
div.jfilestyle.jfilestyle-theme-yellow input {/**/}
div.jfilestyle.jfilestyle-theme-yellow label {
	border-color: #e8c821;
	background: #e8c821;
	color: #fff;
}
div.jfilestyle.jfilestyle-theme-black input {/**/}
div.jfilestyle.jfilestyle-theme-black label {
	border-color: #424242;
	background: #424242;
	color: #fff;
}
div.jfilestyle.jfilestyle-theme-red input {/**/}
div.jfilestyle.jfilestyle-theme-red label {
	border-color: #f33f3f;
	background: #f33f3f;
	color: #fff;
}
div.jfilestyle.jfilestyle-theme-purple input {/**/}
div.jfilestyle.jfilestyle-theme-purple label {
	border-color: #873aff;
	background: #873aff;
	color: #fff;
}
div.jfilestyle.jfilestyle-theme-asphalt input {/**/}
div.jfilestyle.jfilestyle-theme-asphalt label {
	border-color: #435673;
	background: #435673;
	color: #fff;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if($errors->any())
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Atenção!</strong> {{$errors->first()}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endIF
            
            <form enctype="multipart/form-data" action = "{{ route('gera_solucao') }}" method = "POST">
                @csrf
                <div class="form-group">
                  <label for="arquivo">Importar Dados *</label><br>
                  <input type="file" name="file" id="file" class="form-control jfilestyle" data-buttonText="Escolher arquivo" required/> &nbsp; &nbsp;&nbsp; &nbsp;
                  <button type="submit" class="btn btn-primary">Gerar Resultados</button>

                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $( document ).ready(function() {
        $('#file').jfilestyle({
            text : 'Abrir',
            placeholder: 'Escolha um arquivo',
            dragdrop: false,
            buttonBefore: true
        });
    });

    
</script>
@endsection
