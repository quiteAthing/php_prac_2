<?php
#delete row

	
	$host_name="sql12.freesqldatabase.com";
	$dbname="sql12173471";
	$username='sql12173471';
	$password="EWDUFLAHkc";
	$conn=null;
	#error_reporting(0);
	try{
		$conn=new PDO("mysql:host=$host_name;dbname=$dbname;charset=utf8",$username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		echo "connected";
	}
	catch(PDOException $e )
	{
		echo $e->getMessage();
	}
	
?>

<?php

$stmt="select * from test_stuff";
	if(!is_null($conn)){
		
		$rst=$conn->query($stmt);
		$rt=$rst->fetchAll();
		foreach($rt as $data){
			
			echo "<br>";
			echo $data["id"],"   as             ";
			echo $data["misc"];
			
		}
		pack_and_leave();
	}

	echo "failed ";
	pack_and_leave();
	?>
	
	<?php
	function pack_and_leave(){
		$conn=null;
		exit();
	}
	
?>