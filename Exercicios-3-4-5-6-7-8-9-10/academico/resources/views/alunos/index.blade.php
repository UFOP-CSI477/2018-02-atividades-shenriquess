@extends('layouts.app')

@section('content')
 <h1>Alunos</h1>
 @foreach($alunos as $a)
 <p><a href="{{route('alunos.show', $a->id )}}">{{ $a->nome }} - {{$a->cidade->nome }}</a></p>
 @endforeach
 <a href="{{route('home')}}" class="badge badge-primary">Voltar</a>
 <div>&nbsp;</div>
@endsection
