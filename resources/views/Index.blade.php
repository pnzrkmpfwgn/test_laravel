@extends('layouts.app')


@section('content')


{{-- style="background:url({{asset('admin/img/k9.jpeg')}})" --}}



<div class="CoverImg">


  <div class="main2">
    <button id="navbar-button2"><a href="/show" class="text-dark">Click To Go Search<a></button>
    </div>

   <div class="boxy">
    <div class="littlebox">
     <div class="search-container">

      @if (request()->segment(1) == 'search')
				<h2>Properties in {{request()->address}}</h2>
			@else
			@endif

      <form action="{{ route('search') }}" method="get">
            
            
            <div class="select"  id="select-1">
              <label for="Home-icon"><i class="fa fa-map-marker" style="font-size:48px;color:rgb(9, 196, 108);"></i></label>
              <!-- Filter by address -->
            
              <input class="form-control" type="text" name="address" placeholder="Enter a location" value="{{request()->address}}">
            
            </div>

            <div class="select" id="select-2">
              <label for="Home-icon"><i class="fa fa-home" style="font-size:48px;color:rgb(9, 196, 108);"></i></label>
              <!-- Filter by category -->
                <select name="category" class="form-select @error('category') is-invalid @enderror">
                  <option value="" selected>{{request()->category ? App\Models\Category::find(request()->category)->name : 'All Home Types'}}</option>
                  @foreach (App\Models\Category::all() as $category)
                    <option value="{{$category->id}}">
                      {{$category->name}}
                    </option>
                  @endforeach
                </select>
            </div>


            <div class="select" id="select-3">
              
              <label for="Home-icon"><i class="fa-solid fa-bed" style="font-size:48px;color:rgb(9, 196, 108);"></i></label>
              <!-- Filter by bedrooms -->
              
                <select name="bedrooms" class="form-select @error('bedrooms') is-invalid @enderror">
                  <option value="" selected>{{request()->bedrooms ? request()->bedrooms . ' ' . 'All Bedrooms' : 'Bedrooms'}}</option>
                  <option value="2">
                    2
                  </option>
                  <option value="3">
                    3
                  </option>
                  <option value="4">
                    4
                  </option>
                  <option value="5">
                    5
                  </option>
                </select>
              
            </div>

            <div class="select" id="select-5">
              
              <label for="Home-icon"><i class="fa fa-money-bill-trend-up" style="font-size:48px;color:rgb(9, 196, 108);"></i></label>

              <input value="{{request()->max}}" type="text" name="max" class="form-control" placeholder="Max Price">
              
            </div>



            <div class="select" id="select-6">
              
              <label for="Home-icon"><i class="fa fa-down-long" style="font-size:48px;color:rgb(9, 196, 108);"></i></label>
              
              <input value="{{request()->min}}" type="text" name="min" class="form-control" placeholder="Min Price">
            
            </div>

            <button type="submit" id="subbutton">Search<label for="Home-icon" id="search-icon"><i class="fa fa-search" style="font-size:18px;color:rgb(75, 73, 73);"></i></label> </button>
            {{-- <button type="submit" id="subbutton3"><a href="{{request()->url()}}"></a>Reset Search</button> --}}

               
          </form>
      </div>     
     </div>
   </div>
  </div>








  <!-- 
- #SERVICE
-->

<section class="service" id="service">
<div class="container">

  <p class="section-subtitle">Services</p>

  <h2 class="h2 section-title">You can search by</h2>

  <ul class="service-list">

    <li>
      <div class="service-card">

        <div class="card-icon">
          <img src="img/Iconss1-removebg-preview.png" alt="Service icon">
        </div>

        <h3 class="h3 card-title">
          <p href="#">Search By Location</p>
        </h3>

        <p class="card-text">
          You can search homes for sale available on the website by its location, we can match you with a house you will want
          to call home.
        </p>

        <a href="#" class="card-link">
          <span>Search by Location<a href="{{request()->url()}}"></a></span>
          <ion-icon name="arrow-forward-outline"></ion-icon>
        </a>

      </div>
    </li>

    <li>
      <div class="service-card">

        <div class="card-icon">
          <img src="img/icon2-removebg-preview.png" alt="Service icon" id="icon2">
        </div>

        <h3 class="h3 card-title">
          <p href="#">Search By Price</p>
        </h3>

        <p class="card-text">
          You can search homes for sale available on the website by its price, we can match you with a house you will want
          to call home.
        </p>

        <a href="#" class="card-link">
          <span>Search by Price<a href="{{request()->url()}}"></a></span>

          <ion-icon name="arrow-forward-outline"></ion-icon>
        </a>

      </div>
    </li>

    <li>
      <div class="service-card">

        <div class="card-icon">
          <img src="img/icon3-removebg-preview.png" alt="Service icon">
        </div>

        <h3 class="h3 card-title">
          <p href="#">Search By House Type</p>
        </h3>

        <p class="card-text">
          You can search homes for sale available on the website by its type, we can match you with a house you will want
          to call home.
        </p>

        <a href="#" class="card-link">
          <span>Search by Type<a href="{{request()->url()}}"></a></span>

          <ion-icon name="arrow-forward-outline"></ion-icon>
        </a>

      </div>
    </li>

  </ul>

