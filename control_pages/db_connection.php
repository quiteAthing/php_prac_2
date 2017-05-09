<?php
#delete row
	
	$host_name="localhost";
	$dbname="xblog";
	$username='root';
	$password='';
	$conn=null;
	#error_reporting(0);
	try{
		$conn=new PDO("mysql:host=$host_name;dbname=$dbname;charset=utf8",$username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
	}
	catch(PDOException $e )
	{
		echo $e->getMessage();
	}
	
	function pack_and_leave(){
		$conn=null;
		exit();
	}
	
?>