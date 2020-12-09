<?php 

// Inclusion des dépendances
require '../vendor/autoload.php';
require '../src/functions.php';

// Sélection des logements
$logements = getAllLogements();




include '../templates/index.phtml';