@extends('layout')
@section('pagina_titulo', 'Carrinho de compras - Produtos')

@section('pagina_conteudo')
	<div class="container">
		<div class="row">
			<h3>Lista de produtos</h3>
			@if (Session::has('produto-mensagem-sucesso'))
	            <div class="card-panel green"><strong>{{ Session::get('produto-mensagem-sucesso') }}<strong></div>
	    @endif

			@if (Session::has('produto-mensagem-erro'))
	            <div class="card-panel red"><strong>{{ Session::get('produto-mensagem-erro') }}<strong></div>
	    @endif
			<table>
				<thead>
					<tr>
						<th></th>
						<th>ID</th>
						<th>Nome</th>
						<th>Preço</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($produtos as $produto)
					<tr>
						<td>
							<a class="btn-flat tooltipped" href="{{ route('produtos.editar', $produto->id) }}" class="btn-flat tooltipped" data-position="right" data-delay="50" data-tooltip="Editar produto?">
								<i class="material-icons black-text">mode_edit</i>
							</a>
							@if (Auth::user()->type == 2)
							<a class="btn-flat tooltipped" href="{{ route('produtos.deletar', $produto->id) }}" class="btn-flat tooltipped" data-position="right" data-delay="50" data-tooltip="Deletar produto?">
								<i class="material-icons black-text">delete</i>
								</a>
							@endif
						</td>
						<td>{{ $produto->id }}</td>
						<td>{{ $produto->nome }}</td>
						<td>R$ {{ $produto->preco }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		@if (Auth::user()->type == 2)
		<div class="row">
			<a class="btn-floating btn-large blue tooltipped" href="{{ route('produtos.adicionar') }}" title="Adicionar" data-position="top" data-delay="50" data-tooltip="Adicionar produto?">
				<i class="material-icons">add</i>
			</a>
		</div>
		@endif
	</div>

@endsection
