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
	$uid=$_COOKIE["xblog"];
	 $stmt="select a.title title,a.articleid articleid,b.alias alias,a.submitted submitted,a.lastupdate lastupdate from articles as a join members as b on a.author=b.memberid and a.author=$uid order by a.articleid  desc limit 10";
	 $rst=$conn->query($stmt)->fetchAll();
	 $ret=array();
	 foreach( $rst as $article){
		 array_push($ret,array("articleid"=>$article["articleid"], "alias"=>$article["alias"],"title"=>$article["title"],"lastupdate"=>$article["lastupdate"],"submitted"=>$article["submitted"]));
	 }
	 echo json_encode($ret);
	 echo json_encode($ret);
	 echo json_encode($ret);
	 echo json_encode($ret);
	 

?>

<?php
	pack_and_leave();

?>