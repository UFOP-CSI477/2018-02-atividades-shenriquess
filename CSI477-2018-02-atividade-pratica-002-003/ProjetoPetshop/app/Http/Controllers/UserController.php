<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    //
    function __construct()
    {
        // obriga estar logado;
        $this->middleware('auth');
    }

    public function update(Request $request){

      $usuario = $request->all(); // resgata o usuario


      if ($usuario['password']) // verifica se a senha foi alterada
      {
          $usuario['password'] = bcrypt($usuario['password']); // muda a senha do seu usuario já criptografada pela função bcrypt
      }

      User::find(Auth::user()->id)->update($usuario);
      // salva o usuario alterado =)

      //Flash::message('Atualizado com sucesso!');
      return redirect()->route('inicio.index');// redireciona pra rota que você achar melhor =)
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit')->with('user', $user);

    }

    
}
