<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedidos;
class PedidosController extends Controller
{
    //

    public function index(){
        
    }

    public function emitidos(){
        //$pedidos=Pedidos::where('estado','E')->get();
        $pedidos=Pedidos::skip(0)->take(10)->get();
        //dd($pedidos);
        return view('pedidos.emitidos',compact('pedidos'));  
    }
}
