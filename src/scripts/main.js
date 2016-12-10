document.addEventListener('DOMContentLoaded', function(){
// 	 $( "#r1" ).click(function() {
//       // var yolo = document.querySelector(".il");
//   	 	responsiveVoice.speak($('#r1').text());
// 	 });
})

{
	"exercice": [
		{
			"question":
				[
				{
					"question_info":
					{"id":0, "texte":"Quelle est la couleur du cheval blanc d'henri huit", "exercice":1}
					,
					"reponse":
					[
						{
							"id":0,"texte":"Blanc","q_id":0,"result":1
						},
						{
							"id":1,"texte":"Noir","q_id":0,"result":0
						}
					]
					"totalRep":2
				},
				{
					"id":1, "texte":"Comment diagonaliser une matrice de couplage d'oscillateur harmonique?", "exercice":1,
					"reponse":
					[
						{
							"id":0,"texte":"J'ai pas appris mon cours","q_id":0,"result":0
						},
						{
							"id":1,"texte":"On cherche les valeures propres puis les vecteurs propres etc","q_id":0,"result":1
						}
					],
					"totalRep":2
				}
				]

		}
	],
	"totalQ":2,
	"totalEx":1
}

//Créer le tableau exercice
	//créer tableau question
		//encoder dans "question_info" les question UNE PAR UNE
		//rajouter tableau réponse
			//encore les réponse qui ont le meme id que la question


echo {"exercice": [{"question":[{"question_info":
echo json_encode($questions[1]);
echo }]}]}



var session;

//Dans la fonction appel en AJAX
session = new Session(JSON.parse(request.responsetext));



//Choisir l'id de l'exo à lancer


/*
Afficher réponse = Parcourir le tableau réponse et afficher dans la div si l'id de question correspond
Ajouter event onclic sur les réponse
*/


var Session = function(resp){
	this.data = resp;
	this.lancer_exo = function(exoId, qId)
	{
		this.afficher_question(exoId qId);
		this.afficher_reponse(exoId, qId);
	}
	this.result = new Array();
	this.qCount = 0;
	this.rand = 0; //Si la session est random

}

session.prototype.afficher_question = function(exoId, qId)
{
	document.getElementById("questionDisplay").innerHTML = this.data.exercice[exoId].question[qId].texte;
}


session.prototype.launch_random


session.prototype.clickRep = function(aId, qId, exoId)
{
	if(this.data.exercice[exoId].question[qId].reponse[aId].result == 1){
		this.result.push(qId);
	}
	this.qCount++;
	//Enlever les event onclick
	if(qCount == data.totalQ){
		this.finir();
	}
	else{
		if(!this.random)
		{
			if(qId == this.data.exercice[exoId].question.length-1)
				this.lancer_exo(exoId+1,0);
			}
			else{
				this.lancer_exo(exoId,qId+1);
			}
		}
		else
		{
			this.launch_random();
		}
	}
}