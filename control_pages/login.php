<?php
#user 登入
	header("Access-Control-Allow-Origin: *");
	
	$host_name="localhost";
	$dbname="xblog";
	$username='root';
	$password='';
	
	
	$useracc=$_GET["acc"];
	$userpass=$_GET["pw"];
	$udata="";
	$stmt="select alias,memberid,password from members where memberid=1";
	
	try{
		$conn =new PDO("mysql:host=$host_name;dbname=$dbname",$username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$udata=$conn->query($stmt)->fetch();
		$conn=null;
	}catch(PDOException $e){
		exit($e->getMessage());
	}
	if($success= !is_bool($udata)){
		if($userpass==$udata["password"]){
				$arr=array("loginsuccess" =>$success,"alias"=>$udata["alias"]);
				setcookie("xblog","loggedin",time()+300,"","","",true);
		}else{
			$arr=array("loginsuccess" =>"some ");
		}
		echo json_encode($arr);
	}
	else{
		$arr=array("loginsuccess" =>$success);
		echo json_encode($arr);
	}
	
	
	
	
	
	
	
?>