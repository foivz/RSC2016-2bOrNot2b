<?php include 'temp/header.php';?>

<script>
function populateQuizList(el, data) {
		el.attr('value', data.quiz_id);
		el.text(data.quiz_title);
}
</script>
<div class="jumbotron">
  <center>
    <h1 aria-level="1" title="Add new event">Add new event</h1>
  </center>
</div>


<div class="col-md-12">
    <div class="row">
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Uspjesno!</strong> Text
        </div>
    </div>
</div>

<div class="col-md-12">  
        
    <div class="row">
        <form class="form-horizontal" action="add_event" method="post">
        <fieldset>

        <!-- Text input-->
        <div class="form-group">
        <label class="col-md-4 control-label" for="etitle">Event Title</label>  
        <div class="col-md-4">
       <input id="etitle" name="etitle" placeholder="Enter title" class="form-control input-md" aria-required="true" data-required="true"  required="" type="text">
        <span class="help-block">Enter the title</span>  
        </div>
        </div>
        
        <!-- Textarea -->
        <div class="form-group">
        <label class="col-md-4 control-label" for="description">Description/How to</label>
        <div class="col-md-4">                     
        <textarea class="form-control" id="description" name="description" textarea="Enter quiz description" aria-required="true" data-required="true" required=""></textarea>
        </div>
        </div>
        
        <!-- Select Basic -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="eventtype">Select event type</label>
          <div class="col-md-4">
            <select id="eventtype" name="eventtype" class="form-control" aria-required="true" data-required="true" required="">
              <option value="pfe">Points for everyone</option>
              <option value="wta">Winner takes it all</option>
            </select>
          </div>
        </div>
        
        <!-- Select Basic -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="qselect">Select quiz</label>
          <div class="col-md-4">
            <select data-callback="populateQuizList" data-command="list_quizes" id="qselect" name="qselect" class="form-control" aria-required="true" data-required="true" required="">
              <option></option>
            </select>
          </div>
        </div>
        
        <!-- Select Basic -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="publicevent">Public event?</label>
          <div class="col-md-4">
            <select id="publicevent" name="publicevent" class="form-control" aria-required="true" data-required="true" required="">
              <option value="0">No</option>
              <option value="1">Yes</option>
            </select>
          </div>
        </div> 
		
		<!-- Select Basic -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="teamevent">Allow teams?</label>
          <div class="col-md-4">
            <select id="teamevent" name="teamevent" class="form-control" aria-required="true" data-required="true" required="">
              <option value="0">No</option>
              <option value="1">Yes</option>
            </select>
          </div>
        </div>
        
        <!-- Text input-->
        <div class="form-group">
        <label class="col-md-4 control-label" for="edate">Date</label>  
        <div class="col-md-4">
       <input id="edate" name="edate" placeholder="Enter date" class="form-control input-md" type="text" aria-required="true" data-required="true" required="">
        <span class="help-block">Enter the date</span>  
        </div>
        </div>
        
        <!-- Textarea 
        <div class="form-group">
        <label class="col-md-4 control-label" for="gmaps">Map location</label>
        <div class="col-md-4">                     
        <textarea class="form-control" id="gmaps" name="gmaps">Google Maps code</textarea>
        </div>
        </div>
        -->
        <!-- Button -->
        <div class="form-group">
        <label class="col-md-4 control-label" for="singlebutton">Action</label>
        <div class="col-md-4">
        <button id="singlebutton" name="singlebutton" class="btn btn-primary">Next step</button>
        </div>
        </div>
        
        </fieldset>
        </form>

    </div>
</div>

<?php include 'temp/footer.php';?>