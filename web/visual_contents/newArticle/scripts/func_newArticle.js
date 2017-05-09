

function sendNewArticle(){
	console.log("123");
	var data={
		article:document.getElementById("article").value,
		title : document.getElementById("title").value
	};
	var xhr=new XMLHttpRequest();
	xhr.onreadystatechange=function(){
		if(xhr.readyState==1){
			xhr.send(JSON.stringify(data));
		}
		if(xhr.readyState==4 && xhr.status==200){
			var rst=JSON.parse(xhr.responseText);
			if(rst.actionsuccess){
				window.location="readArticle.html?articleid="+rst.articleid;
			}else{
				alert("failed");
			}
		}
	}
	xhr.open("POST","control_pages/newArticle.php",true);
}