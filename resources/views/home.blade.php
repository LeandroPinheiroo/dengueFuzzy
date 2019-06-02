@extends('layouts.master')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form enctype="multipart/form-data" action = "{{ route('gera_solucao') }}" method = "POST">
                @csrf
                <div class="form-group">
                  <label for="arquivo">Importar Dados</label>
                  <input type="file" name="file" id="file" class="form-control jfilestyle" data-buttonText="Escolher arquivo"accept="image/*"  />
                </div>
                <button type="submit" class="btn btn-primary">Gerar Resultados</button>
            </form>
        </div>
    </div>
</div>
@endsection
