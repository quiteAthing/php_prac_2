

function sendLogin(){
	var field_acc=document.getElementById("acc");
	var field_pw=document.getElementById("pw");
	var acc=filed_acc.value;
	var pw=field_pw.value;
	field_acc.value="";
	field_pw.value="";
	var xhr=new XMLHttpRequest();

	xhr.onreadystatechange=function(){
		if(xhr.readyState==4 && xhr.status==200)
		var data=JSON.parse(xhr.responseText);
		document.getElementById("nx_logged_out").style.display="none";
		document.getElementById("nx_logged_in").style.display="block";
		document.getElementById("username").innerHTML=data.username;
	}
	
	xhr.open("GET","http://localhost:8888/php_prac_2/login.php?acc="+acc+"&pw="+pw,true);

}