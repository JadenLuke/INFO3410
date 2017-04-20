<!-- Bootstrap Form Builder -->
<html lang="en">
  <head>
        <meta charset="utf-8">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

    </head>

  <body>
      <div class="container">
          <h1 class="text-muted">Add Course</h1>
      </div>
      <legend></legend>
      <div class="container">
        
       <form class="form-horizontal" method="POST" action="data.php">
            <fieldset>
            

            
            <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Code</label>  
            <div class="col-md-4">
            <input id="code" name="code" type="text" placeholder="Enter Code" class="form-control input-md"> 
            </div>
            </div>

            
            <div class="form-group">
            <label class="col-md-4 control-label">Name</label>  
            <div class="col-md-4">
            <input id="name" name="name" type="text" placeholder="Enter Course Name"class="form-control input-md">  
            </div>
            </div>

            
            <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Credit</label>  
            <div class="col-md-4">
            <input id="credit" name="credit" type="number" placeholder="Enter Credit" class="form-control input-md"> 
            </div>
            </div>

            
            <div class="form-group">
            <label class="col-md-4 control-label">Level</label>  
            <div class="col-md-4">
            <select id="level" name="level" class="form-control input-md">
                      <option value = '1'>1</option>
                      <option value = '2'>2</option>
                      <option value = '3'>3</option>
                      <option value = '6'>6</option>
            </select>
            </div>
            </div>


           <!-- Button -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="singlebutton"></label>
            <div class="col-md-4">
              <button id="singlebutton" type="submit" name="singlebutton" class="btn btn-primary">Submit</button>
            </div>
          </div>

            </fieldset>
        </form>

      </div>
    </div> <!-- /container -->
  </body>
</html>
