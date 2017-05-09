

function sendRegister(){
	var field_acc=document.getElementById("acc");
	var field_pw=document.getElementById("pw");
	var field_em=document.getElementById("email");
	
	var acc=field_acc.value;
	var pw=field_pw.value;
	var email=field_em.value;
	field_acc.value="";
	field_pw.value="";
	field_em.value="";
	var xhr=new XMLHttpRequest();


	xhr.onreadystatechange=function(){
		var data={
		"account":acc,
		"password":pw,
		"email":email
		};
		
		if(xhr.readyState==1){xhr.send(JSON.stringify(data));}
		if(xhr.readyState==4 && xhr.status==200)
		var data=JSON.parse(xhr.responseText);
		document.getElementById("nx_logged_out").style.display="none";
		document.getElementById("nx_logged_in").style.display="block";
		document.getElementById("username").innerHTML=data.alias;
	}
	
	xhr.open("POST","http://localhost/php_prac_2_dep/control_pages/register.php",true);

}