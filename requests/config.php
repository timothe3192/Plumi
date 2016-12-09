<?php
// Connexion variables
define('SALT','B67(nbk123)');
define('DB_HOST','localhost');
define('DB_NAME','dyslexie_test');
define('DB_USER','root');
define('DB_PASS','root'); // '' par défaut sur windows

try
{
    // Try to connect to database
    $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    // Set fetch mode to object
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
}
catch (Exception $e)
{
    // Failed to connect
    die('Could not connect');
}

// Récupère toutes les questions
$query = $pdo->query('SELECT * FROM questions');
$questions = $query->fetchAll();

// Préparation de la requête
$query = $pdo->query('SELECT * FROM answers');
// Éxécution de la requête et récupération des données
$answers = $query->fetchAll();

// Connaître le nombre de lignes dans la table question
$query = $pdo->query('SELECT COUNT(*) AS rowNumber FROM answers WHERE q_id = 1');
$totalRep = $query->fetchAll();

// Variable aléatoire des questions
$exercice_status = 1;
$query = $pdo->query('SELECT * FROM questions WHERE exercice ="'.$exercice_status.'" ORDER BY RAND() LIMIT 10');
$questions_bdd = $query->fetchAll();

// Variable aléatoire des réponses
$query = $pdo->query('SELECT * FROM answers WHERE q_id = 1 ORDER BY RAND() LIMIT 10');
$answers_bdd = $query->fetchAll();
