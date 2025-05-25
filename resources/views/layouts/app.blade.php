<!doctype html>
<html lang="sr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title", "Ribolovački savez")</title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>


    <style>
      body {
        background-color: #f5f5f5;
        font-family: 'Segoe UI', sans-serif;
      }
      .navbar-brand img {
        height: 50px;
      }
      .hero-section {
        background: url('{{ asset('images/hero-fishing.jpg') }}') center center/cover no-repeat;
        color: white;
        padding: 100px 0;
        text-shadow: 1px 1px 5px #000;
      }
      footer {
        background-color: #003049;
        color: white;
        padding: 20px 0;
        text-align: center;
      }
    </style>
  </head>

  <body>

    
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
        <a class="navbar-brand" href="{{ route('public.home') }}">
          <img src="{{ asset('images/logo.jpg') }}" alt="Logo">
          
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link" href="{{ route('public.home') }}">Istaknuto</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('public.ponuda') }}">Ponuda</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('public.kontakt') }}">Kontakt</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('public.profile') }}">Profil</a></li>
            @if(Auth::check())
              <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">Logout</a></li>
            @else
              <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
            @endif
          </ul>
        </div>
      </div>
    </nav>
    
    <div class="container py-4">
      @yield("content")
    </div>

    <footer>
      <div class="container">
        <p>&copy; {{ date('Y') }} Dsavic6023it.</p>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
