<?php
echo"<link rel='stylesheet' type='text/css' href='http://pixelbyte.net/public/animate.css' />";

//include font and basic Pixelbyte stylesheet
echo"<link rel='stylesheet' type='text/css' href='http://pixelbyte.net/public/style_header.css' />";

//create centered header
echo "
    <header id='header' class='animated fadeIn'>
            <a href='http://pixelbyte.net'>
            <img src='http://pixelbyte.net/public/logo.png' class='animated fadeInDown'>
            </a>";
//display pixelbyte links

echo"<br/>
<div id='links'>
<a href='http://pixelbyte.net' > Home </a>|<a href='http://pixelbyte.net/posts/about'> About </a>|<a href='http://pixelbyte.net/posts/contact'> Contact </a>|<a href='http://pixelbyte.net/posts/services'> Services </a></header>";

end;

?>