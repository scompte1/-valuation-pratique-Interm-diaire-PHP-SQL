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
function validateLogementForm($titre, $adresse, $ville, $cp, $surface, $prix, $type)
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
    } else if (!is_numeric($cp) || $cp < 0 || $cp > 99999) {
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

// Formatte un prix à la française
function format_price(float $price): string
{
    return number_format($price, 0, ',', ' ') . ' €';
    //$formatter = new NumberFormatter('fr_FR', NumberFormatter::CURRENCY);
    //return $formatter->formatCurrency($price, 'EUR');
}

// Insère un logement dans la BDD
function insertLogement(string $titre, string $adresse, string $ville, int $cp, int $surface, int $prix, string $photo, string $type, string $description)
{
    $sql = 'INSERT INTO logement (titre, adresse, ville, cp, surface, prix, photo, type, description)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';

    prepareAndExecuteQuery($sql, [$titre, $adresse, $ville, $cp, $surface, $prix, $photo, $type, $description]);
}

// Exécute une requête de sélection et retourne plusieurs résultats
function selectAll(string $sql, array $criteria = [])
{
    $query = prepareAndExecuteQuery($sql, $criteria);

    return $query->fetchAll();
}


// Exécute une requête de sélection et retourne UN résultat
function selectOne(string $sql, array $criteria = [])
{
    $query = prepareAndExecuteQuery($sql, $criteria);

    return $query->fetch();
}

// Récupère les données de tous les logements
function getAllLogements()
{
    $sql = 'SELECT id_logement, titre, adresse, ville, cp, surface, prix, photo, type, description
            FROM logement';

    return selectAll($sql);
}

// Récupère les données d'un logement par son ID
function getLogementById(int $id)
{
    $sql = 'SELECT id_logement, titre, adresse, ville, cp, surface, prix, photo, type, description
            FROM logement
            WHERE id_logement = ?';

    return selectOne($sql, [$id]);
}
