<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Géopol-Rp | Panel - Connexion</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container-login">
        <form action="?loginAction" method="POST">
                <h1 id="title-login">Connexion</h1>
                
                <label><b>Nom d'utilisateur</b></label>
                <br>
                <input type="text" placeholder="Entrer votre nom d'utilisateur" name="username" required>
                <br>
                <label><b>Mot de passe</b></label>
                <br>
                <input type="password" placeholder="Entrer votre mot de passe" name="password" id="password" required>
                <br>
                <label for="checkbox">
                    <input type="checkbox" id="checkbox">
                    Afficher le mot de passe
                </label>
                <br>    
                <input type="submit" id='submit' value='CONNEXION' >
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2) {
                        echo "<p align='center' style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                    }
                    if($err==3) {
                        echo "<p align='center' style='color:red'>Vous devez être connecté pour accéder à l'intra d'<b>Étudia Sphère</b> !</p>";
                    }
                }
                ?>
        </form>
        <p id="copy">Géopol-RP &copy <?= date("Y") ?></p>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var checkbox = $("#checkbox");
        var password = $("#password");
        checkbox.click(function() {
            if(checkbox.prop("checked")) {
                password.attr("type", "text");
            } else {
                password.attr("type", "password");
            }
        });
    });
</script>
</body>
</html>