<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Honey Website Design</title>
  <link rel="stylesheet" href="style.css">

  <!--box icons-->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

  <!--google fonts-->
  <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <script src="https://unpkg.com/scrollreveal"></script>
  <style>

  </style>
</head>

<body>
    <br>
    <br>
 <!-- ////////////////
     ***** Navigtion Bar*
    /////////////////////-->
    <header class="header" data-header>
      <div class="container">
  
        <a href="#" class="logo logo-container">
          <img src="images/logo alshahed.png" width="66px" height="88px" alt="logo">
          <span><span class="al-sh">Al</span>shahed</span>
        </a>
        <nav class="navbar" data-navbar>
          <div class="wrapper">
            <a href="#" class="logo logo-container">
              <img src="images/logo alshahed.png" width="66px" height="88px" alt="logo">
              <span><span class="al-sh">Al</span>shahed</span>
            </a>
  
            <button class="nav-close-btn" aria-label="close menu" data-nav-toggler>
              {{-- <i class="bx bx-close" aria-hidden="true"></i> --}}
              +
            </button>
          </div>
  
          <ul class="navbar-list">

            <li class="navbar-item">
              <a href="#home" class="navbar-link id-activ" data-nav-link>Home</a>
            </li>
  
            <li class="navbar-item">
              <a href="#about" class="navbar-link" data-nav-link>About</a>
            </li>
  
            <li class="navbar-item">
              <a href="{{url('our_shop')}}" class="navbar-link" data-nav-link>Our shop</a>
            </li>

            <li class="navbar-item">
              <a href="#contact" class="navbar-link" data-nav-link>Contact Us</a>
            </li>



            @if (Route::has('login'))
            @auth
            <div class="nav-icons">
              <a href="{{url('mycart')}}"><i class='bx bx-cart'>[{{$count}}]</i></a>
              <div class="bx bx-menu" id="menu-icon"></div>
            </div>

              <div class="nav-icons flex items-center gap-4">
                <div class="relative">
                  <a href="#" class="user-icon text-sm"><i class='bx bx-user'></i> Login</a>
                  <div class="absolute right-0 mt-2 w-40 bg-[#FFB800] rounded-md shadow-lg py-1 hidden z-50" id="userDropdown" style="display: none;">
                    <form style="padding: 10px" method="POST" action="{{route('logout')}}">
                      @csrf
                      <a class="block px-3 py-1.5 text-sm text-white hover:bg-[#111111]">
                        <input type="submit" value="logout">
                      </a>
                    </form>
                  </div>
                </div>
                <span class="text-gray-400">/</span>
                /
                <div class="relative">
                  <a href="#" class="language-icon text-sm"><i class='bx bx-globe'></i> Languages</a>
                  <div class="absolute right-0 mt-2 w-40 bg-[#FFB800] rounded-md shadow-lg py-1 hidden z-50" id="languageDropdown" style="display: none;">
                    <a href="#" class="block px-3 py-1.5 text-sm text-white hover:bg-[#111111]">
                      <i class='bx bx-globe'></i> English
                    </a>
                    <a href="#" class="block px-3 py-1.5 text-sm text-white hover:bg-[#111111]">
                      <i class='bx bx-globe'></i> العربية
                    </a>
                  </div>
                </div>
              </div>
            @else  
              

            <div class="nav-icons">
              <a href="{{url('mycart')}}"><i class='bx bx-cart nav-cart'>[]</i></a>
              <div class="bx bx-menu" id="menu-icon"></div>
            </div>


            <div class="nav-icons flex items-center gap-4">
              <div class="relative">
                <a href="#" class="user-icon text-sm"><i class='bx bx-user'></i> Login</a>
                <div class="absolute right-0 mt-2 w-40 bg-[#FFB800] rounded-md shadow-lg py-1 hidden z-50" id="userDropdown" style="display: none;">
                  <a href="{{url('login')}}" class="block px-3 py-1.5 text-sm text-white hover:bg-[#111111]">login</a>
                  <a href="{{url('register')}}" class="block px-3 py-1.5 text-sm text-white hover:bg-[#111111]">register</a>
                </div>
              </div>
              <span class="text-gray-400">/</span>
              /
              <div class="relative">
                <a href="#" class="language-icon text-sm"><i class='bx bx-globe'></i> Languages</a>
                <div class="absolute right-0 mt-2 w-40 bg-[#FFB800] rounded-md shadow-lg py-1 hidden z-50" id="languageDropdown" style="display: none;">
                  <a href="#" class="block px-3 py-1.5 text-sm text-white hover:bg-[#111111]">
                    <i class='bx bx-globe'></i> English
                  </a>
                  <a href="#" class="block px-3 py-1.5 text-sm text-white hover:bg-[#111111]">
                    <i class='bx bx-globe'></i> العربية
                  </a>
                </div>
              </div>
            </div>
            @endauth
            @endif
       </ul>
        </nav>
                      

        <div class="header-actions">
          <button class="header-action-btn" aria-label="open menu" data-nav-toggler>
            {{-- <i class="bx bx-menu" id="menu-icon"></i> --}}
            =
          </button>
        </div>
        <div class="overlay" data-nav-toggler data-overlay></div>
  </div>
    </header>
  <!--home-->

  <div class="container">
    
  <x-guest-layout>
    <h1 style="font-size: 80px; color: #ff9f0d; padding: 50px;">Login <span></span> </h1>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
</div>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="script.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // User dropdown
    const userIcon = document.querySelector('.user-icon');
    const userDropdown = document.getElementById('userDropdown');
    
    if (userIcon && userDropdown) {
      userIcon.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        if (userDropdown.style.display === 'none') {
          userDropdown.style.display = 'block';
          languageDropdown.style.display = 'none';
        } else {
          userDropdown.style.display = 'none';
        }
      });
    }

    // Language dropdown
    const languageIcon = document.querySelector('.language-icon');
    const languageDropdown = document.getElementById('languageDropdown');
    
    if (languageIcon && languageDropdown) {
      languageIcon.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        if (languageDropdown.style.display === 'none') {
          languageDropdown.style.display = 'block';
          userDropdown.style.display = 'none';
        } else {
          languageDropdown.style.display = 'none';
        }
      });
    }

    // Close dropdowns when clicking outside
    document.addEventListener('click', function(e) {
      if (!userIcon.contains(e.target) && !userDropdown.contains(e.target)) {
        userDropdown.style.display = 'none';
      }
      if (!languageIcon.contains(e.target) && !languageDropdown.contains(e.target)) {
        languageDropdown.style.display = 'none';
      }
    });
  });
</script>
</body>
</html>
