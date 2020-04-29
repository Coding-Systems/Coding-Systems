<?php

function construire_url($dossier)
{
    return 'http://www.site.com/styles/' . htmlspecialchars($dossier) . '/style.css';
}

$dossiers = array(
    'default',
    'crackend',
    'phoenixml',
    'gitsune'
);

$actuel = htmlspecialchars($_SERVER['PHP_SELF']);
$new_style = (isset($_GET['style'])) ? $_GET['style'] : '';
$cookie_style = (isset($_COOKIE['style'])) ? $_COOKIE['style'] : '';

if(in_array($new_style, $dossiers, true))
{
    setcookie('style', $new_style, time() + (365 * 24 * 3600), '/');
    $url = construire_url($new_style);
}

else if(in_array($cookie_style, $dossiers, true))
{
    $url = construire_url($cookie_style);
}
else
{
    $url = construire_url($dossiers[0]);
}
?>
