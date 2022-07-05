<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Category;
use App\Http\Controllers\Auth;

class PedidosController extends Controller
{
    /**
     * index para mostrar todas las solicitudes
     * store para guardar solicitud
     * edit para editar solicitud
     * update para actualizar solicitud
     * destroy para eliminar solicitud
     */

    public function index(Request $request){

        $pedidos = Pedido::all();

        if ($request->input('status')) {
            $filterStatus = $request->input('status', null);
            $pedidos = Pedido::Status($filterStatus);
        }
        if ($request->input('search')) {
            $filterSearch = $request->input('search', null);
            $pedidos = Pedido::Search($filterSearch);
        }

        return view('pedidos.index', ['pedidos' => $pedidos]);
    }

    public function create(){
        $pedidos = Pedido::all();
        $categories = Category::all();
        return view('pedidos.create', ['pedidos' => $pedidos, 'categories' => $categories]);
    }

    public function store(Request $request){
       $request->validate([
           'title' => 'required|min:3'
       ]);
       $pedido = new Pedido;
       $pedido->title = $request->title;
       $pedido->description = $request->description;
       $pedido->quantity = $request->quantity;
       $pedido->category_id = $request->category_id;
       $pedido->created_by = $request->user()->name;
       $pedido->save();

       return redirect()->route('pedidos')->with('success', 'Pedido creado correctamente');
    }

    public function edit($id){
       $pedido = Pedido::find($id);
       return view('pedidos.edit', ['pedido' => $pedido]);
   }

   public function update(Request $request, $id){
       $pedido = Pedido::find($id);
       $pedido->title = $request->title;
       $pedido->description = $request->description;
       $pedido->quantity = $request->quantity;
       $pedido->status = $request->status;
       $pedido->save();

       return redirect()->route('pedidos')->with('success', 'Pedido actualizado.');
   }

   public function approve(Request $request, $id){
    $pedido = Pedido::find($id);
    $pedido->status = ('con expediente');
    $pedido->tracking_no = '000-'.$id;
    $pedido->approved_by = $request->user()->name;
    $pedido->save();

    return redirect()->route('pedidos')->with('success', 'Pedido aprobado.');
    }

    public function reject(Request $request, $id){
        $pedido = Pedido::find($id);
        $pedido->status = ('rechazado');
        $pedido->save();

        return redirect()->route('pedidos')->with('success', 'Pedido rechazado.');
    }

   public function destroy($id){
       $pedido = Pedido::find($id);
       $pedido->delete();

       return redirect()->route('pedidos')->with('success', 'Pedido eliminado.');
   }
}
