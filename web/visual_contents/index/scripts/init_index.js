
window.addEventListener("load",setup);

function setup(){
	populate_articles();
	fetch_userdata();
	
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
	xhr.open("GET","control_pages/article_list.php",true);
}
	
	
}

function logout(){
	var xhr=new XMLHttpRequest();
	xhr.onreadystatechange=function(){
		if(xhr.readyState==1){xhr.send();}
		if(xhr.readyState==4&& xhr.status==200){
			location.reload();
		}
	};
	xhr.open("GET","control_pages/logout.php",true);

	
	
}


function sendLogin(){
	var field_acc=document.getElementById("acc");
	var field_pw=document.getElementById("pw");
	var acc=field_acc.value;
	var pw=field_pw.value;
	field_acc.value="";
	field_pw.value="";
	var xhr=new XMLHttpRequest();

	xhr.onreadystatechange=function(){
		if(xhr.readyState==1){xhr.send();}
		if(xhr.readyState==4 && xhr.status==200){
		var data=JSON.parse(xhr.responseText);
		document.getElementById("nx_logged_out").style.display="none";
		document.getElementById("nx_logged_in").style.display="block";
		document.getElementById("username").innerHTML=data.alias;
		}
	
	}
	var urlWithParam="control_pages/login.php?acc="+acc+"&pw="+pw;
	xhr.open("GET",urlWithParam,true);
}


function fetch_userdata(){
	
	request_data(function(data){
		if(data.querysuccess){
			document.getElementById("nx_logged_out").style.display="none";
			document.getElementById("nx_logged_in").style.display="block";
			document.getElementById("username").innerHTML=data.alias;
			}
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

