<?php

	header("Access-Control-Allow-Origin: *");
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
		$uid=$_COOKIE["xblog"];
		$stmt="select alias,memberid from members where memberid=$uid";
		if(!is_null($conn)){
			$rst=$conn->query($stmt)->fetch(PDO::FETCH_ASSOC);
			$rst_arr=array("alias"=>$rst["alias"],"querysuccess"=>true);
			
			echo json_encode($rst_arr);
		}else{
			$rst_arr=array("querysuccess"=>false,"place"=>" conn is null");
			echo json_encode($rst_arr);
			
		}		
?>

<?php
	pack_and_leave();
?>