<?php
#user 登入
	header("Access-Control-Allow-Origin: *");
	
		require_once("db_connection.php");
	
	$useracc=$_GET["acc"];
	$userpass=$_GET["pw"];
	$udata="";
	$stmt="select alias,memberid,password from members where account=:account";
	
		
		$pstmt=$conn->prepare($stmt);
		$pstmt->bindParam(":account",$useracc);
		$pstmt->execute();
		$udata=$pstmt->fetch();
		
		$conn=null;

	if($success= !is_bool($udata)){
		if($userpass===$udata["password"]){
				$arr=array("loginsuccess" =>$success,"alias"=>$udata["alias"]);
				setcookie("xblog",$udata["memberid"],time()+3600,"localhost","","",true);
	
		}else{
			$arr=array("loginsuccess" =>"some ","place"=> ($userpass===$udata["password"]));

		}
		echo json_encode($arr);
	}
	else{
		$arr=array("loginsuccess" =>$success,"place"=>"eeet");
		echo json_encode($arr);

	}
			$conn=null;
		exit();
	
	
	
	
	
	
	
?>