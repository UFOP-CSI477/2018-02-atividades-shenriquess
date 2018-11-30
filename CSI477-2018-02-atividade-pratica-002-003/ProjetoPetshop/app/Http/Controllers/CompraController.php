<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Produto;
use App\Cart;
use App\User;
use App\Compra;
use Auth;
use Session;
use DB;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

     */

     public function __construct()
     {
       $this->middleware('auth');
     }

    public function index()
    {
      /*if(Auth::user()->tipo ==1){//somente o tipo 1 pode acessar
        $compras = Compra::all();
        return view('compras.index')->with('compras', $compras);
      } else {
        session()->flash('error',  'Acesso não autorizado!');
        return redirect('/homec');
      }*/



      $compras = DB::table('compras')
        ->join('produtos', function ($join) {
            $join->on('produtos.id', '=', 'compras.produto_id')
                 ->where('user_id', '=', Auth::id());
        })
        ->get();

      return view('compras.index')->with('compras', $compras);
    }


}
