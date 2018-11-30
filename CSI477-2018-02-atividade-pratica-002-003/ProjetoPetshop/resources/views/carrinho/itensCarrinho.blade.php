@extends('layout')
@section('pagina_titulo', 'Carrinho' )

@section('pagina_conteudo')

	@if(Session::has('carrinho'))

		<div class="row">
			<div class="col-sm6 col-md6">
				<ul class="list-group">
          <div class="container">
            <h2>Produtos no carrinho</h2>
            <table class="table">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Quantidade</th>
                  <th>Preço</th>
                </tr>
              </thead>
              <tbody>
    					    @foreach($produtos as $produto)
                  <tr>
                    <td>{{ $produto['item']['nome'] }}</td>
                    <td>{{ $produto['qtd'] }}</td>
                    <td>R$ {{ $produto['preco'] }}</td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
            <div class="row"></div>
              <div class="row">
          			<div class="col-sm-6 col-md-6">
          				<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total: R$ {{ $totalPreco }}</strong>
          			</div>
          		</div>


          		<div class="row">
          			<div class="col-sm-6">
          				<a href="{{ route('produto.postCarrinho') }}" class="btn btn-success pull-right" role="button">Finalizar Compra</a>
									<a href="{{ route('produto.cancelCarrinho') }}" class="btn btn-danger pull-right" role="button">Cancelar Compra</a>
								</div>

          		</div>
          </div>

				</ul>

			</div>
		</div>

		@else
		<div class="row">
			<div class="col-sm-6 col-md-6">
				<h2>Carrinho Vazio</h2>
			</div>
		</div>

		@endif

@endsection
