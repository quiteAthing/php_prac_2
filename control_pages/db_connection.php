<?php
#delete row
	echo "Hello";
	
	$host_name="localhost";
	$dbname="xblog";
	$username='root';
	$password='';
	$conn=null;
	
	try{
		$conn=new PDO("mysql:host=$host_name;dbname=$dbname",$username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
	}
	catch(PDOException $e )
	{
		echo $e->getMessage();
	}
	
	
	
?>