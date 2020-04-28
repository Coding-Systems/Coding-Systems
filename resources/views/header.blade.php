<?php
//setcookie ( $name = 'cookieTheme' [ $value = "default" [ $expires = 0 [ $path = "/" [ $domain = "/" [ $secure = FALSE [ $httponly = FALSE ]]]]]] );
//setcookie (  $name [, string $value = "" [, array $options = [] ]] ) : bool
//setcookie('themeCookie', 'default', time() + (86400 * 30), "/");
//setcookie('themeCookie', 'default', 0, "/");
//setcookie('themeCookie', 'default');
?>

<header>

  <div id="menu">
    <div id="cssThemeSwitcher">

        <button id="defaultTheme" class="cssTheme"
                onclick="<?php// setcookie('themeCookie', 'default', time() + (86400 * 30), "/");?>">Thème Default
        </button>
        <button id="crackendTheme" class="cssTheme"
                onclick="<?php // setcookie('themeCookie', 'crackend', time() + (86400 * 30), "/");?>">Thème Crack'end
        </button>
        <button id="phoenixmlTheme" class="cssTheme"
                onclick="<?php //setcookie('themeCookie', 'phoenixml', time() + (86400 * 30), "/");?>">Thème PhoeniXML
        </button>
        <button id="gistuneTheme" class="cssTheme"
                onclick="<?php //setcookie('themeCookie', 'gitsune', time() + (86400 * 30), "/"); ?>">Thème Gistune
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
      -->

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

