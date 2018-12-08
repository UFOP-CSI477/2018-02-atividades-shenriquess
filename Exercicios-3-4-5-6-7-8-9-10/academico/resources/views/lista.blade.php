@extends('layouts.app')

@section('title', 'Lista de pessoas da turma')

@section('content')
  <h1>Lista da turma</h1>


  @foreach($alunos as $a)
    <li>{{ $a }}</li>
  @endforeach

@endsection
