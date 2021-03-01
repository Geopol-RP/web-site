<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['auth']['user'])) {
    header("location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Géopol-RP | Panel publique</title>

    <meta name="theme-color" content="#44d8e8"> 
    <meta name="msapplication-navbutton-color" content="#44d8e8"> 
    <meta name="apple-mobile-web-app-status-bar-style" content="#44d8e8">

    <!-- SEO -->

    <meta name="description" content="Panel publique du site web de Géopol-RP | Géopol-RP c'est une communauté Discord de passionnés de géopolitique. Au cours de parties variées, notre communauté peut s'affronter entre grandes puissances de leur temps en menant des complots, des guerres et des affrontements diplomatiques où seul le plus déterminé peut l'emporter !" />
    <meta name="author" content="Dany.01000110#3355 & Memel#9785" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.geopol-rp.fr/panel" />
    <meta property="og:title" content="Géopol-RP - Panel publique" />
    <meta property="og:description" content="Panel publique du site web de Géopol-RP | Géopol-RP c'est une communauté Discord de passionnés de géopolitique. Au cours de parties variées, notre communauté peut s'affronter entre grandes puissances de leur temps en menant des complots, des guerres et des affrontements diplomatiques où seul le plus déterminé peut l'emporter !">
    <meta property="og:image" content="https://www.geopol-rp.fr/img/image_embed.webp" />
    <meta property="twitter:card" content="summary" />
    <meta property="twitter:url" content="https://www.geopol-rp.fr/panel" />
    <meta property="twitter:title" content="Géopol-RP - Panel publique" />
    <meta property="twitter:description" content="Panel publique du site web de Géopol-RP | Géopol-RP c'est une communauté Discord de passionnés de géopolitique. Au cours de parties variées, notre communauté peut s'affronter entre grandes puissances de leur temps en menant des complots, des guerres et des affrontements diplomatiques où seul le plus déterminé peut l'emporter !">
    <meta property="twitter:image" content="https://www.geopol-rp.fr/img/image_embed.webp" />
</head>
</html>