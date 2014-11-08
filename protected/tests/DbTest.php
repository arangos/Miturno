<?php
Class DbTest extends CTestCase
{
	public function testConnection()
	{
	$servername = "localhost";
	$username = "root";
	$password = "";
	
	
	// Crear la coneccion
	try {
		//en conn el myslq(servidor,usuario,pass,db,puerto,socket)
		$conn = new mysqli($servername, $username, $password);
	} catch (Exception $e) {
		print $e;
		
	}
	
	
	// Check conection
	if($conn->connect_error){
		echo("no hay coneccion");
	}else{
		echo ("conecto");
		$this->assertTrue(true);
	}
	echo ("termine validaciones");
	
	
	}
	}
?>
