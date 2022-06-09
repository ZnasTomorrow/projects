@extends('Prueba')
@section('ContentPlantillas')
  <h1 class="ml-10">Gestion de Productos</h1>
  <div class="container w-25 border p-4 mt-3">
    <form method="post" action="{{ route('RideCapital') }}">
     <!-- token de autentificacion de envio -->
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
        <label> ingresar productos</label>
        <input type="text" name="nombre" class="form-control">
        <label for="categoria_id" class="form-label"> ingresar categoría</label>
        <select name="categoria_id" class="form-select">
            <option id="0">seleccione categoria </option>
          @foreach ($categories as $uno)
            <option value="{{$uno-> id}}">{{$uno-> nombreCategoria}} </option>
          @endforeach
        </select>
      </div>
      <button type="submit" class="btn btn-primary">ok </button>
    </form>
  </div>
  <div>
    @foreach ($posts as $uno)
      <!-- html... -->
      <div class="row container w-25 align-items-center border p-2 mt-3">
        <div class="col-md-9 d-flex align-items-center">
            <a href="{{ route('RideCapital-edit', ['id' => $uno-> id]) }}"> 
            {{ $uno-> nombre }}
            </a>
          </div>
          <div class="col-md-3 d-flex justify-content-end">
            <form action="{{ route('RideCapital-destroy', [$uno-> id]) }}" method="POST">
              @method('DELETE')
              @csrf
              <button class="btn btn-danger btn-sm">Eliminar </button>
            </form>
        </div>
      </div>
        
     @endforeach
  </div>
@endsection