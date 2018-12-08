@extends('layouts.app')

@section('content')
 <h1>Editar Alunos</h1>
    <form class="" action="{{route('alunos.update',$aluno->id)}}" method="post">

      @csrf
      @method('PATCH')

      <p>Nome: <input type="text" name="nome" value="{{$aluno->nome}}"></p>
      <p>Matrícula: <input type="text" name="matricula" value="{{$aluno->matricula}}"></p>
      <p>Email <input type="text" name="email" value="{{$aluno->email}}"></p>
      <p>Cidade:</p>
      <select class="" name="cidade_id">
          @foreach($cidades as $c)
          <option value="{{$c->id}}"
            @if($c->id == $aluno->cidade_id)
              selected
            @endif
            >{{$c->nome}}</option>
          @endforeach
      </select>
      <div>&nbsp;</div>
      <input type="submit" name="btnSalvar" value="Editar">
      <div>&nbsp;</div>
      <a href="{{route('alunos.index')}}" class="badge badge-primary">Voltar</a>
      <div>&nbsp;</div>
    </form>

@endsection
