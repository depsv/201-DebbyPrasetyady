<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LaundryGO</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>
</head>
<body>
    <section class="section-1">
        <nav class="navbar">
            <div class="container-fluid d-flex align-items-center justify-content-between">
                <div class="left-content d-flex">
                    <a class="navbar-brand d-flex align-items-center image-nav" href="{{ url('/') }}">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" width="100"
                            height="100" class="d-inline-block align-text-top me-2">
                    </a>
                </div>
                <div class="right-content d-flex">
                    <ul class="nav d-flex align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#layanan">Layanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#lokasi">Lokasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#kontak">Contact</a>
                        </li>
                        @auth
                            @if(Auth::user()->is_admin)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('orders.index') }}">Order</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="nav-link btn-logout">Logout</button>
                                </form>
                            </li>
                        @endauth
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="d-flex home-title">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" width="300"
                height="300" class="d-inline-block align-text-top me-2 mb-3">
        </div>
    </section>
    <section class="section-2" id="layanan">
        <div class="d-flex service-title">
            <h1>Layanan Kami</h1>
            <p>Kami menyediakan beberapa layanan yang dapat anda gunakan</p>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4 mx-2 service-content">
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <img src="{{ asset('assets/img/001-scale.png') }}" class="card-img-top w-50" alt="...">
                        <h5 class="card-title">Cuci Kiloan</h5>
                        <p class="card-text">Layanan dengan sistem cuci pakaian per kilogram</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <img src="{{ asset('assets/img/002-power-washing.png') }}" class="card-img-top w-50" alt="...">
                        <h5 class="card-title">Cuci Karpet</h5>
                        <p class="card-text">Layanan dengan sistem cuci karpet per meter</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <img src="{{ asset('assets/img/003-shoe-rack.png') }}" class="card-img-top w-50" alt="...">
                        <h5 class="card-title">Shoes Care</h5>
                        <p class="card-text">Perawatan sepatu seperti cuci, reparasi, dan restorasi</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-3" id="lokasi">
        <div class="d-flex button-center">
            <button onclick="centerMap()">Center Me!</button>
        </div>
        <div class="d-flex lokasi-title">
            <h1>Lokasi kami</h1>
            <p>Anda dapat langsung mengunjungi kami dengan titik lokasi berikut</p>
            <div id="map"></div>
        </div>
    </section>
    <section class="section-4" id="kontak">
        <div class="d-flex service-title">
            <h1>Contact Us</h1>
            <p>Anda dapat menghubungi kami melalui kontak berikut</p>
        </div>
        <div class="row d-flex kontak-row">
            <div class="col-6">
                <div class="row">
                    <div class="col-6 content-kontak">
                        <a href="#">
                            <img src="{{ asset('assets/img/002-whatsapp.png') }}" alt="whatsapp" width="50px" height="50px">
                            <p>08123456789</p>
                        </a>
                        <a href="#">
                            <img src="{{ asset('assets/img/001-instagram.png') }}" alt="instagram" width="50px" height="50px">
                            <p>@laundrygo</p>
                        </a>
                        <a href="#">
                            <img src="{{ asset('assets/img/005-facebook.png') }}" alt="facebook" width="50px" height="50px">
                            <p>LaundryGO</p>
                        </a>
                    </div>
                    <div class="col-6 content-kontak">
                        <a href="#">
                            <img src="{{ asset('assets/img/003-gmail.png') }}" alt="email" width="50px" height="50px">
                            <p>laundry-go@gmail.com</p>
                        </a>
                        <a href="#">
                            <img src="{{ asset('assets/img/004-twitter.png') }}" alt="twitter" width="50px" height="50px">
                            <p>@laundrygo</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-footer" id="footer">
        <nav class="navbar">
            <div class="container-fluid d-flex align-items-center justify-content-between">
                <div class="left-content d-flex">
                    <a class="navbar-brand d-flex align-items-center image-nav" href="/">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" width="70"
                            height="75" class="d-inline-block align-text-top me-2">
                    </a>
                </div>
                <div class="right-content d-flex">
                    <ul class="nav d-flex align-items-center">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#layanan">Layanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#lokai">Lokasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#kontak">Contact</a>
                        </li>
                        @auth
                            @if(Auth::user()->is_admin)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('orders.index') }}">Order</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="nav-link btn-logout">Logout</button>
                                </form>
                            </li>
                        @endauth
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>
