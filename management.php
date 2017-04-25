<!DOCTYPE html> 
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <title>CBO Management</title>

        <link rel="stylesheet" href="bower_components/webix/codebase/webix.css" type="text/css" media="screen" charset="utf-8">
        <script src="bower_components/webix/codebase/webix.js" type="text/javascript" charset="utf-8"></script>

       
		<style>
			#testD{
				margin: 50px;
				margin-top: 170px;
			}
		</style>
    </head>
    <body background="background.jpg">
        
		<div id="testD"><div class='sample_comment'>- Click On Any Header To Sort Table -</div>
        <div class='sample_comment'>- Click On Any Row To Edit In Form -</div><hr></div>
		

        <script type="text/javascript" charset="utf-8">
        <?php

            require 'lib.php';
            if(isset($_SESSION["type"]))
            {
                if ($_SESSION["type"] == "Administrator")  
                {

                    echo "
                        webix.ready(function(){


                            var grida = {
                                view:\"datatable\", id:\"datatable1\",
                                columns:[
                                    { id:\"data0\",hidden:true,	editor:\"textarea\",header:[\"ID\", {content:\"textFilter\"}],adjust:true, hidden:true,	sort:\"string\"},
                                    { id:\"data1\", editor:\"text\",header:[\"User Name\", {content:\"textFilter\", placeholder:\"Search ->\"}],adjust:true, width:110,	sort:\"string\"},
                                    { id:\"data2\", editor:\"text\",header:[\"Organization\", {content:\"textFilter\"}],adjust:true,	sort:\"string\"},
                                    { id:\"data3\",	editor:\"text\",header:[\"Account Type\", {content:\"textFilter\"}], sort:\"string\"}],
                                   
                                select:true,
                                autoheight:true,
                                autowidth:true,

                                datatype:\"jsarray\",
                                data:[
                    ";


                    global $conn;
                    $sql = "SELECT `id`, `username`, `organization`, `type` FROM `users`";
                    $res = $conn->query($sql);
	    		    $row = $res->fetch_assoc();
				    echo "[\"". $row['id'] . "\",\"" . $row['username'] . "\",\"" . $row['organization'] . "\",\"" . $row['type']. "\"]";
                    
                    while (($row = $res->fetch_assoc()) != null)
                    {         
                        echo ",[\"". $row['id'] . "\",\"" . $row['username'] . "\",\"" . $row['organization'] . "\",\"" . $row['type']. "\"]";
                    
                    }
                
                    echo "
                    ]};	
                    ";

                    
                    echo "
                            var form = {
                                view:\"form\", id:\"form1\", scroll:false, width:300,
                                elements:[
                                    { view:\"text\",hidden:true, name:\"data0\", label:\"ID\"},
                                    { view:\"text\", name:\"data1\", label:\"User Name\", invalidMessage: \"Enter User Name\" },
                                    { view:\"text\", name:\"data2\", label:\"Organization\", invalidMessage: \"Select Organization\" },
                                   { view:\"select\", name:\"data3\", label:\"Type\", options:[\"Administrator\", \"Editor\", \"Viewer\"]},

                                    { view:\"button\", value:\"Update\",align:\"center\", width: 150, click:function(){
                                        var form1 = this.getParentView();
				                        if (form1.validate()){
                                                
                                                var values = $$(\"form1\").getValues();
                                                values[\"accept\"] = 2;
                                                console.log(values);
                                                webix.ajax(\"edit.php\", values, function(text){  
                                                webix.alert({
                                                    title: \"CBO Management\",
                                                    text: text,
                                                    type:\"alert-error\",
                                                    callback: function(){if(text != \"Unable To Sign Up\") location.reload();}
                                                });
                                              });
                                            }



                                    }}],
                                    rules:{
                                    \"data1\": webix.rules.isNotEmpty,
                                    \"data2\": webix.rules.isNotEmpty,
                                    \"data3\": webix.rules.isNotEmpty
                                    },
                                    elementsConfig:{
                                            labelPosition:\"top\"
                                        }

                            };
                    ";




                    echo "
                    webix.ui({ 
                                container:\"testD\",
                                type:\"space\",
                                cols:[ grida, form ],

                            });
                            $$('form1').bind('datatable1')
                    });";


                    



                }   
                else if ($_SESSION["type"] == "Editor") //UPDATE `members` SET `fname` = 'Paula', `sex` = 'Female' WHERE `members`.`id` = 5;
                {
                    //hidden:true,
                    echo "
                        webix.ready(function(){


                            var grida = {
                                view:\"datatable\", id:\"datatable1\",
                                columns:[
                                    { id:\"data0\",hidden:true,	editor:\"textarea\",header:[\"ID\", {content:\"textFilter\"}],adjust:true, hidden:true,	sort:\"string\"},
                                    { id:\"data1\", editor:\"text\",header:[\"First Name\", {content:\"textFilter\", placeholder:\"Search ->\"}],adjust:true,	sort:\"string\"},
                                    { id:\"data2\", editor:\"text\",header:[\"Last Name\", {content:\"textFilter\"}],adjust:true,	sort:\"string\"},
                                    { id:\"data3\",	editor:\"text\",header:[\"D.O.B\", {content:\"textFilter\"}], sort:\"string\"},
                                    { id:\"data4\",	editor:\"text\",header:[\"Sex\" , {content:\"selectFilter\"}], width:100, sort:\"string\"},
                                    { id:\"data5\",	editor:\"text\",header:[\"Contact #\", {content:\"textFilter\"}], 	width:110,	sort:\"int\"},
                                    { id:\"data6\",	editor:\"text\",header:[\"Address\", {content:\"textFilter\"}], 	adjust:true, sort:\"string\"}],
                                
                                select:true,
                                autoheight:true,
                                autowidth:true,

                                datatype:\"jsarray\",
                                data:[
                    ";


                    global $conn;
                    $sql = "SELECT `id`, `fname`, `lname`, `dob`, `sex`, `number`, `address` FROM `members` WHERE `organization` = \"" . $_SESSION["organization"] . "\"";
                    $res = $conn->query($sql);
	    		    $row = $res->fetch_assoc();
				    echo "[\"". $row['id'] . "\",\"" . $row['fname'] . "\",\"" . $row['lname'] . "\",\"" . $row['dob'] . "\",\"" . $row['sex'] . "\"," . $row['number'] . ",\"" . $row['address'] . "\"]";
                    
                    while (($row = $res->fetch_assoc()) != null)
                    {         
                        echo ",[\"". $row['id'] . "\",\"" . $row['fname'] . "\",\"" . $row['lname'] . "\",\"" . $row['dob'] . "\",\"" . $row['sex'] . "\"," . $row['number'] . ",\"" . $row['address'] . "\"]";
                    
                    }
                
                    echo "
                    ]};	
                    ";

                    
                    echo "
                            var form = {
                                view:\"form\", id:\"form1\", scroll:false, width:300,
                                elements:[
                                    { view:\"text\",hidden:true, name:\"data0\", label:\"ID\"},
                                    { view:\"text\", name:\"data1\", label:\"First Name\", invalidMessage: \"Enter First Name\" },
                                    { view:\"text\", name:\"data2\", label:\"Last Name\", invalidMessage: \"Enter Last Name\" },
                                    { view:\"datepicker\", name:\"data3\", label:\"D.O.B\" , invalidMessage: \"Enter D.O.B\", stringResult:true },
                                    { view:\"select\", name:\"data4\", label:\"Sex\", options:[\"Male\", \"Female\"]},
                                    { view:\"text\", name:\"data5\", label:\"Contact #\", invalidMessage: \"Enter Contact #\" },
                                    { view:\"textarea\", name:\"data6\", label:\"Address\", invalidMessage: \"Enter Address\" },

                                    { view:\"button\", value:\"Update\",align:\"center\", width: 150, click:function(){
                                        var form1 = this.getParentView();
				                        if (form1.validate()){
                                                
                                                var values = $$(\"form1\").getValues();
                                                values[\"accept\"] = 3;
                                                console.log(values);
                                                webix.ajax(\"edit.php\", values, function(text){  
                                                webix.alert({
                                                    title: \"CBO Management\",
                                                    text: text,
                                                    type:\"alert-error\",
                                                    callback: function(){if(text != \"Unable To Sign Up\") location.reload();}
                                                });
                                              });
                                            }



                                    }}],
                                    rules:{
                                    \"data1\": webix.rules.isNotEmpty,
                                    \"data2\": webix.rules.isNotEmpty,
                                    \"data3\": webix.rules.isNotEmpty,
                                    \"data4\": webix.rules.isNotEmpty,
                                    \"data5\": webix.rules.isNotEmpty
                                    },
                                    elementsConfig:{
                                            labelPosition:\"top\"
                                        }

                            };
                    ";




                    echo "
                    webix.ui({ 
                                container:\"testD\",
                                type:\"space\",
                                cols:[ grida, form ],

                            });
                            $$('form1').bind('datatable1')
                    });";


                    
                    }  

                else //$_SESSION["type"] == "Viewer"
                {
                    echo "
                        webix.ready(function(){
                            
                            grida = webix.ui({
                                container:\"testD\",
                                view:\"datatable\",
                                columns:[
                                    { id:\"data0\",	header:[\"Name\", {content:\"textFilter\", placeholder:\"Search Name\"}],adjust:true,	sort:\"string\"},
                                    { id:\"data1\",	header:[\"D.O.B\", {content:\"textFilter\"}], sort:\"string\"},
                                    { id:\"data2\",	header:[\"Sex\" , {content:\"selectFilter\"}], width:100, sort:\"string\"},
                                    { id:\"data3\",	header:[\"Contact #\", {content:\"textFilter\"}], 	width:110,	sort:\"int\"},
                                    { id:\"data4\",	header:[\"Address\", {content:\"textFilter\"}], 	adjust:true, sort:\"string\"}],
                                
                                autoheight:true,
                                autowidth:true,

                                datatype:\"jsarray\",
                                data:[
                                    //object to json array
                    ";


                    global $conn;
                    $sql = "SELECT `fname`, `lname`, `dob`, `sex`, `number`, `address` FROM `members` WHERE `organization` = \"" . $_SESSION["organization"] . "\"";
                    $res = $conn->query($sql);
	    		    $row = $res->fetch_assoc();
				    echo "[\"" . $row['fname'] . " " . $row['lname'] . "\",\"" . $row['dob'] . "\",\"" . $row['sex'] . "\"," . $row['number'] . ",\"" . $row['address'] . "\"]";
                    
                    while (($row = $res->fetch_assoc()) != null)
                    {         
                       echo ",[\"" . $row['fname'] . " " . $row['lname'] . "\",\"" . $row['dob'] . "\",\"" . $row['sex'] . "\"," . $row['number'] . ",\"" . $row['address'] . "\"]";
                    
                    }
                    $conn->close(); 
                
                    echo "]
                            });	
                        });
                    ";
                    }

                }
                else
                    echo "webix.alert({
                            title: \"Login Required\",
                            text: \"You must be logged in to view page.\",
                            type:\"alert-error\",
                            callback: function(){window.location.replace (\"http://localhost:8080/webix/login.php\");}});
                    ";
                ?>

                  </script>
  </body>
</html>


