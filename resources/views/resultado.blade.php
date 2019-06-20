@extends('layouts.master')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Probabilidades do paciente ter a doença</h3>
            <table class="table table-striped" style="text-align:center">
                <tr>
                    <thead class="thead-dark">
                        <th style="text-align:left; width:10%;">#</th>
                        <th>Dengue</th>
                        <th>Chikungunya</th>
                        <th>Zika</th>
                    </thead>
                </tr>
                @for($i = 0; $i < sizeof($matriz_resultado); $i++)
                    <tr>
                    <th scope="row" style="text-align:left;">Paciente {{$i + 1}}</th>
                    @foreach ($matriz_resultado[$i] as $item)
                        <td>
                            {{$item * 100}}%
                        </td>
                    @endforeach
                    </tr>
                @endfor
            </table>
        </div>
    </div>
</div>
@endsection