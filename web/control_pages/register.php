<?php
	require_once("db_connection.php");
	header("Access-Control-Allow-Origin: *");
	$rst_arr=array();

?>

<?php
	$stmt="insert into members(account,email,password,alias,registered)values(:account,:email,:password,:alias,now())";
	$regdata=json_decode(file_get_contents("php://input"));
	$pstmt=$conn->prepare($stmt);
	$pstmt->bindParam(":account",$regdata->account);
	$pstmt->bindParam(":password",$regdata->password);
	$pstmt->bindParam(":email",$regdata->email);
	$pstmt->bindParam(":alias",$regdata->alias);
	
	if($pstmt->execute()){
		$rst_arr["actionsuccess"]=true;
		$rst_arr["alias"]="success";
			echo json_encode($rst_arr);
	}else{
		$rst_arr["actionsuccess"]=false;
		$rst_arr["place"]="query failed";
			echo json_encode($rst_arr);
		
	}
	
	
	
	
	
	
?>