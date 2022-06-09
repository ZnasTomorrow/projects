<?php

namespace App\Http\Controllers;
/*
*Display the especified resources
* @param in
* @return \Illuminate\Http\Response
*
*/

use Illuminate\Http\Request;
use App\Models\categoria;
use App\Models\producto;


class categoriaControl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mostrar categoría
        $todascategoria = categoria::all();
        return view('categories.index', [
            'todascategoria' => $todascategoria
          ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //en este proyecto no se usara ya que es por formularios la inserccion de datos min 1:17:06 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //insertar datos mefiante formularios lo que esta despues de la flecha es sinraxis validacion de la BD
        $request-> validate ([
          'nombreCategoria' => 'required|unique:categorias|max:100',
          'color' => 'required|max:7'
          ]);
          $categoria = new categoria;
          $categoria -> nombreCategoria = $request->nombreCategoria;
          $categoria -> color = $request->color;
          $categoria -> save();
          return redirect()->route('categories.index')->with('success','Nueva categoria creada');
          
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category)
    {
        //mostrar datos para actualizar
         $mostrarCatalogo = categoria::find($category);
     
             return  view('categories.show', [
    'mostrarCatalogo' => $mostrarCatalogo,
]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category)
    {
        //
        $request-> validate ([
          'nombreCategoria' => 'required|unique:categorias|max:100',
          'color' => 'required|max:7'
          ]);
        
        $categoria = categoria::find($category);
        $categoria -> nombreCategoria = $request->nombreCategoria;
        $categoria -> color = $request->color;
        $categoria -> save();
          
        return redirect()->route('categories.index')->with('success','categoria actualizada');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {
        //
        $categoria = categoria::find($category);
        $categoria->productos()->each( function ($productos){
          $productos->delete();
        });
        $categoria->delete();
        return redirect()->route('categories.index')->with('success','categoria eliminada');
       
    }
}
