<header class="header-fixed">

  <div class="header-limiter" id="menu">

    <div id="pagesMenu">

        <nav class="headerNav">
            <a class="menuLink" href="/"><img id="logoHeader" src="img/logo.png" alt="logo"></a>
            @guest
                <a class="menuLink" href="/systems">Systems</a>
                <a class="menuLink" href="/regles">Règles</a>
                <a class="menuLink" href="{{ url('auth/google') }}">Se connecter</a>
            @else
                <a class="menuLink" href="/classements">Classements</a>
                <a class="menuLink" href="/historique">Historique</a>
                <a class="menuLink" href="/systems">Systems</a>
                <a class="menuLink" href="/regles">Règles</a>
                <a class="menuLink" href="/challenges">Défis</a>
                <?php
                if (Auth::user()->is_admin == "1") {
                    echo '<a class="menuLink" href="/admin">Admin</a>';
                }
                ?>
                    <a class="menuLink icon_head_profil" href="/profil" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img class="icon" src="img/profileIcon.svg"/>
                    </a>
                    <a class="menuLink icon_head" href="{{ route('logout') }}"><img class="icon" src="img/logOutIcon.svg"/></a>


        </nav>
    </div>

    @endguest

  </div>

    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>

</header>

