<?php

$navLinks = ["HOME", "MENU", "NEWS", "ABOUT", "FEEDBACK"];

function display_navigation()
{
    $navLinks = $GLOBALS['navLinks'];
    echo "<ul id='nav'>";
    foreach ($navLinks as $link) {
        echo "<li id='navItems'><a href='#' id='links'>$link</a></li>";
    }
    echo "</ul>";
}

include 'header.php';

include 'main.php';

include 'footer.php';
?>
