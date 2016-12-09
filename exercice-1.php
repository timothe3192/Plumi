<?php require_once "requests/config.php"; ?>
<?php require_once "templates/header.php" ?>
<?php require_once "templates/footer.php" ?>

<?php
echo '{"exercice":[{"question":[{"question_info":';
echo json_encode($questions[0]);
echo ',"reponse":[';
echo json_encode($answers[0]);
echo '],"totalRep":';
echo json_encode($totalRep[0]);
?>

<!-- {"exercice":[{"question":[{"question_info":{"id":0, "texte":"Quelle est la couleur du cheval blanc d'henri huit", "exercice":1},"reponse":[{"id":0,"texte":"Blanc","q_id":0,"result":1},{"id":1,"texte":"Noir","q_id":0,"result":0}]"totalRep":2} -->

<?php
echo '<pre>';
print_r($totalRep);
echo '</pre>';

echo '<pre>';
print_r($questions_bdd);
echo '</pre>';

echo '<pre>';
print_r($answers_bdd);
echo '</pre>';

