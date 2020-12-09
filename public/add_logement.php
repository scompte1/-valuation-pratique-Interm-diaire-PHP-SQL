<?php

// Inclusion des dépendances
require '../vendor/autoload.php';
require '../src/functions.php';

// Initialisations
$errors = null;

if (!empty($_POST)) {

    // Récupération des données du formulaire
    $titre = $_POST['titre'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $cp = $_POST['cp'];
    $surface = intval($_POST['surface']);
    $prix = str_replace(',', '.', $_POST['prix']);
    $photo = $_POST['photo'];
    $type = $_POST['type'];
    $description = $_POST['description'];

    // Validation des données
    $errors = validateLogementForm($titre, $adresse, $ville, $cp, $surface, $prix, $type);

    // S'il n'y a pas d'erreur
    if (empty($errors)) {

        // Insertion du logement dans la BDD
        insertLogement($titre, $adresse, $ville, $cp, $surface, $prix, $photo, $type, $description);
        // Redirection
        header('Location: index.php');
        exit;
    }
}

// Inclusion du template
include '../templates/add_logement.phtml';
