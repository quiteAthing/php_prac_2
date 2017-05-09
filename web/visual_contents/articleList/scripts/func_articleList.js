
window.addEventListener("load",setup);

window.xb_rng=0;

function setup(){
	
	var itemModel=document.getElementById("article_model");
	var href=itemModel.getElementsByClassName("nxx_title")[0].getAttribute("href");
	console.log(href+"aaaaa");
	var container=document.getElementById("article_container");
	request_data(function(data){
		console.log(data.length);
		for(var i=0;i<data.length;i++){
			var tmp=itemModel.cloneNode(true);
			tmp.setAttribute("id","");
			console.log("asd"+data[i]["alias"]);
			tmp.getElementsByClassName("nxx_title")[0].setAttribute("href",href+data[i]["articleid"]);
			tmp.getElementsByClassName("nxx_author")[0].innerHTML=data[i]["alias"];
			tmp.getElementsByClassName("nxx_title")[0].innerHTML=data[i]["title"];
			tmp.getElementsByClassName("nxx_lastupdate")[0].innerHTML=data[i]["lastupdate"]+"v";
			tmp.getElementsByClassName("nxx_submitted")[0].innerHTML=data[i]["submitted"];
			tmp.style.display="block";
			container.appendChild(tmp);
		}
	});
	
	
	
}


function request_data(cbf){
	var xhr=new XMLHttpRequest();
	
	xhr.onreadystatechange=function(){
		switch(xhr.readyState){
			case 1:xhr.send("?rngstart="+xb_rng);break;
			case 4:if(xhr.status==200 && xhr.readyState==4){
					data=JSON.parse(xhr.responseText);
					cbf(data);
			}break;
			
		}
	}
	
	xhr.open("GET","control_pages/article_list.php",true);
}