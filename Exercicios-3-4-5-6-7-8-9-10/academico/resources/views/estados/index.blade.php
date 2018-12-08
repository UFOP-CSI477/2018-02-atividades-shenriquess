@extends('layouts.app')

@section('content')
 <h1>Estados</h1>
 @foreach($estados as $e)
 <p><a href="{{route('estados.show', $e->id )}}">{{ $e->nome }} - {{$e->sigla }}</a></p>
 @endforeach
 <a href="{{route('home')}}" class="badge badge-primary">Voltar</a>
 <div>&nbsp;</div>
@endsection
