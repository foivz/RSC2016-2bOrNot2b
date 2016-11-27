$(function() {
	$questionbox = $('#qbox');
	$quizid = window.location.hash
	$('#qid').val($quizid);
	
	$('#addq').click(function() {
		$newbox = $questionbox.clone();
		
		//apiCall('add_quiz_question', 'get', { qtext: 'Your question here', quiz: $quizid, after: 0} );
		
		$newbox.appendTo('#questions').show();
	})
});
