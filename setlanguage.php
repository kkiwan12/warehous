<?php 

if(isset($_COOKIE['lang'])){
    $_SESSION['lang'] = $_COOKIE['lang'];

}
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'en';
}
$langCode = $_SESSION['lang'];
