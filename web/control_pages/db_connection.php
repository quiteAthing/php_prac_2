<?php
#delete row
	$dbopts = parse_url(getenv('DATABASE_URL'));
	$app->register(new Herrera\Pdo\PdoServiceProvider(),
               array(
                   'pdo.dsn' => 'pgsql:dbname='.ltrim($dbopts["path"],'/').';host='.$dbopts["host"] . ';port=' . $dbopts["port"],
                   'pdo.username' => $dbopts["user"],
                   'pdo.password' => $dbopts["pass"]
               )
	);
	
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