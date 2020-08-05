$(document).ready(function(){
	
	var userReg=/^\w{5,10}$/;
	var passReg=/^\())/g;
	$("#user").keyup(function(){
		if(userReg.test($(this).val())!=true){
			$(this).css("border-bottom","1px solid red");
		}else{
			$(this).css("border-bottom","1px solid #fff");
		}
	});
	
	$("#pass").keyup(function(){
		if(passReg.test($(this).val())!=true){
			$(this).css("border-bottom","1px solid red");
		}else{
			$(this).css("border-bottom","1px solid #fff");
		}
	});
	
	$("#submit").click(function(){
		if(($("#user").val()=="") || ($("#pass").val()=="")){
			
		}
	});
	
	
	
});
	
