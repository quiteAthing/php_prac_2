

function sendNewArticle(){
	console.log("123");
	var data={
		article:document.getElementById("article").value
	};
	var xhr=new XMLHttpRequest();
	xhr.onreadystatechange=function(){
		if(xhr.readyState==1){
			xhr.send(JSON.stringify(data));
		}
		if(xhr.readyState==4 && xhr.status==200){
			var rst=JSON.parse(xhr.responseText);
			if(rst.actionsuccess){
				alert("success");
			}else{
				alert("failed");
			}
		}
	}
	xhr.open("POST","http://localhost/php_prac_2_dep/control_pages/newArticle.php",true);
}