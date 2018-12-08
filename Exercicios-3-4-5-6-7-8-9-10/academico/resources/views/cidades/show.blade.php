@extends('layouts.app')

@section('content')

 <h1>Cidade: {{$cidade->nome}} - {{$cidade->estado->sigla}}</h1>

 <p>Código: {{$cidade->id}}</p>
 <p>Nome: {{$cidade->nome}}</p>
 <p>Estado: {{$cidade->estado_id}}</p>

 <a href="{{route('cidades.index')}}" class="badge badge-primary">Voltar</a>
 <a href="{{route('cidades.edit',$cidade->id)}}" class="badge badge-success">Editar</a>
 <div>&nbsp;</div>
 <form class="" action="{{route('cidades.destroy',$cidade->id)}}" method="post" onsubmit="return confirm('Confirma exclusão da Cidade: {{$cidade->nome}}?');">
   @csrf
   @method('DELETE')
   <input type="submit" value="Excluir">
 </form>
@endsection
