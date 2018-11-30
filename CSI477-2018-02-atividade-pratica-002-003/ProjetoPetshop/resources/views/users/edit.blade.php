@extends('layout')
@section('pagina_titulo', 'Cadastro de usuário' )

@section('pagina_conteudo')

<div class="container">
    <div class="row">
        <div class="col l10 offset-l1 s12 m12">
            <h4>Cadastro de usuário</h4>
            <form method="POST" action="{{ url('/user/save') }}">
                {{ csrf_field() }}

                <div class="row">
                    <div class="input-field">
                        <input id="name" type="text" name="name" value="{{$user->name}}" class="validate {{ $errors->has('name') ? ' invalid' : '' }}" required autofocus>
                        <label for="name" data-error="{{ $errors->has('name') ? $errors->first('name') : null }}" >Nome</label>
                    </div>
                </div>

                @include('users._form_email')
                @include('users._form_password')

                <div class="row">
                    <button type="submit" class="btn blue waves-effect waves-light col l6 m6 s12">
                        Editar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
