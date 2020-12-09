<?php 

// Inclusion des dépendances
require '../vendor/autoload.php';
require '../src/functions.php';

// Sélection des logements
$logements = getAllLogements();


// Inclusion du template
include '../templates/index.phtml';