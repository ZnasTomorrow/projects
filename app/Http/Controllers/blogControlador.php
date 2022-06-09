<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\categoria;
use App\Models\producto;

class blogControlador extends Controller
{
    /*mostrar todos los datos
    * update  para actializar
    * destroy para eliminar
    * edit para editar
    * saving  para guardar  los blogs
    * store es comun de colocar
    */
     public function saving (Request $request){
       $request->validate([
         'nombre'=>'required|min:3'
         ]);
         $lista = new Producto();
         $lista->nombre = $request->nombre;
         $lista->categoria_id = $request->categoria_id;
         $lista->save();
         
         return redirect()->route('RideCapital')->with('success','Producto Ingresando');
     }

    public function mostrar(){
      $posts = Producto::all();
      $categories = categoria::all();
     return  view('RideCapital.inicio', [
    'posts' => $posts, 'categories' => $categories
]);
    }
   
    public function show($id){
      $formUpdate = Producto::find($id);
     return  view('RideCapital.show', [
    'formUpdate' => $formUpdate,
]);
    }
 
    public function update(Request $request, $id){
       $formUpdate = Producto::find($id);
       
       //funcion q sirve pars debugger con el se puede ver metadatos de consulta
       // dd($request); 
       
       $formUpdate->nombre = $request->nombre;
        $formUpdate->save();
        //siguiente linea no funciona ya q alli se usa unas variables q no estan desde actualizar
        //  return  view('RideCapital.inicio', ['success' => 'producto actualizado']);
        return redirect()->route('RideCapital')->with('success','Producto actualizado');
        
    }
    
    public function destroy($id){
      $elemento = Producto::find($id);
      $elemento->delete();
       return redirect()->route('RideCapital')->with('success','El Producto se elimino correctamente');
       
    }
}
   
