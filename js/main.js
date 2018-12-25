$(function(){
	//For user registration
	$('#regi_submit').click(function(){
      var username = $("#username").val();
      var email = $("#email").val();
      var first_pass = $("#first_pass").val();
      var con_pass = $("#con_pass").val();
      var datastring = 'username='+username+'&email='+email+'&first_pass='+first_pass+'&con_pass'+con_pass;
      $.ajax({
      	type:"POST",
      	url:"getRegister.php",
      	data:datastring,
      	success:function(data){
           $("#state").html(data);
      	}
      });
       return false;
	});
});