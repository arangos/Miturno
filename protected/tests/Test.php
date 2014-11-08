<?php
Class Test extends CTestCase
{
	public function testAtender()
	{
// 		$codigo = "";
// 		$turnoActual = "";
// 		$turnosEspera = "";
		
// 		$this->render ( 'atender', array (
// 				'turnoActual' => $turnoActual,
// 				'codigo' => $codigo,
// 				'turnosEspera' => $turnosEspera
// 		) );
// 		}
		$codigo = "";
		$turnoActual = "";
		$turnoEspera = "";
		
		$this->assertEquals('', $codigo);
		$this->assertEquals('', $turnoActual);
		$this->assertEquals('', $turnoEspera);
		
		
		
	}
	public function testattender(){
		
		try {
			$con = mysql_connect("localhost","root","");
			return $con;
			echo $con;
		} catch (Exception $e) {
			echo $e;
		}
		
		//$cliente = Clientes::model ()->findAll();
		// print_r($cliente);
		
		//$dependencias = new CSqlDataProvider ( "SELECT NombreDependencia FROM dependencia LIMIT 50;");
		//$dependencias = $dependencias->getData ();
		$query = "select NombreDependencia from dependencia";
		$dependencias1 = mysql_db_query("Miturno1", $query);
		
		for($var1 = 0; $var1< count($dependencias1);$var1++){
			$this->assertEquals('Certificados', $dependencias.[0]);
			$this->assertEquals('Datos', $dependencias.[1]);
		}
	}
	
	}
?>
