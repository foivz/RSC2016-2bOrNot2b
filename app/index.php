<?php include 'temp/header.php';?>
<script>
var last_cat;

function listQuizes(el, data) {
	el.find('.panel-body').prepend(data.quiz_title);
	el.click(function() { window.location.href = 'edit_quiz.php#' + data.quiz_id });
}

function listEvents(el, data) { 
	debugger;
	el.find('span').text(data.event_name);
	el.find('i').click(function() {
		window.location.href = 'quiztime.php?qid=' + data.event_id;
	});
}
</script>

<div class="jumbotron">
  <center>
    <h1 aria-level="1" title="Welcome">Welcome to Squizless</h1>
    <p>Your platform for making quizes</p>
    <p>You have full freedom to edit the quiz the way you like</p>
    <p><a class="btn btn-default btn-lg" href="add_quiz.php" role="button" itemprop="url" title="Add new quiz"><i class="fa fa-trophy" aria-hidden="true"></i> Create a new Quiz</a> <a class="btn btn-default btn-lg" href="add_event.php" role="button" itemprop="url" title="Add new event"><i class="fa fa-calendar-o" aria-hidden="true"></i> Create a new Event</a></p>
  </center>
</div>
<div class="col-md-8">
    <div class="page-header">
        <h1 aria-level="1" title="Quizes">Quizes</h1>
    </div>
    <ol class="breadcrumb">
      <li></li>
    </ol>
	<div data-command="home_list_quiz" data-callback="listQuizes">
		<div class="panel panel-default col-md-3" style="margin-right:15px;">
		  <div class="panel-body">
			<i class="fa fa-pencil" aria-hidden="true"></i>
		  </div>
		</div>
	</div>
    
</div>
<div class="col-md-4">
    <div class="page-header">
        <h1 aria-level="1" title="Events">Events</h1>
    </div>
    <ol class="breadcrumb eventlist"  data-command="home_list_events" data-callback="listEvents">
      <li>
		<span>Naziv</span>
		<i class="fa fa-play-circle pull-right fa-2x" aria-hidden="true"></i>
		</li>
    </ol>
    <br />
    <div class="page-header">
      <h1 aria-level="1" title="Statistics">Statistics</h1>
    </div>
	<div data-command="homepage_stat">
    <div class="list-group">
    <a href="#" class="list-group-item" title="Users">
      <h4 class="list-group-item-heading" aria-level="4" title="Users">Users</h4>
      <p class="list-group-item-text">Registered users: <span data-var="user_count" style="font-weight: bold; color: #173955"></span></p>
    </a>
    <a href="#" class="list-group-item" title="Qizzes">
      <h4 class="list-group-item-heading" aria-level="4" title="Quizzes">Qizzes</h4>
      <p class="list-group-item-text">Quizzes created: <span data-var="quiz_count" style="font-weight: bold; color: #173955"></span></p>
    </a>
    <a href="#" class="list-group-item" title="Categories">
      <h4 class="list-group-item-heading" aria-level="4" title="Categories">Categories</h4>
      <p class="list-group-item-text">Number of categories: <span data-var="category_count" style="font-weight: bold; color: #173955"></span></p>
    </a>
	</div>
</div>
</div>

<?php include 'temp/footer.php';?>
