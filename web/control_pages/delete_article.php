<?php

	require_once("db_connection.php");
	$rst_arr=array();
	if(!isset($_COOKIE["xblog"])){
		$rst_arr["actionsuccess"]=false;
		$rst_arr["place"]="you are not logged in";
		echo json_encode($rst_arr);
		pack_and_leave();

	}
?>


<?php

	 $stmt="select articleid from articles where articleid=:articleid and author=:uid";
	 $pstmt=$conn->prepare($stmt);
	 $pstmt->bindParam(":articleid",$_GET["articleid"]);
	 $pstmt->bindParam(":uid",$_COOKIE["xblog"]);
	 $pstmt->execute();
	 $rst=$pstmt->fetchAll(PDO::FETCH_ASSOC);
	 if(!empty($rst)){
		$stmt2="delete from articles where articleid=:articleid and author=:uid";
		$pstmt2=$conn->prepare($stmt2);
		$pstmt2->bindParam(":articleid",$_GET["articleid"]);
		$pstmt2->bindParam(":uid",$_COOKIE["xblog"]);
		$pstmt2->execute(); 
		$rst_arr["actionsuccess"]=true;
			echo json_encode($rst_arr);
			pack_and_leave();
	 }else{
		 $rst_arr["actionsuccess"]=false;
		 $rst_arr["place"]="You are not author of the article";
		 echo json_encode($rst_arr);
		 	pack_and_leave();
	 }
	 
	 
	 
	 
	 

?>

