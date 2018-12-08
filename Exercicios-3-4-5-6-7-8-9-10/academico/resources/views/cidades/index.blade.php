@extends('layouts.app')

@section('content')
 <h1>Cidades</h1>
 @foreach($cidades as $c)
 <p><a href="{{route('cidades.show', $c->id )}}">{{ $c->nome }} - {{$c->estado->nome}}</a></p>
 @endforeach
 <a href="{{route('home')}}" class="badge badge-primary">Voltar</a>
 <div>&nbsp;</div>
@endsection
