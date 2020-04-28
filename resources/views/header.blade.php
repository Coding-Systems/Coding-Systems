
<header>
<link rel="stylesheet" type="text/css" href="{{ url('/css/default.css') }}" />
  <div id="menu">
    <div id="cssThemeSwitcher">

        <button id="defaultTheme" class="cssTheme"
                onclick='document.cookie = "themeCookie=default"; path="/";
                document.getElementById("cssTheme").href="css/themes/default.css";
                ;'>Thème Default
        </button>
        <button id="crackendTheme" class="cssTheme"
                onclick='document.cookie = "themeCookie=crackend"; path="/";
                document.getElementById("cssTheme").href="css/themes/crackend.css";
                ;'>Thème Crack'end
        </button>
        <button id="phoenixmlTheme" class="cssTheme"
                onclick='document.cookie = "themeCookie=phoenixml"; path="/";
                document.getElementById("cssTheme").href="css/themes/phoenixml.css";
                ;'>Thème PhoeniXML
        </button>
        <button id="gistuneTheme" class="cssTheme"
                onclick='document.cookie = "themeCookie=gitsune"; path="/";
                document.getElementById("cssTheme").href="css/themes/gitsune.css";

                ;')>Thème Gistune
        </button>

        <!--
      <button id="defaultTheme" class="cssTheme"
              onclick="document.getElementById('cssTheme').href='css/themes/default.css';">Thème Default
      </button>
      <button id="crackendTheme" class="cssTheme"
              onclick="document.getElementById('cssTheme').href='css/themes/crackend.css';">Thème Crack'end
      </button>
      <button id="phoenixmlTheme" class="cssTheme"
              onclick="document.getElementById('cssTheme').href='css/themes/phoenixml.css';">Thème PhoeniXML
      </button>
      <button id="gistuneTheme" class="cssTheme"
              onclick="document.getElementById('cssTheme').href='css/themes/gitsune.css';">Thème Gistune
      </button>
    </div>

    <div id="pagesMenu">
      <img id="logo" src="img/logo.png" alt="logo">
      <a class="menuLink" href="/">Accueil</a>
      <a class="menuLink" href="/classements">Classements</a>
      <a class="menuLink" href="/maisons">Maisons</a>
      <a class="menuLink" href="/regles">Règles</a>
      <a class="menuLink" href="/challenges">Défis</a>
      <a class="menuLink" href="/login">Login</a>
    </div>
  </div>

</header>


}
