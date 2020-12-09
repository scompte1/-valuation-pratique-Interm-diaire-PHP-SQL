<?php

// Inclusion du fichier de configuration
require '../config.php';


// Création de la connexion PDO
function getPDOConnection()
{
    // Construction du Data Source Name
    $dsn = 'mysql:dbname=' . DB_NAME . ';host=' . DB_HOST;

    // Tableau d'options pour la connexion PDO
    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    // Création de la connexion PDO (création d'un objet PDO)
    $pdo = new PDO($dsn, DB_USER, DB_PASSWORD, $options);
    $pdo->exec('SET NAMES UTF8');

    return $pdo;
}

// Préparation et exécution d'une requête SQL
function prepareAndExecuteQuery(string $sql, array $criteria = []): PDOStatement
{
    // Connexion PDO
    $pdo = getPDOConnection();

    // Préparation de la requête SQL
    $query = $pdo->prepare($sql);

    // Exécution de la requête
    $query->execute($criteria);

    // Retour du résultat
    return $query;
}

// Validation des champs du formulaire
function validateLogementForm(string $titre, string $adresse, string $ville, int $cp, $surface, $prix, string $type)
{
    $errors = [];

    if (!$titre) {
        $errors[] = 'Le titre du logement est obligatoire';
    }

    if (!$adresse) {
        $errors[] = 'L\'adresse du logement est obligatoire';
    }

    if (!$ville) {
        $errors[] = 'La ville du logement est obligatoire';
    }

    if (!$cp) {
        $errors[] = 'Le code postal du logement est obligatoire';
    } else if (!is_numeric($cp) || $cp < 0) {
        $errors[] = 'Le code postal est incorrecte';
    }

    if (!$surface) {
        $errors[] = 'La surface du logement est obligatoire';
    } else if (!is_numeric($surface) || $surface < 0) {
        $errors[] = 'La valeur de la surface est incorrecte';
    }

    if (!$prix) {
        $errors[] = 'Le prix du logement est obligatoire';
    } else if (!ctype_digit($prix) || $prix < 0) {
        $errors[] = 'La valeur du prix est incorrecte';
    }

    if (!$type) {
        $errors[] = 'Le type du logement est obligatoire';
    }

    return $errors;
}

function insertLogement(string $titre, string $adresse, string $ville, int $cp, int $surface, int $prix, string $photo, string $type, string $description)
{
    $sql = 'INSERT INTO logement (titre, adresse, ville, cp, surface, prix, photo, type, description)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';

    prepareAndExecuteQuery($sql, [$titre, $adresse, $ville, $cp, $surface, $prix, $photo, $type, $description]);
}
