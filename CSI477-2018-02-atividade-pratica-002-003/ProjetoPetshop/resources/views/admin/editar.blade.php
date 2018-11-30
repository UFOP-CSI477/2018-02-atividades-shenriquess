@extends('layout')
@section('pagina_titulo', 'Carrinho de compras - Produtos editar')

@section('pagina_conteudo')
	<div class="container">
		<div class="row">
			<h3>Editar produto "{{ $registro->nome }}"</h3>
			<form method="POST" action="{{ route('produtos.atualizar', $registro->id) }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				{{ method_field('PUT') }}

				@include('admin._form')

				<button type="submit" class="btn blue">Atualizar</button>
			</form>
		</div>
	</div>
	@include('admin._lib')
@endsection
