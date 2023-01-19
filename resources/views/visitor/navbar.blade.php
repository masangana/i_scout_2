<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-0 pe-5">
    <a href="/" class="navbar-brand ps-5 me-0">
        <h1 class="text-white m-0">I-Scout</h1>
    </a>
    <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="/" class="nav-item nav-link active">Accueil</a>
            @if (Route::has('login'))              
                @auth
                    <a href="{{ url('/accueil') }}" class="nav-item nav-link">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="nav-item nav-link">Connexion</a>
                @endauth
            @endif
        </div>
        
    </div>
</nav>