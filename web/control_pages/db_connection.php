<?php
#delete row

	
	$host_name="sql12.freesqldatabase.com";
	$dbname="sql12173471";
	$username='sql12173471';
	$password="EWDUFLAHkc";
	
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