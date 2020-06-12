
<header class="header-fixed">

  <div class="header-limiter" id="menu">

    <div id="pagesMenu">
        <img id="logoHeader" src="img/logo.png" alt="logo">
        <nav>
        <a class="menuLink" href="/">Accueil</a>
        <a class="menuLink" href="/classements">Classements</a>
        <a class="menuLink" href="/historique">Historique</a>
        <a class="menuLink" href="/maisons">Maisons</a>
        <a class="menuLink" href="/regles">Règles</a>
        <a class="menuLink" href="/challenges">Défis</a>
            @guest
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            @else
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    </div>
            @endguest
        </nav>
    </div>
  </div>

    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>

</header>