</div>
</section>








<!-- ======= Agents Section ======= -->
<section class="section-agents section-t8" style="background-color:rgb(34, 33, 33);">
<div class="container">
<div class="row">
  <div class="col-md-12">
    <div class="title-wrap d-flex justify-content-between">
      <div class="title-box">
        <h2 class="title-a">Best of Our Agents</h2>
      </div>
      <div class="title-link">
        {{-- <a href="#">All Agents --}}
        </a>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4">
    <div class="card-box-d">
      <div class="card-img-d">
        <img src="img/bargın.PNG" alt="" class="img-d img-fluid">
      </div>
      <div class="card-overlay card-overlay-hover">
        <div class="card-header-d">
          <div class="card-title-d align-self-center">
            <h3 class="title-d">
              <a href="agent-single.html" class="link-two">Barkın Dövinç</a>
              <br>
            </h3>
          </div>
        </div>
        <div class="card-body-d">
          <p class="content-d color-text-a">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at erat eget nisi molestie gravida. Donec dignissim sed augue eu sollicitudin. Duis sit amet sapien convallis, imperdiet mauris at, feugiat ante. Cras eleifend imperdiet ante.
          </p>
          <div class="info-agents color-a">
            <p>
              <strong>Phone: </strong> +66 996 669931
            </p>
            <p>
              <strong>Email: </strong> barkın@dövinç.com
            </p>
          </div>
        </div>
        <div class="card-footer-d">
          <div class="socials-footer d-flex justify-content-center">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#" class="link-one">
                  <i class="bi bi-facebook" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#" class="link-one">
                  <i class="bi bi-twitter" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#" class="link-one">
                  <i class="bi bi-instagram" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#" class="link-one">
                  <i class="bi bi-linkedin" aria-hidden="true"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card-box-d">
      <div class="card-img-d">
        <img src="img/berdu2.PNG" alt="" class="img-d img-fluid">
      </div>
      <div class="card-overlay card-overlay-hover">
        <div class="card-header-d">
          <div class="card-title-d align-self-center">
            <h3 class="title-d">
              <a href="agent-single.html" class="link-two">Bertu Aylıer</a>
              <br>
            </h3>
          </div>
        </div>
        <div class="card-body-d">
          <p class="content-d color-text-a">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at erat eget nisi molestie gravida. Donec dignissim sed augue eu sollicitudin. Duis sit amet sapien convallis, imperdiet mauris at, feugiat ante. Cras eleifend imperdiet ante.
          </p>
          <div class="info-agents color-a">
            <p>
              <strong>Phone: </strong> +13 9613 991396
            </p>
            <p>
              <strong>Email: </strong> Bertu@Aylıer.com
            </p>
          </div>
        </div>
        <div class="card-footer-d">
          <div class="socials-footer d-flex justify-content-center">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#" class="link-one">
                  <i class="bi bi-facebook" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#" class="link-one">
                  <i class="bi bi-twitter" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#" class="link-one">
                  <i class="bi bi-instagram" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#" class="link-one">
                  <i class="bi bi-linkedin" aria-hidden="true"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card-box-d">
      <div class="card-img-d">
        <img src="img/deyuuuumm.PNG" alt="" class="img-d img-fluid">
      </div>
      <div class="card-overlay card-overlay-hover">
        <div class="card-header-d">
          <div class="card-title-d align-self-center">
            <h3 class="title-d">
              <a href="agent-single.html" class="link-two">Baronu Topiçınaru</a>
              <br>
            </h3>
          </div>
        </div>
        <div class="card-body-d">
          <p class="content-d color-text-a">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at erat eget nisi molestie gravida. Donec dignissim sed augue eu sollicitudin. Duis sit amet sapien convallis, imperdiet mauris at, feugiat ante. Cras eleifend imperdiet ante.
          </p>
          <div class="info-agents color-a">
            <p>
              <strong>Phone: </strong> +31 6931 993169
            </p>
            <p>
              <strong>Email: </strong> Baranu@Topçinaru.com
            </p>
          </div>
        </div>
        <div class="card-footer-d">
          <div class="socials-footer d-flex justify-content-center">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#" class="link-one">
                  <i class="bi bi-facebook" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#" class="link-one">
                  <i class="bi bi-twitter" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#" class="link-one">
                  <i class="bi bi-instagram" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#" class="link-one">
                  <i class="bi bi-linkedin" aria-hidden="true"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</section><!-- End Agents Section -->



