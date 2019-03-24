<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page d'accueil</title>
    <link rel="stylesheet" href="../../owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">    <link href="https://fonts.googleapis.com/css?family=Pinyon+Script" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style_test.css">
</head>
<body>
    <header class="header" role="banner">
        <div class="topbar">
            <div class="logo">
                <a href="#" class="logo-link">SuperQ</a>
            </div>
            <nav class="navbar">
                <div class="navbar-items">
                    <a href="#">Accueil</a>
                    <a href="#apropos">A propos</a>
                    <a href="#">Nos thématiques</a>
                    <a href="#">Contact</a>
                </div>
            </nav>
            <div class="authentification">
                <a class=" connexion btn " data-toggle="modal" role="button" data-target="#form_connection">Se connecter</a>
                <a class="inscription btn" data-toggle="modal" role="button" data-target="#form_inscription">S'inscrire</a>
            </div>
        </div>  
    </header>

    <div class="background"></div>

