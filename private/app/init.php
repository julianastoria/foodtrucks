<?php
include_once'../private/app/config.php';
include_once'../private/app/routes.php';

/* ----------------------
	INITIALISATION SESSION
------------------------*/

session_start();




// --------------------
// CONNEXION BDD
// --------------------

// On test la connexion à la BDD
try {
    // Création de la connexion à la base de données
    $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $user, $pass);
    if (MODE === "dev") {
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
// Si la connexion échoue, on attrape l'exception (message d'erreur)
// et on arrete l'execution du programme
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

/*	--------------------
	ROUTING (get page)
--------------------  */

// Recupération de la page que l'utilisateur souhaite afficher
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
// Si l'utilisateur arrive sur le site SANS DEFINIR le parametre
// page dans l'url, la variable $page prendra la valeur de $default_page
else {
    $page = DEFAULT_PAGE;
}

// On teste l'existence de la page demandée dans le $router
if (!array_key_exists($page, $router)) {
	$page = "404";
}

/*	------------
	SECURITY
------------  */

if ((isset($router[$page][1]) && $router[$page][1] === true)
    &&
    !(isset($_SESSION['user']['id']) && !empty($_SESSION['user']['id']) && is_numeric($_SESSION['user']['id']))
) {
    // setFlashbag("warning","Vous n'êtes pas autorisé à afficher la page ".$page);
    header("location: index.php?page=login");
    exit;
}