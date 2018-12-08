@extends('layouts.app')

@section('content')
 <h1>Inserir Alunos</h1>
    <form class="" action="/alunos" method="post">

      @csrf
      <p>Nome: <input type="text" name="nome"></p>
      <p>Matrícula: <input type="text" name="matricula"></p>
      <p>Email <input type="text" name="email">:</p>
      <p>Cidade:</p>
      <select class="" name="cidade_id">
          @foreach($cidades as $c)
            <option value="{{$c->id}}">{{$c->nome}}</option>
          @endforeach
      </select>
      <div>&nbsp;</div>
      <input type="submit" name="btnSalvar" value="Incluir">
      <div>&nbsp;</div>
      <a href="{{route('alunos.index')}}" class="badge badge-primary">Voltar</a>
      <div>&nbsp;</div>
    </form>

@endsection
