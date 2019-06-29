<?php

namespace App\Http\Controllers;

use App\Categorias; //require_once('modelo/categorias.php')
use Illuminate\Http\Request;

class CategoriasController extends Controller {

    function index() {
        //Aquí mostraré todas las categorías

        $categorias = Categorias::all();
        //['categorias'=>$categorias] lo mismo que compact
        return view("Categorias.index", compact('categorias'));
    }

    public function create() {
        //
        return view('Categorias.create');
    }

    public function store(Request $request) {
        try {
            Categorias::create($request->all());
            return redirect()->route('categorias.index');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function edit($id) {
        //
        $categoria = Categorias::find($id);
        return view('Categorias.edit', compact('categoria'));
    }

    public function update(Request $request, $id) {
        Categorias::find($id)->update($request->all());
        return redirect()->route('categorias.index');
    }

    public function destroy($id) {
        
        Categorias::find($id)->delete();
        return redirect()->route('categorias.index');
    }

}
