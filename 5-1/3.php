<?php
session_start();
$nazwa = "3";

if(isset($_COOKIE[$nazwa]) && !isset($_SESSION['sesja'])) {
    $ilosc = intval($_COOKIE[$nazwa])+1;
}
else $ilosc = 1;

$_SESSION['sesja'] = 'sesja';
setcookie($nazwa, $ilosc, time() + 30*24*60*60);

?>
<style>
body {
    background-color: #000000;
    color: #ffffff;
    margin: auto;
    width: 50%;
    padding: 10px;
}
</style>
<br>
<h3>Ilość odwiedzin: <?php echo $ilosc; ?></h3>
