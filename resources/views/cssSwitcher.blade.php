<?php

if(isset($_COOKIE['themeCookie'])) {
    switch ($_COOKIE['themeCookie']){
        case 'crackend' :
            echo '<link id="cssTheme" rel="stylesheet" href="css/themes/crackend.css" title="defaultStyle"/>';
            break;
        case 'phoenixml':
            echo '<link id="cssTheme" rel="stylesheet" href="css/themes/phoenixml.css" title="defaultStyle"/>';
            break;
        case 'gitsune' :
            echo '<link id="cssTheme" rel="stylesheet" href="css/themes/gitsune.css" title="defaultStyle"/>';
            break;
        default :
            echo '<link id="cssTheme" rel="stylesheet" href="css/themes/default.css" title="defaultStyle"/>';
    }
}
else {
    echo '<link id="cssTheme" rel="stylesheet" href="css/themes/default.css" title="defaultStyle"/>';
}
?>
