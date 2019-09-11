<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Pedidos;
class PedidosController extends Controller
{
    //

    public function index(){
        
    }

    public function emitidos(){
        //$pedidos=Pedidos::where('estado','E')->get();
        $pedidos=Pedidos::where('estado','I')
        ->orWhere('estado','R')
        ->orWhere('estado','E')
        ->orWhere('estado','RR')
        ->orderby('npedido','ASC')
        ->get();
       // var_dump($pedidos->toSql());
        //dd($pedidos);
        return view('pedidos.emitidos',compact('pedidos'));  
    }
}
