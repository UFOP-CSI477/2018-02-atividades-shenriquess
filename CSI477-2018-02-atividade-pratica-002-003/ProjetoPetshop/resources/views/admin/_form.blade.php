@if (Auth::user()->type == 2)
<div class="input-field">
	<input type="text" name="nome" id="nome" value="{{ isset($registro->nome) ? $registro->nome : null }}">
	<label for="nome">Nome</label>
</div>
@endif
<div class="input-field">
	<input type="text" name="preco" id="preco" value="{{ isset($registro->preco) ? $registro->preco : null }}">
	<label for="preco">Preço</label>
</div>
<div class="row"></div>
<div class="row"></div>
<div class="row">
	<label for="imagem"><h6>&nbsp;&nbsp;&nbsp;Imagem:&nbsp;&nbsp;</h></label>
	<input type="file" name="imagem" id="imagem" value="{{ isset($registro->imagem) ? $registro->imagem : null }}">
</div>
<div class="row"></div>
