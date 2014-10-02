<?php
$connection = Yii::app ()->db;
		
		$codigo = "";
		
		$sqlTurnoActual = new CSqlDataProvider ( "SELECT * FROM test_turnos_pedidos WHERE Turno = (
    select min(Turno) from test_turnos_pedidos where NombreDependencia = 'dep1') and NombreDependencia = 'dep1'" );
		$sqlTurnoActual = $sqlTurnoActual->getData ();
		
		if ($sqlTurnoActual != null) {
			$sqlTurnoActual = $sqlTurnoActual [0];
			$turnoActual = $sqlTurnoActual ['Turno'];
			$codigo = $sqlTurnoActual ['Cod'];
			
			$connection->createCommand ()->delete ( 'test_turnos_pedidos', 'Cod=:Cod', array (
					':Cod' => $codigo 
			) );
		} else {
			$turnoActual = "";
		}
		
		$sqlTurnosEspera = new CSqlDataProvider ( "SELECT COUNT(NombreDependencia) FROM test_turnos_pedidos where NombreDependencia = 'dep1';" );
		$sqlTurnosEspera = $sqlTurnosEspera->getData ();
		
		if ($sqlTurnosEspera != null) {
			$sqlTurnosEspera = $sqlTurnosEspera [0];
			$turnosEspera = $sqlTurnosEspera ['COUNT(NombreDependencia)'];
		} else {
			$turnosEspera = "";
		}
		
		$this->render ( 'atender', array (
				'turnoActual' => $turnoActual,
				'codigo' => $codigo,
				'turnosEspera' => $turnosEspera 
		) );
		
?>