<?php
    session_start();
    require '../Database/Database.php';
    $db_connect = new Database('BDD_Projet');
    $pdo = $db_connect->getPDO();
    $_SESSION['auth']['id_Utilisateur'];//id_Utilisateur->attribut qui est fixe dans la table Utilisateur
    $id=$_SESSION['auth']['id_Utilisateur'];
    
    
    //var_dump($_SESSION['auth']);
        //getmail from table Utilisateur
        $getemail ="SELECT Email FROM Utilisateur WHERE id_Utilisateur=?";
        $mail=$pdo->prepare($getemail);
        $mail->execute([$id]);
        $mailuser=$mail->fetch(PDO::FETCH_ASSOC);
        //implode ( array ($mailuser) );
        //getname from table Utilisateur
        $getname ="SELECT Pseudo FROM Utilisateur WHERE id_Utilisateur=?";
        $name=$pdo->prepare("$getname");
        $name->execute([$id]);
        $nameuser=$name->fetch(PDO::FETCH_ASSOC);
        
        $Message=array();//message d'erreur
        $MessageS=array();//sucess
    
        if(isset($_POST['submit'])){
            
            
            //changer pseudo
        
            if(!empty(($_POST['Pseudo']))){
                if (!preg_match('/^[a-zA-Z0-9_]+$/',$_POST['Pseudo'])) {
                $Message = "Entrer un Pseudo correcte !";
                }
                else{
                $verify_exist_pseudo_request = "SELECT * FROM Utilisateur WHERE Pseudo =?";
                $verify_exist_pseudo = $pdo->prepare($verify_exist_pseudo_request);
                $verify_exist_pseudo->execute([$_POST['Pseudo']]);
                $exist_pseudo = $verify_exist_pseudo->fetch();
                if ($exist_pseudo) {
                    $Message['Pseudo']="Ce pseudo est déja utilisé";
                }
                else{
                $changer_pseudo=$pdo->prepare("UPDATE Utilisateur SET Pseudo=? WHERE id_Utilisateur=?");//
                    $changer_pseudo->execute([$_POST['Pseudo'],$id]);
                    if($changer_pseudo){
                        $MessageS['Pseudo']="Votre pseudo a été changé";//message
                        }
                    }
                }
        
        }
        
        
        
        //changer adresse mail
        
        
            if (!empty(($_POST['email'])))
                {
                $verify_exist_email_request = "SELECT id_Utilisateur FROM Utilisateur WHERE email = ?";
                $verify_exist_email = $pdo->prepare($verify_exist_email_request);
                $verify_exist_email ->execute([$_POST['email']]);
                $exist_email = $verify_exist_email->fetch();
                if ($exist_email) {
                    $Message['email']= "Cet email est déja utilisé";
                }
                else{
                    $changer_email=$pdo->prepare("UPDATE Utilisateur SET Email= ? WHERE id_Utilisateur=?");//
                    $changer_email->execute([$_POST['email'],$id]);
                    if($changer_email){
                        $mail= $_POST['email'];
                        $MessageS['mail']="Votre adresse mail a été changé";//message
                    }
                }
            }
            
        
        //changer mot de passe


                if(($_POST['password'])!=($_POST['psw_confirm'])){
                    $Message['password']='Veuillez vérifier votre mot de passe';
                }
                elseif(!empty($_POST['password'])){
                $pws=password_hash($_POST['password'],PASSWORD_BCRYPT);
                $changer_psw=$pdo->prepare("UPDATE Utilisateur SET Mot_de_passe=? WHERE id_Utilisateur=?");//
                $changer_psw->execute([$pws,$id]);
                if($changer_psw){
                    $MessageS['password']="Votre mot de passe a été changé";//message
                }
            }
            
            $page = $_SERVER['PHP_SELF'];
            $sec = "6";
            header("Refresh: $sec; url=$page");
            //header('Location:'.$_SERVER['HTTP_REFERER']);     
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="../../css/editiondeprofil.css">
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Shrikhand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pinyon+Script" rel="stylesheet">
    <link rel="stylesheet" href="../../owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="../../css/style_dashboard.css">
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
                    <a class="dropdown-item" href="../Espace_membre/deconnexion.php">Se deconnecter</a>
                </div>
            </div>
        </div>
    </nav>
</header>
<div></div>

<div class=main-content>
        <?php if (!empty($Message)): ?>                                                
                        <div class="alert alert-danger">
                                <ul>
                                <?php foreach ($Message as $Errormsg): ?>
                                <li>
                                    <?= $Errormsg ?>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
        <?php if (!empty($MessageS)): ?>                                                
                        <div class="alert alert-success">
                                <ul>
                                <?php foreach ($MessageS as $Successmsg): ?>
                                <li>
                                    <?= $Successmsg ?>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

        <form action="editiondeprofil.php" method="post">
    <div class=p>
        <div class=text2>
            <?php
            echo("Votre pseudo:");//
            print implode("",$nameuser);
            echo("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
            echo("Votre e-mail:");
            print implode("",$mailuser);
            ?></p>
            <div>
            <div class=text>Pseudo:</div>
            <div class="form-group"> <input type="text" name="Pseudo" 
            placeholder="Entrer un nouveau pseudo"  >
            <label for="Pseudo"><div class=text1>*Enter un nouveau pseudo</div></label> </div>
            <div class=text>E-mail: </div>
            <div class="form-group"><input type="email" name="email" 
            placeholder="Entrer un nouveau email" >
            <label for="email"><div class=text1>*Enter une nouvelle adresse mail</div></label> </div>
            <div class=text>Mot de passe:</div>
            <div class="form-group"> <input type="password" name="password" 
            placeholder="Entrer un nouveau mot de passe" >
            <label for="Mot_de_passe"><div class=text1>*Enter un nouveau mot de passe</div></label> </div>
            <div class=text>Veification de mot de passe:</div>
            <div class="form-group"> <input type="password" name="psw_confirm" 
            placeholder="Veification de mot de passe" >
            <label for="Mot_de_passe"><div class=text1>*Veification de mot de passe</div></label> </div>
            <button class="button" type="submit" name="submit">modifier</button>
            
    </div>
</div>
</form>
</body>
</html>