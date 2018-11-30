@extends('layout')
@section('pagina_titulo', 'HOME')

@section('pagina_conteudo')

<div class="container">
	@if (Session::has('mensagem-compra'))
					<div class="card-panel green"><strong>{{ Session::get('mensagem-compra') }}<strong></div>
	@endif
	<div class="row">
	@foreach($registros as $registro)
		<div class="col s12 m6 l4">
			<div class="card medium">
				<div class="card-image">
					<img src="/storage/imagens/{{ $registro->imagem }}">
				</div>
				<div class="card-content">
					<span class="card-title grey-text text-darken-4 truncate" title="{{ $registro->nome }}">{{ $registro->nome }}</span>
					<p>R$ {{ number_format($registro->preco, 2, ',', '.') }}</p>
				</div>
				<div class="card-action">
					<a class="blue-text" href="{{ route('home.produtos', $registro->id) }}">Veja mais informações</a>
				</div>
			</div>
		</div>
	@endforeach
	</div>
</div>

@endsection
