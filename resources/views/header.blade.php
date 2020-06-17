
<header class="header-fixed">

  <div class="header-limiter" id="menu">

    <div id="pagesMenu">
        <img id="logoHeader" src="img/logo.png" alt="logo">
        <nav>
            @guest
                <a class="menuLink" href="/">Accueil</a>
                <a class="menuLink" href="/maisons">Maisons</a>
                <a class="menuLink" href="/regles">Règles</a>
                <a class="nav-link" href="{{ url('auth/google') }}">Se connecter</a>
            @else
                <a class="menuLink" href="/">Accueil</a>
                <a class="menuLink" href="/classements">Classements</a>
                <a class="menuLink" href="/historique">Historique</a>
                <a class="menuLink" href="/maisons">Maisons</a>
                <a class="menuLink" href="/regles">Règles</a>
                <a class="menuLink" href="/challenges">Défis</a>
                <a class="menuLink" href="/profil" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    Profil
                </a>
                <a class="nav-link menuLink" href="{{ route('logout') }}">Déconnecter</a>
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

