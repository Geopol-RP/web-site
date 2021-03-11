<?php
    if(isset($_GET['loginAction'])){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_POST['username']) && isset($_POST['password'])) {
            //Connexion à la base de données
            include 'mysql.php';
        
            //Nous allons demander le hash pour cet utilisateur à notre base de données :
            $query = $pdo->prepare('SELECT * FROM `bdd_Intra` WHERE `users` = ?');
            $query->execute([$_POST["username"]]);
            $result = $query->fetch();
        
            if (is_array($result) && !empty($result)) {
                //Nous vérifions si le mot de passe utilisé correspond bien à ce hash à l'aide de password_verify :
                if (password_verify($_POST["password"], ($result["password"]))) {
                    //Si oui nous accueillons l'utilisateur identifié
                    $_SESSION["auth"] = $result;
                    header('Location: index');
                    exit();
                } else {
                    //Sinon nous signalons une erreur d'identifiant ou de mot de passe
                    header('Location: login?erreur=1');
                    exit();
                }
            } else {
                header('Location: login?erreur=1');
                exit();
            }
        } else {
           header('Location: index.php');
           exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Géopol-RP | Panel - Connexion</title>
    <link rel="stylesheet" href="css/login.css">

    <meta name="theme-color" content="#44d8e8"> 
    <meta name="msapplication-navbutton-color" content="#44d8e8"> 
    <meta name="apple-mobile-web-app-status-bar-style" content="#44d8e8">

    <!-- Favicons -->

    <link rel="shortcut icon" type="image/png" href="../img/favicons/favicon_geopol_16x16.png" sizes="16x16">
    <link rel="shortcut icon" type="image/png" href="../img/favicons/favicon_geopol_32x32.png" sizes="32x32">
    <link rel="shrotcut icon" type="image/png" href="../img/favicons/favicon_geopol_android_google_chrome_192x192.png" sizes="192x192">
    <link rel="shortcut icon" href="../img/favicons/favicon_geopol_32x32.ico" type="image/x-icon">

    <!-- SEO -->

    <meta name="description" content="Panel publique du site web de Géopol-RP | Géopol-RP c'est une communauté Discord de passionnés de géopolitique. Au cours de parties variées, notre communauté peut s'affronter entre grandes puissances de leur temps en menant des complots, des guerres et des affrontements diplomatiques où seul le plus déterminé peut l'emporter !" />
    <meta name="author" content="Dany.01000110#3355 & Memel#9785" />
    <meta name="keywords" content="Geopol, Geopol-RP, geopol, geopol rp, Geopol RP, Geopol Rp politique, géopolitique, geopolitique, rp, rôleplay, Rôle-Play, Discord, discord, serveur discord, Serveur Discord, server discord, Server Discord, server, Serveur">
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
<body>
    <div class="container">
        <div class="background"></div>
        <div class="content">
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
                    <label for="checkbox" id="label-checkbox">
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
        </div>
    </div>
    <a href="../" class="returnHomePage"><i class="fas fa-undo-alt"></i> Retourner à la page d'accueil</a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js" integrity="sha512-UwcC/iaz5ziHX7V6LjSKaXgCuRRqbTp1QHpbOJ4l1nw2/boCfZ2KlFIqBUA/uRVF0onbREnY9do8rM/uT/ilqw==" crossorigin="anonymous"></script>
</body>
</html>