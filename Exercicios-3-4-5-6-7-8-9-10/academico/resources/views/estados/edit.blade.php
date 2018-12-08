@extends('layouts.app')

@section('content')
 <h1>Editar Estados</h1>
    <form class="" action="{{route('estados.update',$estado->id)}}" method="post">

      @csrf
      @method('PATCH')
      <p>Nome: <input type="text" name="nome" value="{{$estado->nome}}"></p>
      <p>Sigla: <input type="text" name="sigla" value="{{$estado->sigla}}"></p>
      <input type="submit" name="btnSalvar" value="Editar" value="{{$estado->nome}}">
      <div>&nbsp;</div>
      <a href="{{route('estados.index')}}"  class="badge badge-primary">Voltar</a>
      <div>&nbsp;</div>
    </form>


@endsection
