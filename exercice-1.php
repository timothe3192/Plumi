<?php require_once "requests/config.php"; ?>

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
	
	function get_data($questions, $answers, $totalRep){
			echo '{"exercice":[{"question":[';
		foreach ($questions as $key => $value) {
			echo '{"question_info":';
			echo json_encode($value); 
			echo ',"reponse":[';
			$jsonans = array();
			foreach ($answers as $key_2 => $value_2) {
				if($value_2->q_id == $value->id) {
					array_push($jsonans, json_encode($value_2));
				}
			}
			$n = count($jsonans);
				foreach ($jsonans as $key_3 => $value_3) {
					echo $value_3;
					if ($key_3 != $n-1){
						echo (',');
					}
				}
			echo (']}');
    		if (next($questions)==true){
    			echo (',');
    		}
    	}
			echo (']}]}');
	}

	echo get_data($questions, $answers, $totalRep);
?>