<br>
<br>





<!-- 
- #PROPERTY
-->

<section class="property" id="property">
<div class="container">

  <p class="section-subtitle">Properties</p>

  <h2 class="h2 section-title">Featured Listings</h2>

  <ul class="property-list has-scrollbar">

    <!-- ilk property -->

    <li>
      <div class="property-card">

        <figure class="card-banner">

          <a href="#">
            <img src="img/k3.jpeg" alt="New Apartment Nice View" class="w-100">
          </a>

          <div class="card-badge green">For Rent</div>

          <div class="banner-actions">

            <button class="banner-actions-btn">
              
              <address><i class="fa-solid fa-location-dot"></i>Belmont Gardens, Chicago</address>
            </button>

            <button class="banner-actions-btn">
              <i class="fa-solid fa-camera"></i>

              <span>4</span>
            </button>

            <button class="banner-actions-btn">
              <i class="fa-solid fa-film"></i>

              <span>2</span>
            </button>

          </div>

        </figure>

        <div class="card-content">

          <div class="card-price">
            <strong>$34,900</strong>/Month
          </div>

          <h3 class="h3 card-title">
            <a href="#">New Apartment Nice View</a>
          </h3>

          <p class="card-text">
            Beautiful Huge 1 Family House In Heart Of Westbury. Newly Renovated With New Wood
          </p>

          <ul class="card-list">

            <li class="card-item">
              <strong>3</strong>

              <i class="fa-solid fa-bed"></i>

              <span>Bedrooms</span>
            </li>

            <li class="card-item">
              <strong>2</strong>

              <i class="fa-solid fa-person"></i>

              <span>Bathrooms</span>
            </li>

            <li class="card-item">
              <strong>3450</strong>

              <i class="fa-regular fa-square"></i>

              <span>Square Ft</span>
            </li>

          </ul>

        </div>

        <div class="card-footer">

          <div class="card-author">

            <figure class="author-avatar">
              <img src="img/deyuuuumm.PNG" alt="no-baran" class="w-100">
            </figure>

            <div>
              <p class="author-name">
                <a href="#">Baronu Topiçınaru</a>
              </p>

              <p class="author-title">Estate Agents</p>
            </div>

          </div>

          <div class="card-footer-actions">

            <button class="card-footer-actions-btn">
              <i class="fa-solid fa-up-right-and-down-left-from-center"></i>
            </button>

            <button class="card-footer-actions-btn">
              <i class="fa-solid fa-heart"></i>
            </button>

            <button class="card-footer-actions-btn">
              <i class="fa-solid fa-circle-plus"></i>
            </button>

          </div>

        </div>

      </div>
    </li>
     
    <!-- yeni property-1 -->

    <li>
      <div class="property-card">

        <figure class="card-banner">

          <a href="#">
            <img src="img/k12.jpeg" alt="Modern Apartments" class="w-100">
          </a>

          <div class="card-badge red">For Sales</div>

          <div class="banner-actions">

            <button class="banner-actions-btn">
              

              <address><i class="fa-solid fa-location-dot"></i>Belmont Gardens, Chicago</address>
            </button>

            <button class="banner-actions-btn">
              <i class="fa-solid fa-camera"></i>

              <span>4</span>
            </button>

            <button class="banner-actions-btn">
              <i class="fa-solid fa-film"></i>

              <span>2</span>
            </button>

          </div>

        </figure>

        <div class="card-content">

          <div class="card-price">
            <strong>$34,900</strong>/Month
          </div>

          <h3 class="h3 card-title">
            <a href="#">Modern Apartments</a>
          </h3>

          <p class="card-text">
            Beautiful Huge 1 Family House In Heart Of Westbury. Newly Renovated With New Wood
          </p>

          <ul class="card-list">

            <li class="card-item">
              <strong>3</strong>

              <i class="fa-solid fa-bed"></i>

              <span>Bedrooms</span>
            </li>

            <li class="card-item">
              <strong>2</strong>

              <i class="fa-solid fa-person"></i>

              <span>Bathrooms</span>
            </li>

            <li class="card-item">
              <strong>3450</strong>

              <i class="fa-regular fa-square"></i>

              <span>Square Ft</span>
            </li>

          </ul>

        </div>

        <div class="card-footer">

          <div class="card-author">

            <figure class="author-avatar">
              <img src="img/deyuuuumm.PNG" alt="no-baran" class="w-100">
            </figure>

            <div>
              <p class="author-name">
                <a href="#">Baronu Topiçınaru</a>
              </p>

              <p class="author-title">Estate Agents</p>
            </div>

          </div>

          <div class="card-footer-actions">

            <button class="card-footer-actions-btn">
              <i class="fa-solid fa-up-right-and-down-left-from-center"></i>
            </button>

            <button class="card-footer-actions-btn">
              <i class="fa-solid fa-heart"></i>
            </button>

            <button class="card-footer-actions-btn">
              <i class="fa-solid fa-circle-plus"></i>
            </button>

          </div>

        </div>

      </div>
    </li>

    <!-- yeni property-2 -->

    <li>
      <div class="property-card">

        <figure class="card-banner">

          <a href="#">
            <img src="img/k15.jpeg" alt="Comfortable Apartment" class="w-100">
          </a>

          <div class="card-badge green">For Rent</div>

          <div class="banner-actions">

            <button class="banner-actions-btn">
             
              <address><i class="fa-solid fa-location-dot"></i>Belmont Gardens, Chicago</address>
            </button>

            <button class="banner-actions-btn">
              <i class="fa-solid fa-camera"></i>

              <span>4</span>
            </button>

            <button class="banner-actions-btn">
              <i class="fa-solid fa-film"></i>

              <span>2</span>
            </button>

          </div>

        </figure>

        <div class="card-content">

          <div class="card-price">
            <strong>$34,900</strong>/Month
          </div>

          <h3 class="h3 card-title">
            <a href="#">Best Residences</a>
          </h3>

          <p class="card-text">
            Beautiful Huge 1 Family House In Heart Of Westbury. Newly Renovated With New Wood
          </p>

          <ul class="card-list">

            <li class="card-item">
              <strong>3</strong>

              <i class="fa-solid fa-bed"></i>

              <span>Bedrooms</span>
            </li>

            <li class="card-item">
              <strong>2</strong>

              <i class="fa-solid fa-person"></i>

              <span>Bathrooms</span>
            </li>

            <li class="card-item">
              <strong>3450</strong>

              <i class="fa-regular fa-square"></i>

              <span>Square Ft</span>
            </li>

          </ul>

        </div>

        <div class="card-footer">

          <div class="card-author">

            <figure class="author-avatar">
              <img src="img/berdu2.PNG" alt="no-berdu" class="w-100">
            </figure>

            <div>
              <p class="author-name">
                <a href="#">Bertu Aylıer</a>
              </p>

              <p class="author-title">Estate Agents</p>
            </div>

          </div>

          <div class="card-footer-actions">

            <button class="card-footer-actions-btn">
              <i class="fa-solid fa-up-right-and-down-left-from-center"></i>
            </button>

            <button class="card-footer-actions-btn">
              <i class="fa-solid fa-heart"></i>
            </button>

            <button class="card-footer-actions-btn">
              <i class="fa-solid fa-circle-plus"></i>
            </button>

          </div>

        </div>

      </div>
    </li>

    <!-- yeni property-3 -->

    <li>
      <div class="property-card">

        <figure class="card-banner">

          <a href="#">
            <img src="img/k10.jpeg" alt="Luxury villa in Rego Park" class="w-100">
          </a>

          <div class="card-badge green">For Rent</div>

          <div class="banner-actions">

            <button class="banner-actions-btn">
              

              <address><i class="fa-solid fa-location-dot"></i>Belmont Gardens, Chicago</address>
            </button>

            <button class="banner-actions-btn">
              <i class="fa-solid fa-camera"></i>

              <span>4</span>
            </button>

            <button class="banner-actions-btn">
              <i class="fa-solid fa-film"></i>

              <span>2</span>
            </button>

          </div>

        </figure>

        <div class="card-content">

          <div class="card-price">
            <strong>$34,900</strong>/Month
          </div>

          <h3 class="h3 card-title">
            <a href="#">Luxury villa in Rego Park</a>
          </h3>

          <p class="card-text">
            Beautiful Huge 1 Family House In Heart Of Westbury. Newly Renovated With New Wood
          </p>

          <ul class="card-list">

            <li class="card-item">
              <strong>3</strong>

              <i class="fa-solid fa-bed"></i>

              <span>Bedrooms</span>
            </li>

            <li class="card-item">
              <strong>2</strong>

              <i class="fa-solid fa-person"></i>

              <span>Bathrooms</span>
            </li>

            <li class="card-item">
              <strong>3450</strong>

              <i class="fa-regular fa-square"></i>

              <span>Square Ft</span>
            </li>

          </ul>

        </div>

        <div class="card-footer">

          <div class="card-author">

            <figure class="author-avatar">
              <img src="img/bargın.PNG" alt="no-bargın" class="w-100">
            </figure>

            <div>
              <p class="author-name">
                <a href="#">Barkın Dövinç</a>
              </p>

              <p class="author-title">Estate Agents</p>
            </div>

          </div>

          <div class="card-footer-actions">

            <button class="card-footer-actions-btn">
              <i class="fa-solid fa-up-right-and-down-left-from-center"></i>
            </button>

            <button class="card-footer-actions-btn">
              <i class="fa-solid fa-heart"></i>
            </button>

            <button class="card-footer-actions-btn">
              <i class="fa-solid fa-circle-plus"></i>
            </button>

          </div>

        </div>

      </div>
    </li>

  </ul>

