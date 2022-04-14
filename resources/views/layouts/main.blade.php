<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield('title')</title>

  <!-- Fonte do Google -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

  <!-- CSS Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- CSS da aplicação -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/css/style.css">
</head>

<body>
  <header>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="/">Project Roleplay</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/">Tela inicial</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="/dashboard">Minhas compras</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Conta
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                @guest
                <li><a class="dropdown-item" href="/login">Login</a></li>
                <li><a class="dropdown-item" href="/register">Registro</a></li>
                @endguest

                @auth
                <li>
                <form action="/logout" method="POST">
                  @csrf
                  <a href="/logout" 
                    class="dropdown-item" 
                    onclick="event.preventDefault();
                    this.closest('form').submit();">
                    Sair
                  </a>
                </form>
              </li>
                @endauth
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <main>
    <div class="container-fluid">
      <div class="row">
        @if(session('msg'))
        <p class="msg"> {{ session('msg') }}</p>
        @endif
        @yield('content')
      </div>
    </div>
  </main>
  <footer>
    <p>Project Roleplay 2021 - 2022</p>
  </footer>
</body>

</html>