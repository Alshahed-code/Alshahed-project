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
  <section class="home has-bg-image" id="home" style="background-image: url(images/Vector\ Smart\ Object\ 2.png);">
    <div class="bee bee1"></div>
    <div class="bee bee2"></div>
    <div class="bee-right bee3"></div>
    <div class="home-text revial-lift">
      <h1>Meet <span>Eat &</span><br>Enjoy The true <br> taste</h1>
      <a href="#" class="btn">Explore Menu<i class='bx bxs-right-arrow'></i></a>
      <a href="#" class="btn2">Order Now</a>
    </div>

    <div class="home-img revial-right" style="padding-top: 110px">
      <img src="images/hero.png"  loading="lazy">
    </div>
    <div class="scroll-down revial-top"></div>
  </section>

  <!--container-->
  <section class="container">

    <div class="container-box revial-lift">
      <img src="images/c1.png" loading="lazy">
      <h3>11:oo -8:30 pm</h3>
      <a href="#">Working Hours</a>
    </div>

    <div class="container-box">
      <img src="images/c2.png" loading="lazy">
      <h3>Honey Springs 555</h3>
      <a href="#">Get Directions</a>
    </div>

    <div class="container-box revial-right">
      <img src="images/c3.png" loading="lazy">
      <h3>(555) 111-345345</h3>
      <a href="#">call Us Now</a>
    </div>
  </section>

  <!--about us-->
  <div class="testimonials paralax-mf bg-image" style="background-image: url(images/pexels-three-shots-21264-714522.jpg)">
  <div class="overlay-mf"></div>
  <section class="about" id="about" style="margin-left: -150px;">


      <div class="about-text revial-right">
        <div class="heading">
        <img class="revial-lift" src="images/bee1.png" width="70" loading="lazy">
        <h2>About US</h2>
        </div>
        <p>Our honey water journey began when beverage industry specialist Michele Meloy Burchfield was introduced to the
          idea of honey water by a coach. He was mixing honey with water for his athletes, harkening back to the original
          Olympians who used the combination for natural hydration and spikeless energy. Michele, already a believer in
          all things honey, was intrigued with the concept and instinctively knew there was a way to make honey water much
          more playful on the palate.
        </p>
        <a href="#" class="btn">Explore Menu<i class='bx bxs-right-arrow'></i></a>
      </div>
