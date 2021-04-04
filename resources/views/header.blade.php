<header class="header-fixed">

  <div class="header-limiter" id="menu">

    <div id="pagesMenu">

        <nav class="headerNav">
            <img id="logoHeader" src="img/logo.png" alt="logo">
            @guest
                <a class="menuLink" href="/">Accueil</a>
                <a class="menuLink" href="/systems">Systems</a>
                <a class="menuLink" href="/regles">Règles</a>
                <a class="menuLink" href="{{ url('auth/google') }}">Se connecter</a>
            @else
                <a class="menuLink" href="/">Accueil</a>
                <a class="menuLink" href="/classements">Classements</a>
                <a class="menuLink" href="/historique">Historique</a>
                <a class="menuLink" href="/systems">Systems</a>
                <a class="menuLink" href="/regles">Règles</a>
                <a class="menuLink" href="/challenges">Défis</a>
                <a class="menuLink" href="/profil" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    Profil
                </a>
                <?php
                if (Auth::user()->is_admin == "1") {
                    echo '<a class="menuLink" href="/admin">Admin</a>';
                }

                ?>

        </nav>
    </div>
    <div class="logOutDiv">
        <a class="menuLink" href="{{ route('logout') }}"><img class="logOutIcon menuLink" src="img/logOutIcon.svg"/></a>
    </div>
    @endguest

  </div>

    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>

</header>

