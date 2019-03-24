<?php
$_SESSION["auth"] = null;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION['auth'])){
    header('Location: dashboard.php');
    exit();
}
if(!empty($_POST) && !empty($_POST['Pseudo']) && !empty($_POST['password'])){
    require '../Database/Database.php';
    $db_connect = new Database('BDD_Projet');
    $pdo = $db_connect->getPDO();
    $records = $pdo->prepare('SELECT * FROM Utilisateur WHERE (Pseudo = :Pseudo)');
    $records->execute(['Pseudo' => $_POST['Pseudo']]);
    $user = $records->fetch();
    if(password_verify($_POST['password'],$user['Mot_de_passe'])){
        $_SESSION['auth'] = $user;
        $_SESSION['status']['success'] = 'Vous êtes connecté';
        header('Location: dashboard.php');
        exit();
    }else{
        $_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';
    }
}
  ?>  
  

<?php require '../Templates/header.php';?>

<div class="modal fade" id="form_connection" tabindex="-1" role="dialog" aria-labelledby="form_connetionCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title form_title" id="form_connectionTitle">Connexion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST"  novalidate>
                    <div class="form-group">
                        <input type="text" class="form-control" name="Pseudo" id="pseudoInput" placeholder="Pseudo">
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" id="mdpInput" placeholder="Mot de passe">
                    </div>
                    <button type="submit" class="btn btn-danger connect_submit">Se connecter</button>
                    <a href="#">Mot de passe oublié ? </a>
                </form>
            </div>
            <div class="modal-footer">
                <span class="new">Vous êtes nouveau </span>
                ?
                <span class="new_account">Creer votre compte</span>
            </div>
        </div>
    </div>
</div>

<?php require '../Templates/footer.php'; ?>