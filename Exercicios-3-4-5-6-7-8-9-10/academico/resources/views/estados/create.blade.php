@extends('layouts.app')

@section('content')
 <h1>Inserir Estados</h1>
    <form class="" action="/estados" method="post">

      @csrf
      <p>Nome: <input type="text" name="nome"></p>
      <p>Sigla: <input type="text" name="sigla"></p>
      <input type="submit" name="btnSalvar" value="Incluir">
      <a href="{{route('estados.index')}}">Voltar</a>
      <div>&nbsp;</div>
    </form>

@endsection
