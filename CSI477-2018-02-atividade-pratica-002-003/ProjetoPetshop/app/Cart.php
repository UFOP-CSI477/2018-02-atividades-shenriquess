<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use Auth;
use Session;

class Cart
{
    public $itens = null;
    public $quant = 0;
    public $total = 0;
    public $id_prod = 0;
    public $id_usr = 0;

    public function __construct($oldCart)
    {
    	if ($oldCart) {
    		$this->itens = $oldCart->itens;
    		$this->quant = $oldCart->quant;
    		$this->total = $oldCart->total;

    	}
    }

    public function add($item, $id) {
      $itensComprados = ['qtd' => 0, 'preco' => $item->preco, 'item' => $item, 'id_prod' => $id];

    	if ($this->itens) {
    		if(array_key_exists($id, $this->itens)) {
    			$itensComprados = $this->itens[$id];
    		}
    	}
    	$itensComprados['qtd']++;
    	$itensComprados['preco'] = $item->preco * $itensComprados['qtd'];
    	$this->itens[$id] = $itensComprados;
    	$this->quant++;
    	$this->total += $item->preco;

    }

}
