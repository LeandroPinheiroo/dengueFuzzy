@extends('layouts.master')

@section('body')
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
                  <label for="arquivo">Importar Dados *</label>
                  <input type="file" name="file" id="file" class="form-control jfilestyle" data-buttonText="Escolher arquivo" required/>
                </div>
                <button type="submit" class="btn btn-primary">Gerar Resultados</button>
            </form>
        </div>
    </div>
</div>
@endsection