</section>
</div>  

  <!--Our shop-->
  <section class="shop" id="shop"">
    <div class="middle-text revial-top">
      <img class="revial-lift" src="images/bee1-L.png" width="70" alt="" loading="lazy">
      <h4>Our shop</h4>
      <h2>Lets Check Popular Products</h2>
    </div>
    <div class="shop-content">
      @foreach ($product as $products)
        
      <div class="row revial-lift">
        <a href="{{url('product_details', $products->id)}}">
          <img src="products/{{$products->image}}" loading="lazy">
        </a>
        
        <h3>{{$products->title}}</h3>
        <p> {!!Str::limit($products->description,50)!!}</p>
        <div class="in-text">
          <div class="price">
            <h6>${{$products->price}}</h6>
          </div>
          <div class="s-btnn">
            <a href="{{url('add_cart', $products->id)}}">Add to Cart</a>
          </div>
        </div>
        <div class="top-icon">
          <a href="#"><i class='bx bxs-heart'></i></a>
        </div>
      </div>

      @endforeach


  </section>
  <div class="text-center">
    <a href="#" class="btn">All Products<i class='bx bxs-right-arrow'></i></a>
  </div>
  <!---reviews-->
  <section class="review mySwiper" id="review">
    <div class="middle-text revial-top">
      <h4>Our Customer</h4>
      <h2>Clients Review About Our Food</h2>
    </div>
    <div class="swiper-wrapper revial-bottom">
      <article class="box swiper-slide">
        <p>Never have tried Blueberry before it's very good !The Taste is still in my mouth and ican feel the depth of
          the taste of the every ingr adients used in the food. I really Love Fafo</p>
        <div class="in-box">
          <div class="bx-img">
            <img src="images/r1.jpg" loading="lazy">
          </div>
          <div class="bxx-text">
            <h4>Karahan Jotti</h4>
            <h5>Honey Customer</h5>
          </div>
          <div class="ratings">
            <a href="#"><i class='bx bxs-star'></i></a>
            <a href="#"><i class='bx bxs-star'></i></a>
            <a href="#"><i class='bx bxs-star'></i></a>
            <a href="#"><i class='bx bxs-star'></i></a>
            <a href="#"><i class='bx bxs-star'></i></a>
          </div>

        </div>
      </article>

      <article class="box swiper-slide">
        <p>Never have tried Blueberry before it's very good !The Taste is still in my mouth and ican feel the depth of
          the taste of the every ingr adients used in the food. I really Love Fafo</p>
        <div class="in-box">
          <div class="bx-img">
            <img src="images/r1.jpg" loading="lazy">
          </div>
          <div class="bxx-text">
            <h4>Karahan Jotti</h4>
            <h5>Honey Customer</h5>
          </div>
          <div class="ratings">
            <a href="#"><i class='bx bxs-star'></i></a>
            <a href="#"><i class='bx bxs-star'></i></a>
            <a href="#"><i class='bx bxs-star'></i></a>
            <a href="#"><i class='bx bxs-star'></i></a>
            <a href="#"><i class='bx bxs-star'></i></a>
          </div>

        </div>
      </article>

      <article class="box swiper-slide">
        <p>Never have tried Blueberry before it's very good !The Taste is still in my mouth and ican feel the depth of
          the taste of the every ingr adients used in the food. I really Love Fafo</p>
        <div class="in-box">
          <div class="bx-img">
            <img src="images/r1.jpg" loading="lazy">
          </div>
          <div class="bxx-text">
            <h4>Karahan Jotti</h4>
            <h5>Honey Customer</h5>
          </div>
          <div class="ratings">
            <a href="#"><i class='bx bxs-star'></i></a>
            <a href="#"><i class='bx bxs-star'></i></a>
            <a href="#"><i class='bx bxs-star'></i></a>
            <a href="#"><i class='bx bxs-star'></i></a>
            <a href="#"><i class='bx bxs-star'></i></a>
          </div>

        </div>
      </article>

      <article class="box swiper-slide">
        <p>Never have tried Blueberry before it's very good !The Taste is still in my mouth and ican feel the depth of
          the taste of the every ingr adients used in the food. I really Love Fafo</p>
        <div class="in-box">
          <div class="bx-img">
            <img src="images/r1.jpg" loading="lazy">
          </div>
          <div class="bxx-text">
            <h4>Karahan Jotti</h4>
            <h5>Honey Customer</h5>
          </div>
          <div class="ratings">
            <a href="#"><i class='bx bxs-star'></i></a>
            <a href="#"><i class='bx bxs-star'></i></a>
            <a href="#"><i class='bx bxs-star'></i></a>
            <a href="#"><i class='bx bxs-star'></i></a>
            <a href="#"><i class='bx bxs-star'></i></a>
          </div>

        </div>
      </article>

      <article class="box swiper-slide">
        <p>Never have tried Blueberry before it's very good !The Taste is still in my mouth and ican feel the depth of
          the taste of the every ingr adients used in the food. I really Love Fafo</p>
        <div class="in-box">
          <div class="bx-img">
            <img src="images/r1.jpg" loading="lazy">
          </div>
          <div class="bxx-text">
            <h4>Karahan Jotti</h4>
            <h5>Honey Customer</h5>
          </div>
          <div class="ratings">
            <a href="#"><i class='bx bxs-star'></i></a>
            <a href="#"><i class='bx bxs-star'></i></a>
            <a href="#"><i class='bx bxs-star'></i></a>
            <a href="#"><i class='bx bxs-star'></i></a>
            <a href="#"><i class='bx bxs-star'></i></a>
          </div>

        </div>
      </article>

    </div>
  </section>

<!--contact-->
  <section class="contact" id="contact">
      <div class="contact-text">
        <h2 class="revial-top">Contact Us</h2>
       
        <div class="social">
          <a href="#" class="clr"><i class='bx bxl-instagram-alt revial-lift'></i></a>
          <a href="#"><i class='bx bxl-facebook revial-top'></i></a>
          <a href="#"><i class='bx bxl-twitter revial-bottom'></i></a>
          <a href="#"><i class='bx bxl-github revial-top'></i></a>
          <a href="#"><i class='bx bxl-whatsapp revial-bottom'></i></a>
          <a href="#"><i class='bx bxl-google revial-right'></i></a>

        </div>
      </div>



      <div class="details">
        <div class="main-d revial-lift">
          <a href="#"><i class='bx bxs-location-plus'></i>Main street 174, kijfa Road</a>
        </div>

        <div class="main-d">
          <a href="#"><i class='bx bx-mobile-alt'></i></i>+256707396740</a>
        </div>


        <div class="main-d revial-right">
          <a href="#"><i class='bx bxs-bell'></i></i>Subscribe</a>
        </div>
      </div>

      <form action="" class="newsletter-form text-center">

          <a href="#" class="btn">SEND YOUR MASSAGE</a>


        <input type="text" name="text-serch-cirtef" placeholder="input your massage" required class="input-field">
      </form>

  </section>

      <!--("Last Page")
    ###*************
    --- Footer
    *************###
    ---------------->
    <footer class="footer">
      
      <!-- Main Notofiction Out Of The Page -->
      <div class="footer-bottom">
          <div class="container">
              <p class="copyright">
                  Copyright by <span>H&G</span> With <span>LOVE</span>. All rights reserved.
              </p>
          </div>
      </div>

      
  </footer>
    <!--link to js-->
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