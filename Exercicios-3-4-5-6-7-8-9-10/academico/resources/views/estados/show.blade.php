@extends('layouts.app')

@section('content')

 <h1>Estado: {{$estado->nome}} - {{$estado->sigla}}</h1>

 <p>Código: {{$estado->id}}</p>
 <p>Nome: {{$estado->nome}}</p>
 <p>Sigla: {{$estado->sigla}}</p>

 <a href="{{route('estados.index')}}" class="badge badge-primary">Voltar</a>
 <a href="{{route('estados.edit',$estado->id)}}" class="badge badge-success">Editar</a>
 <div>&nbsp;</div>
 <form class="" action="{{route('estados.destroy',$estado->id)}}" method="post" onsubmit="return confirm('Confirma exclusão do Estado: {{$estado->nome}}?');">
   @csrf
   @method('DELETE')
   <input type="submit" value="Excluir">
 </form>
@endsection
