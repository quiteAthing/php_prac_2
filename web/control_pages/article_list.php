<?php

	require_once("db_connection.php");

?>


<?php
	 $stmt="select a.title title,a.articleid articleid,b.alias alias,a.submitted submitted,a.lastupdate lastupdate from articles as a join members as b on a.author=b.memberid order by a.articleid  desc limit 10";
	 $rst=$conn->query($stmt)->fetchAll();
	 $ret=array();
	 foreach( $rst as $article){
		 array_push($ret,array("articleid"=>$article["articleid"], "alias"=>$article["alias"],"title"=>$article["title"],"lastupdate"=>$article["lastupdate"],"submitted"=>$article["submitted"]));
	 }
	 echo json_encode($ret);
	 

?>