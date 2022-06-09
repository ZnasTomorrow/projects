<!doctype html>
    <head>

        <!-- Styles -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css" />
    </head>
    <body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Lista de Productos</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('RideCapital')}}">productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('categories.index')}}">categorias</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="{{ route('categories.index') }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            mas
          </a>
          </ul>
    </div>
  </div>
</nav>
      @yield('ContentPlantillas');
        <!-- JavaScript -->
        <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
    </body>
</html>