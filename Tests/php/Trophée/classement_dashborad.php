<?php
//creation de connexion
            $bdd= new PDO('mysql:host=localhost; dbname=bdd_projet; charset=utf8', 'root', '');

//test de creation de connexion

            try {
                    $bdd = new PDO('mysql:host=localhost; dbname=bdd_projet; charset=utf8', 'root', '');
                 }

            catch (PDOException $exception) {
     
             die('Erreur: ' .$exception->getMessage());  
                  }
?>

<?php
//creation classement
    $classement_score =$bdd->query( 'SELECT DISTINCT `Pseudo`, `Score_total` 
                                 FROM score_utilisateur 
                                 INNER JOIN utilisateur ON score_utilisateur.Utilisateur_id_UTilisateur=utilisateur.id_Utilisateur
                                 ORDER BY `Score_total` DESC LIMIT 0, 10 ');  

    $rang= $classement_score->fetch();

?>
     
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Shrikhand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">    
    <link href="https://fonts.googleapis.com/css?family=Pinyon+Script" rel="stylesheet">
    <link rel="stylesheet" href="../owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/style_dashboard.css" >

    <!-- ajout du css classement-->
    <link rel="stylesheet" href="../css/test_classement.css">
  
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
                      <a class="dropdown-item" href="#">Modifier le profil</a>
                      <a class="dropdown-item" href="#">Se deconnecter</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div class="space"></div>
    <section class="recompense">
        <div class="container">
            <div class="row">
                <div class="space_x"></div>
                <div class="col-sm">
                    <button type="button" class="tro btn btn-outline-dark trophes">Vos trophées</button>
                </div>
                <div class="col-sm">
                     <button type="button" data-target="#form_classement"  data-toggle="modal" class="tro btn btn-outline-dark classement">Classement</button>
                </div>
                <div class="col-sm">
                    <button type="button" class="btn btn-outline-dark classemnt">Votre score</button>        
                </div>

            </div>

                <!-- ajout du classement -->


                <div class="modal fade" id="form_classement" tabindex="-1" role="dialog" aria-labelledby="form_connetionCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title form_title" id="form_connectionTitle" class="test_classement" style="left: 25%;"><b>Classement</b></h1>
                        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                        <div class="row">
                                <div class="col-sm-4">
                                    <h5>Rang<hr></h5>


                                                <?php 
                                                 $classement_score =$bdd->query( 'SELECT DISTINCT `Pseudo`, `Score_total` 
                                                 FROM score_utilisateur 
                                                 INNER JOIN utilisateur ON score_utilisateur.Utilisateur_id_UTilisateur=utilisateur.id_Utilisateur
                                                ORDER BY `Score_total` DESC LIMIT 0, 10 ');  
                                                $r=1;
                                                while($rang= $classement_score->fetch()){
                                                echo '<li>'.'<br/>'.'&nbsp; &nbsp; &nbsp; &nbsp;'.$r;
                                                $r++;
                                                }
                                                $classement_score->closeCursor();
                                                 ?>

                                </div>
                                <div class="col-sm-4">
                                    <h5>Pseudo<hr></h5>
                                                                            <?php
                                               
                                                $classement_score =$bdd->query( 'SELECT DISTINCT `Pseudo`, `Score_total` 
                                                 FROM score_utilisateur 
                                                 INNER JOIN utilisateur ON score_utilisateur.Utilisateur_id_UTilisateur=utilisateur.id_Utilisateur
                                                ORDER BY `Score_total` DESC LIMIT 0, 10 ');  

                                                while($rang= $classement_score->fetch()){
                                                echo '<li>'.'<br/>'.'&nbsp;&nbsp;&nbsp;'.$rang['Pseudo'];
                                                }
                                                $classement_score->closeCursor();
                                        ?>
                                </div>
                                
                                <div class="col-sm-4">
                                    <h5>Score<hr></h5>
                                 <?php
                                    
                                                 $classement_score =$bdd->query( 'SELECT DISTINCT `Pseudo`, `Score_total` 
                                                 FROM score_utilisateur 
                                                 INNER JOIN utilisateur ON score_utilisateur.Utilisateur_id_UTilisateur=utilisateur.id_Utilisateur
                                                 ORDER BY `Score_total` DESC LIMIT 0, 10 ');  

                                                 while($rang= $classement_score->fetch()){
                                                 echo '<li>'.'<br/>'.'&nbsp;&nbsp;&nbsp;'.$rang['Score_total'];
                                                 
                                                 }
                                                $classement_score->closeCursor();
                    
                                        ?>
                                        <!-- Fin classement -->
                                        <br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


                    <!--
                    <div id="openModal" class="modalDialog">
                        <div>
                            <a href="#close" title="Close" class="close">fermer</a><br>
                            <h1 class="classement_test2"><strong>Classement</strong></h1><br>
                            <hr>
                         <div class="container">   
                            <div class="row">
                               <div class="col-sm-4"> 
                                        <h5 class="classement_test2"><b>Rang</b></h5><br>
                                                   <p class="classement_test2">1</p><br>
                                                   <p class="classement_test2" style='color:#FA9C0A;'>2</p><br>
                                                   <p class="classement_test2" style='color:#680A83;'>3</p>

                                        
                                  
                                </div>
                                <div class="col-sm-4">
                                    
                                        <h5><b>Pseudo</b></h5>

                                  
                                </div>
                                            
                                    <div class="col-sm-4">
                                        <h5><b>Score</b></h5>

       
                                        -->
                                       </div> 
                                 </div>
                            </div>
                        </div>                   
                    </div>
                </div>

                </div>
            </div>
            
            
        </div>
    </section>
    <div class="space"></div>
    <section class="themes_suivis">
        <div class="container">
            <h5>Thématiques suivies</h5>
            <hr>
            <div class="owl-carousel owl-theme owl-loaded">
                <div class="owl-stage-outer">
                    <div class="owl-stage">
                        <div class="card owl-item" style="width: 18rem;">
                            <img src="../images/Images/Thématiques/Cinéma.jpeg" class="card-img-top " alt="...">
                            
                        </div>   
                        <div class="card owl-item" style="width: 18rem;">
                            <img src="../images/Images/Thématiques/Géographie.jpg" class="card-img-top " alt="...">
                        </div>
                        <div class="card owl-item" style="width: 18rem;">
                            <img src="../images/Images/Thématiques/Musique.jpeg" class="card-img-top " alt="...">
                        </div>
                        <div class="card owl-item" style="width: 18rem;">
                            <img src="../images/Images/Thématiques/Géographie.jpg" class="card-img-top " alt="...">
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    <section class="new_theme_request">          
        <div class="new_theme_request_intro">
            <span class="request_intro">Vos idees comptent !</span>
        </div>
        <div class="space_" style="height: 80px;"></div>
        <div class="request_link">
            <a class="btn btn-outline-light btn-lg " href="/html/proposer_theme.html" role="button">Proposer un thème</a>
        </div>
    </section>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../bootstrap/js/src/modal.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js" integrity="sha384-0pzryjIRos8mFBWMzSSZApWtPl/5++eIfzYmTgBBmXYdhvxPc+XcFEk+zJwDgWbP" crossorigin="anonymous"></script>
    <script src="../js/validator.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../owlcarousel/owl.carousel.min.js"></script>
    <script src="../js/dashboard_carousel.js"></script>
    <script src="../bootstrap/js/src/modal.js"></script>
</body>
</html>
