<?php
	require_once("db_connection.php");
	header("Access-Control-Allow-Origin: *");
	$rst_arr=array("actionsuccess"=> false,"place"=>"cookie is not detected");
	if(!isset($_COOKIE["xblog"])){
		echo json_encode($rst_arr);
		exit();
	}

?>

<?php
	
	$request=json_decode(file_get_contents('php://input'));
	$article=$request->article;
	$title=$request->title;
	$articleid=$request->articleid;
	$stmt="update articles set article=:article , title=:title, lastupdate=now() where articleid=:articleid and author=:user";
	$pstmt=$conn->prepare($stmt);
	$pstmt->bindParam(":article",$article);
	$pstmt->bindParam(":title",$title);
	$pstmt->bindParam(":user",$_COOKIE["xblog"]);
	$pstmt->bindParam(":articleid",$articleid);
	
	if($pstmt->execute()){
		$rst_arr["actionsuccess"]=true;
		$rst_arr["place"]="everything fine";
		
		echo json_encode($rst_arr);
	}else{
		$rst_arr["place"]="queryfailed";
		echo json_encode($rst_arr);
	}
	

?>