@extends('Prueba')
@section('ContentPlantillas')
  <h1 class="ml-10">Gestion de categorias</h1>
    <div class="container w-25 border p-4 mt-3">
    <form method="post" action="{{ route('categories.update', ['category' => $mostrarCatalogo->id]) }}">
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
        <label> Actualizacion de categorias</label>
        <input type="text" name="nombreCategoria" class="form-control" value="{{ $mostrarCatalogo-> nombreCategoria}} ">
        <input type="color" name="color" class="form-control" value="{{ $mostrarCatalogo-> color}} ">
      </div>
      <button type="submit" class="btn btn-primary">crear nueva categoria</button>
    </form>
  </div>
  
    @if($mostrarCatalogo->productos->count() > 0)
      @foreach ($mostrarCatalogo->productos as $productos)
      <div class="row py-1" >
        <div class="col-md-9 d-flex align-items-center">
          <a class=" " href="{{ route ('RideCapital-edit', ['id' => $productos-> id ]) }}">
            {{ $productos->nombre }}
          </a>
          <div class="col-md-3 d-flex justify-content-end ">
            <form class=" " action="{{ route('RideCapital-destroy', [ $productos-> id]) }}" method="POST">
              @method('DELETE')
              @csrf
              <button class="btn btn-danger btn-sm" type="submit">Eliminar </button>
                
            </form>
          </div>
        </div>
      </div>
      @endforeach
      @else
       no hay ningun productos en la categoria
      @endif
 
@endsection