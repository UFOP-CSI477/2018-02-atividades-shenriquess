@extends('layout')
@section('pagina_titulo', 'COMPRAS' )

@section('pagina_conteudo')

<h1>Lista de Compras</h1>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Id</th>
      <th>Produto</th>
      <th>Quantidade</th>
      <th>Data</th>


    </tr>
  </thead>
<tbody>
@foreach ($compras as $c)

<tr>
  <td><a href="/compras/{{ $c->id }}">{{ $c->id }}</a> </td>
  <td>{{ $c->produto->nome }} </td>
  <td>{{ $c->quantidade}}</td>
  <td>{{ $c->data }}</td>




</tr>
@endforeach
</tbody>
</table>

@endsection
