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
    <header class="main-header mx-auto" style="max-width: 1048px;">
        <div class="container-fluid">

            <div class="d-flex justify-content-start pb-1" style="gap:30px">

                <h2 class="align-self-center">Greenie</h2>

                <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="img-fluid" style="max-width: 50px;">

            </div>


            <nav class="navbar navbar-expand-md navbar-dark bg-primary">
                <div class="collapse navbar-collapse" id="navbarNav">
                    {{-- @auth     --}}
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link text-light" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="#">Account</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('leaderboards.index') }}">Leaderboards</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="#">Contact Us</a>
                            </li>
                        </ul>
                    {{-- @else --}}
                        <!-- STA AKO JE USER PRIJAVLJEN A STA AKO NIJE-->
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link text-light" href="#">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="#">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="#">Logout</a>
                            </li>
                        </ul>
                    {{-- @endauth --}}
                </div>
            </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="main-footer bg-dark text-light py-3 mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <nav>
                        <ul class="nav justify-content-center">
                            <li class="nav-item">
                                <a class="nav-link text-light" href="#">About</a>
                            </li>
                            <li class="nav-item">
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
