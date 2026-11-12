<?php

require_once __DIR__ . '/Model/Model.php';
require_once __DIR__ . '/Model/ModelPlayer.php';
require_once __DIR__ . '/View/ViewHome.php';
require_once __DIR__ . '/Controller/Controller.php';
require_once __DIR__ . '/Controller/ControllerHome.php';

// Connexion à la BDD
$pdo = new PDO(
    'mysql:host=localhost;dbname=supergame;charset=utf8mb4',
    'root',
    'root'
);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



$controller = new ControllerHome(new ModelPlayer($pdo), new ViewHome());
$controller->registerPlayer();
$controller->displayPlayers();
$controller->render();          