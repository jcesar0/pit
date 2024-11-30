<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#">{{ env('APP_NAME') }}</a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"> <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a> </li>
                @auth()
                    <li class="nav-item"> <a class="nav-link" aria-current="page" href="{{ route('vehicle') }}">Carros</a> </li>
                @endauth

            </ul>

            <div class="d-flex">
                @auth() <a class="nav-item nav-link" aria-current="page" href="{{ route('logout') }}">Sair</a> @endauth
                @guest() <a class="nav-item nav-link" aria-current="page" href="{{ route('login') }}">Entrar</a> @endguest
            </div>

        </div>
    </div>
</nav>
