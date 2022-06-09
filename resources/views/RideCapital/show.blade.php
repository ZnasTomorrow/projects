@extends('Prueba')
@section('ContentPlantillas')
  <h1 class="ml-10">Gestion de Productos</h1>
    <div class="container w-25 border p-4 mt-3">
    <form method="post" action="{{ route('RideCapital-update', ['id' => $formUpdate->id ]) }}">
     <!-- token de autentificacion de envio -->
     @method('PATCH')
     
     @csrf
     
     @if (session('success'))
       <h6 class="alert alert-success">
         {{session('success')}}
       </h6>
     @endif
     
     @error('nombre')
       <h6 class="alert alert-danger">
         {{ $message }}
       </h6>
     @enderror
    
      <div class="mb-3">
        <label> Actualizacion de productos</label>
        <input type="text" name="nombre" class="form-control" value="{{ $formUpdate-> nombre}} ">
      </div>
      <button type="submit" class="btn btn-primary">actualizar</button>
    </form>
  </div>

@endsection