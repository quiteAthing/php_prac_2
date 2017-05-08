
window.addEventListener("onload",setup);

function setup(){
	var paras=window.location.search;
	var articleid=paras.substr("?")[1].split(=)[1];
	console.log(articleid);
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
	xhr.open("GET","http://localhost/php_prac_2_dep/control_pages/getArticle.php?articleid="+articleid,true);
	
	
}
