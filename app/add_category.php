<?php include 'temp/header.php';?>

<div class="container-fluid voffset6">
	<div class="container">
    	<div class="row">
        	<div class="col-xs-12">
            	<h1 aria-level="1">Add new quiz category</h1>
            </div>
        </div>
        
		<div class="row">
            <form class="form-horizontal" action="add_category_sql.php" method="post">
            <fieldset>
            
            <!-- Form Name -->
            <legend>Add new quiz category</legend>
            
            <!-- Select Basic -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="selectbasic">Select quiz</label>
              <div class="col-md-4">
                <select id="selectbasic" name="selectbasic" class="form-control" aria-required="true" data-required="true" required="">
                  <option value="1">Quiz name</option>
                </select>
              </div>
            </div>
            
            <!-- Text input-->
            <div class="form-group">
            <label class="col-md-4 control-label" for="categoryname">Category name</label>  
            <div class="col-md-4">
           <input id="categoryname" name="categoryname" placeholder="Enter category name" class="form-control input-md" aria-required="true" data-required="true" required="" type="text">
            <span class="help-block">Enter the question</span>  
            </div>
            </div>
            
            <!-- Button -->
            <div class="form-group">
            <label class="col-md-4 control-label" for="singlebutton">Action</label>
            <div class="col-md-4">
            <button id="singlebutton" name="singlebutton" class="btn btn-primary">Save category</button>
            </div>
            </div>
            
            </fieldset>
            </form>

        </div>

    </div>
</div>

<?php include 'temp/footer.php';?>