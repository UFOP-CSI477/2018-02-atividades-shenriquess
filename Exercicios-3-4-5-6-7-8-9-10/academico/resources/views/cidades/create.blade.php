@extends('layouts.app')

@section('content')
 <h1>Inserir Cidades</h1>
    <form class="" action="/cidades" method="post">

      @csrf
      <p>Nome: <input type="text" name="nome"></p>
      <p>Estado:</p>
      <select class="" name="estado_id">
          @foreach($estados as $e)
            <option value="{{$e->id}}">{{$e->nome}}</option>
          @endforeach
      </select>
      <div>&nbsp;</div>
      <input type="submit" name="btnSalvar" value="Incluir">
      <div>&nbsp;</div>
      <a href="{{route('cidades.index')}}">Voltar</a>
      <div>&nbsp;</div>
    </form>

@endsection
