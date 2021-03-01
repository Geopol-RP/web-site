<?php
$db_username = 'geopol_bdd';
$db_password = 'o2v~7W5k';
$db_name     = 'geopol_bdd_';
$db_host     = 'localhost';

try {
	$pdo = new PDO('mysql:host='.$db_host.';dbname='.$db_name, $db_username, $db_password);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>