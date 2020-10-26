$(function(){

	//Using ajax to creat new user without refreash :) 

	$(".creat").click(function(){
	
		//taking the value from the field 
	
		var name       = $("#name").val();
	
		var uname      = $("#uname").val();
	
		var pass       = $("#pass").val();
	
		var email      = $("#email").val();

		//putting the data in a data string like array  
	
		//to pass them all with ajax
	
		var datastring = 'name='+name+'&uname='+uname+'&pass='+pass+'&email='+email;

		//ajax for creat new user
	
		$.ajax({

			type: "POST",
	
			url:  "creatuser.php",
	
			data: datastring,
	
			success:function(data){

				$("#retval").html(data);
			
			}

		});

		return false;
	
	});

	//Using ajax to log the user in without refreash :) 

	$("#log").click(function(){
	
		//taking the value from the field 
	
		var email = $("#user_name").val();
	
		var pass = $("#pass").val();

		//putting the data in a data string like array  

		//to pass them all with ajax
		var key = "login";
		var datastring = 'email='+email+'&pass='+pass+'&key='+key;

		//ajax for login the user

		$.ajax({

			type: "GET",
			
			url:  "classes/api.php",
			
			data: datastring,
			
			success:function(data){
				if ($.trim(data) == "empty") {
					$(".empty").show();
				}else if($.trim(data) == "disable"){
					$(".disable").show();
				}else if($.trim(data) == "error"){
					$(".error").show();
				} else if($.trim(data) == "done"){
					window.location ="index.php";
				}
			}

		});

		return false;
	
	});

});
