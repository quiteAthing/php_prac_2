

function sendRegister(){
	var field_acc=document.getElementById("acc");
	var field_pw=document.getElementById("pw");
	var field_em=document.getElementById("email");
	var field_ali=document.getElementById("alias");
	
	var acc=field_acc.value;
	var pw=field_pw.value;
	var email=field_em.value;
	var alias=field_ali.value;
	field_acc.value="";
	field_pw.value="";
	field_em.value="";
	field_ali.value="";
	var xhr=new XMLHttpRequest();

		
	xhr.onreadystatechange=function(){
		var data={
		"account":acc,
		"password":pw,
		"email":email,
		"alias":alias
		};
		
		if(xhr.readyState==1){xhr.send(JSON.stringify(data));}
		if(xhr.readyState==4 && xhr.status==200)
		var datas=JSON.parse(xhr.responseText);
			if(datas.actionsuccess){
		window.location="index.html";
	}
	
	xhr.open("POST","control_pages/register.php",true);

}