@extends('layouts.app')

@section('content')
 <h1>Editar Cidades</h1>
    <form class="" action="{{route('cidades.update',$cidade->id)}}" method="post">

      @csrf
      @method('PATCH')

      <p>Nome: <input type="text" name="nome" value="{{$cidade->nome}}"></p>
      <p>Estado:</p>
      <select class="" name="estado_id">
          @foreach($estados as $e)
          <option value="{{$e->id}}"
            @if($e->id == $cidade->estado_id)
              selected
            @endif
            >{{$e->nome}}</option>
          @endforeach
      </select>
      <div>&nbsp;</div>
      <input type="submit" name="btnSalvar" value="Editar">
      <div>&nbsp;</div>
      <a href="{{route('cidades.index')}}" class="badge badge-primary">Voltar</a>
      <div>&nbsp;</div>
    </form>

@endsection
