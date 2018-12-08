@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Opções</div>

                <div class="card-body">
                      <a class="nav-item nav-link" href="/alunos">Alunos</a>
                      <a class="nav-item nav-link" href="/cidades">Cidades</a>
                      <a class="nav-item nav-link" href="/estados">Estados</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
