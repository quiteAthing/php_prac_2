
window.addEventListener("load",setup);

function setup(){
	fetch_userdata();
	populate_articles();
}

function populate_articles(){
		var container=document.getElementById("article_list");
		request_data(function(data){
		for(var i=0;i<data.length;i++){
			var row=container.insertRow(i+1);
			row.insertCell(0).appendChild(setTitle([data[i]["articleid"],data[i]["title"]]));
			row.insertCell(1).appendChild(setMisc(data[i]["alias"]));
			row.insertCell(2).appendChild(setMisc(data[i]["submitted"]));
			row.insertCell(3).appendChild(setMisc(data[i]["lastupdate"]));
			row.insertCell(4).appendChild(setDelButton(["刪除",data[i].articleid]));
			row.insertCell(5).appendChild(setEdit(data[i]["articleid"]));
		}
	});
	
	function setTitle(data){
			var title=document.createElement("a");
			title.setAttribute("href","readArticle.html?articleid="+data[0]);
			title.innerHTML=data[1];
			return title;
	}
	
	function setMisc(data){
			var content=document.createElement("a");
			content.innerHTML=data;
			return content;
	}
	
	function setEdit(data){
		var edit=document.createElement("a");
		edit.innerHTML="編輯";
		edit.setAttribute("href","editArticle.html?articleid="+data);
		return edit;
	}
	
	function setDelButton(data){
			var btn=document.createElement("input");
			btn.setAttribute("type","button");
			btn.value=(data[0]);
			btn.name=data[1];
			btn.addEventListener("click",function(){
				var xhr=new XMLHttpRequest();
				xhr.onreadystatechange=function(){
					switch(xhr.readyState){
						case 1: xhr.send();break;
						case 4: 
							if(xhr.status==200){
								var rst=JSON.parse(xhr.responseText);
									if(rst["actionsuccess"]){
										location.reload();
									}
									else{
										window.location="index.html";
									}
								}break;
							}
						
						
						
			}
			var aid=this.getAttribute("name");
			xhr.open("GET","control_pages/delete_article.php?articleid="+aid,"");
			
				

				
			});
			return btn; 
			}
		
	}
	
	function request_data(cbf){
	var xhr=new XMLHttpRequest();
	xhr.onreadystatechange=function(){
		switch(xhr.readyState){
			case 1:xhr.send();break;
			case 4:if(xhr.status==200 && xhr.readyState==4){
					data=JSON.parse(xhr.responseText);
					cbf(data);
			}break;
			
		}
	}
	xhr.open("GET","control_pages/my_article_list.php",true);
	}
	
	



function fetch_userdata(){
	
	request_data(function(){
			document.getElementById("memberAlias").innerHTML=data.alias;
	});
	
	
	function request_data(cbf){
		var xhr=new XMLHttpRequest();
		xhr.onreadystatechange=function(){
		switch(xhr.readyState){
			case 1:xhr.send();break;
			case 4:if(xhr.status==200 && xhr.readyState==4){
					data=JSON.parse(xhr.responseText);
					cbf(data);
			}break;
			
		}
	}
	xhr.open("GET","control_pages/memberData.php",true); 
	}
	
}
