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
		<title>CBO Management</title>
	</head>
	<body background="background.jpg">

	    <div id="areaA"></div>
	
		<script type="text/javascript" charset="utf-8">
		var form1 = [
			{view:"text",label:"User Name", name:"username", invalidMessage: "Enter Valid User Name"},
			{view:"text", type:"password", label:"Password", name:"password", invalidMessage: "Enter Your Password"},
			{view:"checkbox", hidden:true, name:"accept"},
			{view:"button", value: "Login", align:"center", width: 150, type:"form", click:function(){
				var form1 = this.getParentView();
				if (form1.validate()){
				var values = $$("my_form").getValues();
					//console.log(values);

					webix.ajax("lib.php", values, function(text){
						webix.alert({
									title: "CBO Management",
									text: text,
									type:"alert-error",
									callback: function(){if (text != "Incorrect User Name / Password")window.location.replace ("http://localhost:8080/webix/management.php");}
								});

						});
			}}},
			{view:"label", label:'- or -', align:"center"},
			{view:"button",value: "Sign Up", align:"center", width: 150,click:function(){
				window.location.replace ("http://localhost:8080/webix/signup_page.php");
			}}];


		webix.ui({
			container:"areaA", 
			view:"form", scroll:false, width:350, align:"center",
			id:"my_form",
			elements: form1,
			rules:{
				"username":webix.rules.isNotEmpty,
				"password":webix.rules.isNotEmpty
			},
			elementsConfig:{
				labelPosition:"top",
			}
		});	

		</script>
	</body>
</html>