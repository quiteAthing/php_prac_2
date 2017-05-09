
window.addEventListener("onload",setup);

window.xb_rng=0;

function setup(){
	var itemModel=document.getElementById("article_model");
	var container=document.getElementById("article_container");
	request_data(function(data){
		for(var i=0;i<data.length;i++){
			var tmp=itemModel.clone(true);
			tmp.getElementsByTagName("nxx_author").innerHTML=data[i]["alias"];
			container.appendChild(tmp);
		}
	})
	
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
}