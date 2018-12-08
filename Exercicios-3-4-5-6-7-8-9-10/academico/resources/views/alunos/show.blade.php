@extends('layouts.app')

@section('content')

 <h1>Aluno: {{$aluno->nome}}</h1>

 <p>Nome: {{$aluno->nome}}</p>
 <p>Matricula: {{$aluno->matricula}}</p>
 <p>Email: {{$aluno->email}}</p>
 <p>Cidade: {{$aluno->cidade->nome}}</p>

 <a href="{{route('alunos.index')}}" class="badge badge-primary" class="badge badge-success">Voltar</a>
 <a href="{{route('alunos.edit',$aluno->id)}}" class="badge badge-success">Editar</a>
 <div>&nbsp;</div>

 <form class="" action="{{route('alunos.destroy',$aluno->id)}}" method="post" onsubmit="return confirm('Confirma exclusão do Aluno: {{$aluno->nome}}?');">
   @csrf
   @method('DELETE')
   <input type="submit" value="Excluir">
 </form>
@endsection
