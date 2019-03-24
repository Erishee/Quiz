<?php session_start();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Shrikhand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pinyon+Script" rel="stylesheet">
    <link rel="stylesheet" href="../../owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="../../css/dashboard.css">
</head>
<body>
<header>
    <nav class="navbar fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">SuperQ</a>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Nos thématiques</a>
                </li>
            </ul>
            <div class="dropdown">
                <div class="avatar" id="user_options" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">
                    <img src="https://img.icons8.com/ios/50/000000/user-filled.png" class="dropdown-toggle">
                </div>
                <div class="dropdown-menu" aria-labelledby="user_options">
                    <a class="dropdown-item" href="editiondeprofil.php">Modifier le profil</a>
                    <a class="dropdown-item" href="deconnexion.php">Se deconnecter</a>
                </div>
            </div>
        </div>
    </nav>
</header>
<div class="status_message">
    <div class="alert alert-success" role="alert">
        <strong><?= $_SESSION["status"]["success"]; ?></strong>
    </div>
</div>

<section class="recompense">
    <div class="container">
        <div class="row">
            <div class="space_x"></div>
            <div class="col-sm">
                <a href="../Trophée/trophies.php" type="button" class="tro btn btn-outline-dark trophes">Vos trophées</a>
            </div>
            <div class="col-md">
                <button type="button" class="btn btn-outline-dark classement">Votre classement</button>
            </div>
            <div class="col-sm">
                <button type="button" class="btn btn-outline-dark classemnt">Votre score</button>
            </div>
        </div>
    </div>
</section>
<div class="espace" style="height: 150px;"></div>
<section class="new_theme_request">
    <div class="new_theme_request_intro">
        <span class="request_intro">Vos idees comptent !</span>
    </div>
    <div class="space_" style="height: 80px;"></div>
    <div class="request_link">
        <a class="btn btn-outline-light btn-lg " href="../../html/proposer_theme.html" role="button">Proposer un thème</a>
    </div>
</section>
<div class="space" style="height: 100px"></div>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <nav>
                    <h4 class="footer_about_us">
                        <span>A PROPOS</span>
                    </h4>
                    <ul class="chsabc">
                        <li>Qui sommes-nous ?</li>
                        <li>CGU</li>
                        <li>Politique de confidentialité</li>
                    </ul>
                </nav>
            </div>
            <div class="col-sm-6">
                <nav>
                    <h4 class="footer_contact_us">
                        <span>Nous contacter</span>
                    </h4>
                    <ul class="chsabc">
                        <li>Qui sommes-nous ?</li>
                        <li>CGU</li>
                        <li>Politique de confidentialité</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</footer>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="../bootstrap/js/src/modal.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js" integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous"></script>
<script src="../js/validator.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="../../owlcarousel/owl.carousel.min.js"></script>
<script src="../../js/close_alert.js"></script>
<script src="../../bootstrap/js/src/util.js"></script>
<script src="../../js/dashboard_carousel.js"></script>
<script src="../../bootstrap/js/src/modal.js"></script>
</body>
</html>