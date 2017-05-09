



window.addEventListener("load",setup);

function setup(){
	var paras=window.location.search;
	var articleid=paras.replace("?","").split("=")[1];
	console.log(articleid);
	var xhr=new XMLHttpRequest();
	xhr.onreadystatechange=function(){
		if(xhr.readyState==1){
			xhr.send();
		}
		if(xhr.readyState==4 && xhr.status==200){
			var rst=JSON.parse(xhr.responseText);
			if(rst.actionsuccess){
				stuffing(rst);
				alert("success");
			}else{
				alert("failed");
			}
		}
	}
	xhr.open("GET","control_pages/getArticle.php?articleid="+articleid,true);
	
	function stuffing(data){
		document.getElementById("title").value=data.title;
		document.getElementById("article").value=data.article;
		document.getElementById("articleid").innerHTML=data.articleid;
		
	}
	
	
}





function sendUpdateArticle(){
	
	var data={
		title : document.getElementById("title").value,
		article:document.getElementById("article").value,
		articleid : document.getElementById("articleid").innerHTML
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
	xhr.open("POST","control_pages/updateArticle.php",true);
}