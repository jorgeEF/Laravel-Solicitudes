<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    /**
     * index para mostrar todas las categorias
     * store para guardar categoria
     * edit para editar categoria
     * update para actualizar categoria
     * destroy para eliminar categoria
     */

    public function index(){
        $categories = Category::all();
        return view('categories.index', ['categories' => $categories]);
    }

    public function create(){
        $categories = Category::all();
        return view('categories.create', ['categories' => $categories]);
    }

    public function store(Request $request){
       $request->validate([
           'name' => 'required|min:2'
       ]);
       $categories = new Category;
       $categories->name = $request->name;
       $categories->save();

       return redirect()->route('categories')->with('success', 'Categoría creada correctamente');
    }

    public function edit($id){
       $category = Category::find($id);
       return view('categories.edit', ['category' => $category]);
   }

   public function update(Request $request, $id){
       $category = Category::find($id);
       $category->name = $request->name;
       $category->save();

       return redirect()->route('categories')->with('success', 'Categoría actualizada.');
   }

   public function destroy($id){
       $category = Category::find($id);
       $category->delete();

       return redirect()->route('categories')->with('success', 'Categoría eliminada.');
   }
}
