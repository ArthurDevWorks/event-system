<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  @vite(['resources/sass/app.scss', 'resources/js/app.js'])

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

  <title>ArthurDevWorks</title>
</head>
<body>

 <header class="p-3 text-bg-dark">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="{{ route('user.index') }}" class="nav-link px-2 text-white">Inico</a></li>
          <li><a href="{{ route('user.index') }}" class="nav-link px-2 text-white">Usuarios</a></li>
        </ul>

        <div class="text-end">
          <a href="{{ route('login.destroy') }}" class="btn btn-outline-light me-2">Sair</a> 
        </div>
      </div>
  </header>
  
  <div class="container">
    @yield('content')
  </div>
  <footer>
    <p>ArthurDevWorks &copy; 2025</p>
  </footer>
</body>
</html>