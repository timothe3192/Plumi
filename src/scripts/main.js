$(document).ready(function() {

    var Session = function(exo) {
    	var self = this;
        this.displayQuestion = $('.question');
        this.displayAnswers = $('.answers');
        this.nextQuestionElement = $('.next-question');
        this.nextQuestionElement.click(function(){
        	self.next_question();
        });
        this.result = new Array();
        this.exercice = exo;
        this.qCount = 0;
        this.rand = 0; //Si la session est random
    }

    Session.prototype.get_exercice_data = function(url)
    {
    	var self = this;
    	return $.ajax({
    		method:'GET',
    		url: url,
    		success: function(data)
    		{
    			console.log(data);
    			self.data = JSON.parse(data);
    		}
    	});
    }

    Session.prototype.get_question = function(exoId, questionId) {
    	console.log(this.data);
        return this.data.exercice[exoId].question[questionId].question_info.texte;
    }

    Session.prototype.get_answer = function(exoId, questionId, answerId, result) {
        return this.data.exercice[exoId].question[questionId].reponse[answerId].texte;
    }

    Session.prototype.show_question = function(exoId, questionId) {
        this.displayQuestion.text(this.get_question(exoId, questionId)+'');
    }

    Session.prototype.show_answers = function(exoId, questionId) {
        var numberOfAnswers = this.data.exercice[exoId].question[questionId].reponse.length;
        for (var i = 0; i < numberOfAnswers; i++) {
            this.displayAnswers.append('<button class="answer">' + this.get_answer(exoId, questionId, i) + '</button>');-
        }
    }

    Session.prototype.clean_answers = function() 
    {
    	this.displayAnswers.html('');
    }

    Session.prototype.next_question = function() 
    {
    	this.clean_answers();
    	this.qCount +=1;
    	this.show_question(this.exercice, this.qCount);
    	this.show_answers(this.exercice, this.qCount);
    }

    Session.prototype.check_question = function()
    {
    	console.log('toto');
    }

    var sessionExo1 = new Session(0);
    sessionExo1.get_exercice_data('exercice-1.php').done(
	    function() {
	    	sessionExo1.show_question(0,0);
	    	sessionExo1.show_answers(0,0);
	    }
    );

});

// // 	 $( "#r1" ).click(function() {
// //       // var yolo = document.querySelector(".il");
// //   	 	responsiveVoice.speak($('#r1').text());
// // 	 });