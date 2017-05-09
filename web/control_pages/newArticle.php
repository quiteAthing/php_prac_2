<?php
	require_once("db_connection.php");
	header("Access-Control-Allow-Origin: *");
	$rst_arr=array("actionsuccess"=> false,"place"=>"cookie is not detected");
	if(!isset($_COOKIE["xblog"])){
		echo json_encode($rst_arr);
		pack_and_leave();
	}

?>

<?php
	
	$request=json_decode(file_get_contents('php://input'));
	$article=$request->article;
	$title=$request->title;
	$uid=$_COOKIE["xblog"];
	$stmt="insert into articles(article,author,submitted,title) values (:article,:uid,now(),:title);";
	$pstmt=$conn->prepare($stmt);
	$pstmt->bindParam(":article",$article);
	$pstmt->bindParam(":title",$title);
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
	pack_and_leave();
	

?>