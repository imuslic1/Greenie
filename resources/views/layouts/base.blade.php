@push('styles')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endpush

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/app.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @stack('styles')
</head>

<body>
    <header class="main-header">
        <div class="container-fluid px-0 justify-content-center">
            <nav class="navbar navbar-expand-md" style="background-color: #94D4AE">
                <div class="collapse navbar-collapse justify-content-between">
                    <a class="navbar-brand align-items-center d-flex fs-3" href="http://localhost:8000/home" style="color: #1E555C; align-items: center;">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="mx-2" style="max-width: 60px;">
                        Greenie
                    </a>
                </div>
                <div class="collapse navbar-collapse text-nowrap justify-content-center" id="navbarNav">
                       
                    <ul class="navbar-nav">
                        <li class=" nav-item px-3">
                            <a class="underline-hover nav-link text-uppercase fs-5" href="{{ route('home') }}">Home</a>
                        </li>
                        @auth
                            <li class="nav-item px-3">
                                <a class="underline-hover nav-link text-uppercase fs-5" href="#">My Account</a>
                            </li>

                            <li class="nav-item px-3">
                                <a class="underline-hover nav-link text-uppercase fs-5" href="{{ route('leaderboards.index') }}">Leaderboards</a>
                            </li>
                        @endauth
                        <li class="nav-item px-3">
                            <a class="underline-hover nav-link text-uppercase fs-5" href="#">Contact Us</a>
                        </li>
                    </ul>
                        <!-- STA AKO JE USER PRIJAVLJEN A STA AKO NIJE-->
                </div>
                <div class="collapse navbar-collapse justify-content-end">
                    <ul class="navbar-nav">
                        @guest
                            <li class="nav-item px-2">
                                <a class="darken-hover nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item px-2">
                                <a class="darken-hover nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @else
                            <li class="nav-item px-2">
                                <form method="POST" class="main-header_logout" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="darken-hover nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit(); " role="button">
                                        <i class="fas fa-sign-out-alt"></i>
                        
                                        {{ __('Log Out') }}
                                    </a>
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <main class="mb-3" style="min-height: 78vh;">
        @yield('content')
    </main>

    <footer class="main-footer text-light py-3 mx-auto" style="background-color: #112F33">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 text-center">
                    <nav>
                        <ul class="nav justify-content-center">
                            <li class="nav-item px-4">
                                <a class="nav-link text-light" href="#">About</a>
                            </li>
                            <li class="nav-item px-4">
                                <a class="nav-link text-light" href="#">Contact</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
