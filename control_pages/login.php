<?php
#user 登入
	echo "Hello";
	
	$host_name="localhost";
	$dbname="xblog";
	$username='root';
	$password='';
	$stmt="select if(password=:password,(select userid,alias from memebers where account=:account),null) from members where account=:account;
	
	
	$useracc=$_GET["acc"];
	$userpass=$_GET["pw"];
	$udata="";
	echo "pw = ", (string)$userpass,"  acc= ",(string)$userpass;
	
	try{
		$conn =new PDO("mysql:host=$host_name;dbname=$dbname",$username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$udata=$conn->query($stmt).fetch();
		$conn=null;
	}catch(PDOException $e){
		exit($e->getMessage());
	}
	if($success=!empth($udata)){
		$arr=("loginsuccess" =>$success,"alias"=>$udata["aliaas"],"notification"=>$udata["notification"]);
		echo json_encode($arr);
	}
	else{
		$arr=("loginsuccess" =>$success);
		echo json_encode($arr);
	}
	
	
	
	
	
	
	
?>