</div>
</section>






   <!-- 
- #FOOTER
-->

<footer class="footer">

<div class="footer-top">
<div class="container">

<div class="footer-brand">

  <a href="#" class="logo">
    <img src="img/ShortcutIcon.png" alt="logo">
  </a>
  
</div>

<div class="footer-link-box">

  <ul class="footer-list">

    <li>
      <p class="footer-list-title">Company</p>
    </li>

    <li>
      <a href="#" class="footer-link">About</a>
    </li>

    <li>
      <a href="#" class="footer-link">Blog</a>
    </li>

    <li>
      <a href="#" class="footer-link">All Products</a>
    </li>

    <li>
      <a href="#" class="footer-link">Locations Map</a>
    </li>

    <li>
      <a href="#" class="footer-link">FAQ</a>
    </li>

    <li>
      <a href="#" class="footer-link">Contact us</a>
    </li>

  </ul>

  <ul class="footer-list">

    <li>
      <p class="footer-list-title">Services</p>
    </li>

    <li>
      <a href="#" class="footer-link">Order tracking</a>
    </li>

    <li>
      <a href="#" class="footer-link">Wish List</a>
    </li>

    <li>
      <a href="#" class="footer-link">Login</a>
    </li>

    <li>
      <a href="#" class="footer-link">My account</a>
    </li>

    <li>
      <a href="#" class="footer-link">Terms & Conditions</a>
    </li>

    <li>
      <a href="#" class="footer-link">Promotional Offers</a>
    </li>

  </ul>

  <ul class="footer-list" id="customer-op">

    <li>
      <p class="footer-list-title">Customer Options</p>
    </li>

    <li>
      <a href="#" class="footer-link">Login</a>
    </li>

    <li>
      <a href="#" class="footer-link">My account</a>
    </li>

    <li>
      <a href="#" class="footer-link">Wish List</a>
    </li>

    <li>
      <a href="#" class="footer-link">Order tracking</a>
    </li>

    <li>
      <a href="#" class="footer-link">FAQ</a>
    </li>

    <li>
      <a href="#" class="footer-link">Contact us</a>
    </li>

  </ul>

</div>

</div>
</div>

<div class="footer-bottom">
<div class="container">

<p class="copyright">
  &copy; 2022 <a href="#">NCRealEstate</a>. All Rights Reserved <a href="mailto:contact@NCRealEstate.com" class="contact-link">(contact@NCRealEstate)</a>
</p>

</div>
</div>

</footer>


@endsection

@push('css')
<!-- Outsite CSS Files -->
<link rel="stylesheet" href="{{asset('css/bunchofthings/OutSideCssFiles/animate.css/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('css/bunchofthings/OutSideCssFiles/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('css/bunchofthings/OutSideCssFiles/bootstrap-icons/bootstrap-icons.css')}}">
<link rel="stylesheet" href="{{asset('css/bunchofthings/OutSideCssFiles/swiper/swiper-bundle.min.css')}}">


<link rel="stylesheet" href="{{asset('css/Index.css')}}">

@endpush

@push('scripts')
<script src="{{ asset('js/Index.js') }}"></script>
@endpush