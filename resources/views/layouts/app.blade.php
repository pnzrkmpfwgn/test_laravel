<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" type="image/x-icon" href="admin/img/logo/ShortcutIcon.png">

  <script src="https://kit.fontawesome.com/9410b08b7b.js" crossorigin="anonymous"></script>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>NCRealEstate</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/9410b08b7b.js" crossorigin="anonymous"></script>

    @stack('css')

</head>

<body>
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light shadow-sm ">
      <div class="container">
        <a class="navbar-brand text-white" href="{{ url('/') }}">
          NCRealEstate
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav me-auto">

          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a href="/Seller2" class="nav-link text-white">Sell Properties</a>
            </li>

            <li class="nav-item">
              <a href="/chatify" class="nav-link text-white">User Chat</a>
            </li>

            <li class="nav-item">
              <a href="/show" class="nav-link text-white">Search</a>
            </li>
            <!-- Authentication Links -->
            @guest
              @if (Route::has('login'))
                <li class="nav-item">
                  <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
              @endif

              @if (Route::has('register'))
                <li class="nav-item">
                  <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
              @endif
            @else
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('home') }}">
                    Dashboard
                  </a>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </div>
              </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>


    {{-- style="background-color:rgb(34, 33, 33);" --}}

    <main class="">
      @yield('content')
    </main>
  </div>

   {{-- Botuman --}}

  
  <script>
      var botmanWidget = {
          title:'NCEstate-ChatBot',
          mainColor:'#363A35',
          headerTextColor:'#5CF41E',
          bubbleBackground:'#363A35',
          bubbleAvatarUrl:'img/NCEstate-ChatBot-modified.png',
          aboutText: '',
          placeholderText:'chat with bot, dont be shy',
          introMessage: "✋ Hi! I am NCEstate Chatbot , if you want to start conversation say 'Hi' or something else.",
          
          
          
      };
  </script>
 
  <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
  

</body>

{{-- <footer class="bg-dark" style="height: 345px">
    deneme ve bir yukardaki mainde py-5 vardı
</footer> --}}

</html>
