<?php
	require_once("db_connection.php");
	header("Access-Control-Allow-Origin: *");
	$rst_arr=array("actionsuccess"=> false,"place"=>"cookie is not detected");
	if(!isset($_COOKIE)){
		echo json_encode($rst_arr);
		exit();
	}

?>

<?php
	
	$request=json_decode(file_get_contents('php://input'));
	$article=$request->article;
	$uid=$_COOKIE["xblog"];
	$stmt="insert into articles(article,author,submitted) values (:article,:uid,now());";
	$pstmt=$conn->prepare($stmt);
	$pstmt->bindParam(":article",$article);
	$pstmt->bindParam(":uid",$uid);
	
	if($pstmt->execute()){
		$rst_arr["actionsuccess"]=true;
		$rst_arr["place"]="everything fine";
	    $rst_arr["articleid"]=$conn->lastInsertId();
		
		echo json_encode($rst_arr);
	}else{
		$rst_arr["place"]="queryfailed";
		echo json_encode($rst_arr);
	}
	

?>