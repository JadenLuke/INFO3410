<?php
include 'lib.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <form onsubmit="return save();" class="form-horizontal" method="POST" action="data.php">
        <fieldset>

        <!-- Form Name -->
        <legend>Form Name</legend>

        <!-- Text input-->
        <div class="form-group">
        <label class="col-md-4 control-label" for="code">Code</label>  
        <div class="col-md-4">
        <input id="code" name="code" type="text" placeholder="Code" class="form-control input-md" required="">
            
        </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
        <label class="col-md-4 control-label" for="name">Name</label>  
        <div class="col-md-4">
        <input id="name" name="name" type="text" placeholder="Name" class="form-control input-md" required="">
            
        </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
        <label class="col-md-4 control-label" for="leve">Level</label>
        <div class="col-md-4">
            <select id="level" name="level" class="form-control">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="6">6</option>
            </select>
        </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
        <label class="col-md-4 control-label" for="credit">Credit</label>
        <div class="col-md-4">
            <select id="credit" name="credit" class="form-control">
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            </select>
        </div>
        </div>

        <!-- Button -->
        <div class="form-group">
        <label class="col-md-4 control-label" for="saveBtn"></label>
        <div class="col-md-4">
            <button id="saveBtn" name="saveBtn" class="btn btn-primary">Save</button>
        </div>
        </div>

        </fieldset>
    </form>


    <script type="text/javascript">
        function save(){
            var code = $("#code").val();
            var name = $("#name").val();
            var credit = $("#credit").val();
            var level = $("#level").val();

            var data = {
                'code' : code,
                'name' : name,
                'credit' : credit,
                'level' : level
            };

            $.post("data.php", data, function(res){
                alert(res);
            });

            console.log(data);

            return false;
        }
    </script>

</body>
</html>