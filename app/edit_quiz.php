<?php include("temp/header.php");?>

<div class="jumbotron">
  <center>
    <h1 aria-level="1" title="Edit Quiz">Edit quiz</h1>
  </center>
</div>


<div class="col-md-8">
	<form id="qtitleform" action="update_quiz_general" data-command="get_quiz"  method="post">
		<div class="form-group">
				<label for="qname">Name</label>
			<input data-var="quiz_title" data-attr="value" class="form-control" type="text" id="qname" name="qname" placeholder="Title" aria-required="true" data-required="true" required="">
			<input type="hidden" name="qid" id="qid" />
		</div>
		
		<button type="submit" class="btn btn-success" title="Save">Save</button>
	</form>
</div>
<div class="col-md-4">
	<button type="button" class="btn btn-success" style="float: right" id="addq" title="Add Question"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Question</button>
</div>
<br />
<br />
<div id="questions">
	<div class="col-md-12" id="qbox" style="display: none;">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title" aria-level="3" title="Creating question">Creating question</h3>
			</div>
			<div class="panel-body" style="background-color: white">

				<div class="input-group input-group-lg">
				  <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-question-circle" aria-hidden="true"></i></span>
                  <label for="autor" style="display:none">Author</label>
				  <input name="autor" id="autor" type="text" class="form-control" placeholder="Author" aria-describedby="sizing-addon1" aria-required="true" data-required="true" required="">
				</div>
				<br />
				
                <label for="padajuca">Choose type:</label>
				<select class="padajuca" name="padajuca" id="padajuca" aria-required="true" data-required="true" required="">
				  <option value="" selected="">Choose</option>
				  <option value="single">Single</option>
				  <option value="multiple">Multiple</option>
				</select>

				<br><br>
				
                <label for="negbod" style="display:none">Negativni</label>
                <label for="pozbod" style="display:none">Pozitivni</label>
				<input type="number" name="negbod" id="negbod" aria-required="true" data-required="true" class="required" required="" style="float:right;width:45px;border:1px solid #c9302c"> 
				<input type="number" name="pozbod" id="pozbod" style="float:right;width:45px;margin-right: 4px;border:1px solid #5cb85c" aria-required="true" data-required="true" class="required" required="">
							

				<div class="single box">
					<div class="form-group">
					  <label for="comment">Answer:</label>
					  <textarea class="form-control" rows="2" id="comment" aria-required="true" data-required="true" required=""></textarea>
					</div>
				</div>
				<div class="multiple box">
					<div class="row">
					  <div class="col-md-12" style="margin-bottom: 15px">
						<div class="input-group">
						  <span class="input-group-addon">
							<input type="checkbox" aria-label="..." name="addon" id="addon">
						  </span>
						  <input type="text" class="form-control" aria-label="..." name="ddon" id="ddon" aria-required="true" data-required="true" required="">
						</div><!-- /input-group -->
					  </div><!-- /.col-lg-6 -->

					  <div class="col-md-12" style="margin-bottom: 15px">
						<div class="input-group">
						  <span class="input-group-addon">
							<input type="checkbox" aria-label="..." name="addon2" id="addon2">
						  </span>
						  <input type="text" class="form-control" aria-label="..." name="daddon2" id="daddon2" aria-required="true" data-required="true" required="">
						</div><!-- /input-group -->
					  </div><!-- /.col-lg-6 -->

									  <div class="col-md-12" style="margin-bottom: 15px">
						<div class="input-group">
						  <span class="input-group-addon">
							<input type="checkbox" aria-label="..." name="addon3" id="addon3">
						  </span>
						  <input type="text" class="form-control" aria-label="..." name="ddon3" id="ddon3" aria-required="true" data-required="true" required="">
						</div><!-- /input-group -->
					  </div><!-- /.col-lg-6 -->
					</div><!-- /.row -->
				</div>
			</div>
			<div class="panel-footer">
				<button type="button" class="btn btn-success" title="Add">Add</button>
				<button type="button" class="btn btn-danger" title="Delete">Delete</button>
			</div>
		</div>
	</div>
</div>

<script src="js/editor.js" type="text/javascript"></script>

<?php include("temp/footer.php");?>