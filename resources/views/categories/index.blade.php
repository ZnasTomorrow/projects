@extends('Prueba')
@section('ContentPlantillas')
  <div class="container w-25 border p-4 my-4">
    <div class="row mx-auto">
       <form method="post" action="{{ route('categories.store') }}">
     <!-- token de autentificacion de envio -->
     @csrf
     
     @if (session('success'))
       <h6 class="alert alert-success">
         {{session('success')}}
       </h6>
     @endif
     
     @error('nombreCategoria')
       <h6 class="alert alert-danger">
         {{ $message }}
       </h6>
     @enderror
    
      <div class="mb-3">
        <label> ingresar categoría</label>
        <input type="text" name="nombreCategoria" class="form-control">
      </div>
      
      <div class="mb-3">
        <label for="color"> ingresar color</label>
        <input type="color" name="color" class="form-control">
      </div>
      
      <button type="submit" class="btn btn-primary">aceptar </button>
    </form>
       <div >
      @foreach($todascategoria as $unaCategoria)
        <div class="row py-1">
          <div class="col-md-9 d-flex align-items-center ">
              <span class="color-container" style=" background-color: {{ $unaCategoria->color }}">[  ]</span>
            <a class="d-flex align-items-center gap-2" href="{{ route('categories.show', ['category' => $unaCategoria-> id ]) }}">
              {{ $unaCategoria-> nombreCategoria }}
            </a>
          </div>
          <div class="col-md-3 d-flex align-items-center justify-content-end">
              <button class= "btn btn-primary " data-bs-toggle="modal" data-bs-target="#modal_{{$unaCategoria->id}}">
                eliminar 
               
              </button>
            </div>
        </div>
        
              <!-- Modal -->
<div class="modal fade" id="modal_{{$unaCategoria->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  {{$unaCategoria->id}}
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Al eliminar la categoria se eliminaran todos los productos registrados en esta categoria
        deseas continuar?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form action=" {{route('categories.destroy', [$unaCategoria-> id ]) }}" method="POST">
          @method('DELETE')
          @csrf
        <button type="submit" class="btn btn-danger">Eliminar categoria</button>
        </form>
      </div>
    </div>
  </div>
</div>
          
      @endforeach
    </div>
 
    </div>
  </div>
@endsection
