{{-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
      <a class="navbar-brand" href="#">Online Store</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
              <li class="nav-item"><a class="nav-link active" href="#">Accueil</a></li>
              <li class="nav-item"><a class="nav-link" href="/products">Boutique en ligne</a></li>
              <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
          </ul>
      </div>
  </div>
</nav>
 --}}
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Online Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('products') ? 'active' : '' }}" href="{{ url('/products') }}">Boutique en ligne</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ url('/contact') }}">Contact</a>
                </li>

                {{-- Lien visible uniquement pour l'administrateur --}}
                @auth
                    @if(auth()->user()->is_admin)
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin*') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                                Administration
                            </a>
                        </li>
                    @endif
                @endauth

                {{-- Connexion / Déconnexion --}}
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Se déconnecter
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('login') ? 'active' : '' }}" href="{{ route('login') }}">Se connecter</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

  