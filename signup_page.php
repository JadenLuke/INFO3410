<html>
	<head>
		<link rel="stylesheet" href="bower_components/webix/codebase/webix.css" type="text/css" media="screen" charset="utf-8">
        <script src="bower_components/webix/codebase/webix.js" type="text/javascript" charset="utf-8"></script>
		<style>
			#areaA{
				margin: 50px;
				margin-top: 170px;
			}
		</style>
		<title>Sign Up</title>
	</head>

	<body background="background.jpg">	

	<div id="areaA"></div>
	
  <script type="text/javascript" charset="utf-8">
	
  var form1 = [
    {view:"text",label:"User Name", name:"username", invalidMessage: "Enter Valid User Name"},
    {view:"select",label:"Organisation", name:"organisation",options:[
		<?php
                $conn = new mysqli("localhost", "cbo", "pass", "cbo");
                $sql = "SELECT `organization` FROM `members` GROUP BY `organization`";
                $res = $conn->query($sql);
				$row = $res->fetch_assoc();
				echo "\"" . $row['organization'] . "\"";
                while (($row = $res->fetch_assoc()) != null)
                {         
                    echo ", \"" . $row['organization'] . "\"";
                }
                $conn->close();
        ?>
	]},
    {view:"text", type:"password", label:"Password", name:"password", invalidMessage: "Enter Four Character Password"},
    {view:"text", type:"password", label:"Password Confirmation", name:"password2", invalidMessage: "Password Must Be Confirmed"},
	{view:"checkbox", labelRight:'I accept terms of use', name:"accept", invalidMessage:"Must Be Checked" },
    {view:"button", value:"Sign Up" , align:"center", width: 150, type:"form", click:function(){
				var form1 = this.getParentView();
				if (form1.validate()){
					//webix.alert("User Created!");
					var values = $$("my_form").getValues();
					console.log(values);



					webix.ajax("lib.php", values, function(text){
						//show server side response
						webix.alert({
									title: "CBO Management",
									text: text,
									type:"alert-error",
									callback: function(){if(text != "Unable To Sign Up") window.location.replace ("http://localhost:8080/webix/index.php");}
								});
						
							
						
						
					});
					
				
					//create management.php to only display user type from session (check assignment 2 to send data)
					//edit login page to encrypt pword 
					//create Session with user type if sucessful and forward to management.php  
				

					//set background & logo
				}}
		}];

webix.ui({
			container:"areaA",
			view:"form", scroll:false, width:350, align:"center",
			id:"my_form",
			elements: form1,
			rules:{
				"username": webix.rules.isNotEmpty,
				"password": webix.rules.isNotEmpty,
				"password2": webix.rules.isNotEmpty,
				"accept": webix.rules.isChecked,

				$obj:function(data){
					//password must not be empty
					if (data.password.length != 4){
						webix.alert("Password Must Be Four Characters Long");
						return false;
					}
					//passwords must be equal
					if (data.password != data.password2){
						webix.alert("Passwords Do Not Match"); 
						return false;
					}
					return true;
				}
			},
			elementsConfig:{
				labelPosition:"top"
			}
		});	



	
  </script>

  
  <?php 
  
  
  
  ?>

  </body>
  </html>