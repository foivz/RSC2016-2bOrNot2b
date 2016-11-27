<?php include 'temp/header.php';?>
<script>
	function populateCategoryList(node, data) {
		node.attr('value', data.category_id);
		node.text(data.category_name);
		
	}
</script>
<div class="jumbotron">
  <center>
    <h1 aria-level="1">Add new quiz</h1>
  </center>
</div>

<div class="col-md-12">
    <div class="row">
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close" title="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Uspjesno!</strong> Text
        </div>
    </div>
</div>

<div class="col-md-12">        
    <div class="row">
        <form class="form-horizontal" action="add_quiz" method="post" name="addquiz">
        <fieldset>
        <!-- Select Basic -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="category" title="Select category">Select category type</label>
          <div class="col-md-4">
            <select data-callback="populateCategoryList" aria-required="true" data-required="true" required="" data-command="list_categories" id="category" name="category" class="form-control">
              <option>			
			  </option>
            </select>
			
          </div>
        </div>
        
        <!-- Text input-->
        <div class="form-group">
        <label class="col-md-4 control-label" for="qtitle" title="Quiz title">Quiz Title</label>  
        <div class="col-md-4">
       <input id="qtitle" name="qtitle" placeholder="Enter title" class="form-control input-md" aria-required="true" data-required="true" required="" type="text">
        <span class="help-block">Enter the title</span>  
        </div>
        </div>
        
        <!-- Text input-->
        <div class="form-group">
        <label class="col-md-4 control-label" for="qtitle">Date picker</label>  
        <div class="col-md-4">
         <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" aria-required="true" data-required="true" required="" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
        </div>
        
       
        
        </div>
        
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