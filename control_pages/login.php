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
	$stmt="select alias,memberid,password from members where account=:account";
	
	try{
		$conn =new PDO("mysql:host=$host_name;dbname=$dbname",$username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
		$pstmt=$conn->prepare($stmt);
		$pstmt->bindParam(":account",$useracc);
		$pstmt->execute();
		$udata=$pstmt->fetch();
		
		$conn=null;
	}catch(PDOException $e){
		exit($e->getMessage());
	}
	if($success= !is_bool($udata)){
		if($userpass==$udata["password"]){
				$arr=array("loginsuccess" =>$success,"alias"=>$udata["alias"]);
				setcookie("xblog",$udata["memberid"],time()+3600,"","","",true);
		}else{
			$arr=array("loginsuccess" =>"some ");
		}
		echo json_encode($arr);
	}
	else{
		$arr=array("loginsuccess" =>$success,"place"=>"eeet");
		echo json_encode($arr);
	}
	
	
	
	
	
	
	
?>