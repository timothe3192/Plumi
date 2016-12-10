<?php require_once "requests/config.php"; ?>
<?php require_once "templates/header.php" ?>
<?php require_once "templates/footer.php" ?>

<?php

	// Récupère toutes les questions
	$query = $pdo->query('SELECT * FROM questions');
	// Éxécution de la requête et récupération des données
	$questions = $query->fetchAll();

	// Préparation de la requête
	$query = $pdo->query('SELECT * FROM answers');
	// Éxécution de la requête et récupération des données
	$answers = $query->fetchAll();

	// Connaître le nombre de lignes dans la table question
	$query = $pdo->query('SELECT COUNT(*) AS "totalRep" FROM answers WHERE q_id = 1');
	// Éxécution de la requête et récupération des données
	$totalRep = $query->fetchAll();

	// Variable aléatoire des questions
	$exercice_status = 1;
	$query = $pdo->query('SELECT * FROM questions WHERE exercice ="'.$exercice_status.'" ORDER BY RAND() LIMIT 10');
	$questions_bdd = $query->fetchAll();

	// Variable aléatoire des réponses
	$query = $pdo->query('SELECT * FROM answers WHERE q_id = 1 ORDER BY RAND() LIMIT 10');
	$answers_bdd = $query->fetchAll();
	
	foreach ($questions as $key => $value) {
		echo '{"exercice":[{"question":[{"question_info":';
		echo json_encode($value);
	}
	foreach ($answers as $key => $value) {
		echo ',"reponse":[';
		echo json_encode($value);
	}
	foreach ($totalRep as $key => $value) {
		echo '],"totalRep":';
		echo json_encode($value);
	}

// function get_data(){
	// echo get_data();
// }

?>
