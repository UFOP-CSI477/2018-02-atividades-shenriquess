<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Produto;
use App\Carrinho;
use App\Compra;
use App\User;
use Auth;
use Session;

class HomeController extends Controller
{

    public function index()
    {
        if(Auth::guest()){
              $registros = Produto::all();

              return view('home.index', compact('registros'));
        }else{
          if(Auth::user()->type == 2 || Auth::user()->type ==3 ){
              return redirect()->route('produtos.index');
          }
        }
        $registros = Produto::all();

        return view('home.index', compact('registros'));
    }

    public function produto($id = null)
    {
        if( !empty($id) ) {
            $registro = Produto::where([
                'id'    => $id])->first();

            if( !empty($registro) ) {
                return view('home.produto', compact('registro'));
            }
        }
        return redirect()->route('inicio.index');
    }

    public function addCarrinho(Request $request, $id){

    $produto = Produto::find($id);
     $oldCarrinho = Session::has('carrinho') ? Session::get('carrinho') : null;
     $carrinho = new Carrinho($oldCarrinho);
     $carrinho->add($produto, $produto->id);

     $request->session()->put('carrinho', $carrinho);
     //dd($request->session->get('carrinho'));
     $request->session()->flash('admin-mensagem-sucesso', 'Produto adicionado ao carrinho!');

     return redirect()->route('inicio.index');


   }

   public function getCarrinho(){
       if (!Session::has('carrinho')) {
           return view('carrinho.itensCarrinho');
       }

       $oldCarrinho = Session::get('carrinho');
       $carrinho = new Carrinho($oldCarrinho);
       return view('carrinho.itensCarrinho', ['produtos' => $carrinho->itens, 'totalPreco' => $carrinho->total]);
   }

   public function cancelCarrinho(Request $request){
      if (!Session::has('carrinho')){
        return redirect()->route('produto.itensCarrinho');
      }

      Session::forget('carrinho');
      session()->flash('user-mensagem-sucesso', 'Compra Cancelada!');
      return redirect()->route('inicio.index');
    }

}
