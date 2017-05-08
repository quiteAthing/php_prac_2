<?php
	require_once("db_connection.php");
	header("Access-Control-Allow-Origin: *");
	$rst_arr=array();

?>

<?php
	
	$articleid=$_GET["articleid"];
	
	$stmt="select a.article article,a.articleid articleid,a.title title,b.alias alias,a.author authorid,a.submitted submitted from articles as a join members as b on a.articleid=:articleid and b.memberid=a.author";
	$pstmt=$conn->prepare($stmt);
	$pstmt->bindParam(":articleid",$articleid);

	if($pstmt->execute()){
		$rst=$pstmt->fetch();
		$rst_arr["actionsuccess"]=true;
		$rst_arr["place"]="everything fine";
	    $rst_arr["alias"]=$rst["alias"];
	    $rst_arr["title"]=$rst["title"];
	    $rst_arr["article"]=$rst["article"];
	    $rst_arr["submitted"]=$rst["submitted"];
		
		echo json_encode($rst_arr);
	}else{
		$rst_arr["place"]="queryfailed";
		echo json_encode($rst_arr);
	}
	

?>