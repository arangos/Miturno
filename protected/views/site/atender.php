<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app ()->name;

$cliente = Clientes::model ()->findAll ();
// print_r($cliente);
?>



<div style="width: 50%; float: left ">
	<div align="center" >
		<h2>Turno Actual</h2>
		<h1> <?php echo $turnoActual; ?></h1>
	</div>

	<hr>
	<div align="center" >
		<button type="button" id="boton" style="height:60px">Llamar Turno</button>
	</div>
	
</div>


<div style=" width: 48%; float: left">
<div align="center" >
		<h2>Codigo</h2>
		<h1> <?php echo $codigo; ?></h1>
	</div>
	
<hr>

<!-- 	<div align="center" style="border: 2px solid gree -->
	
	<div align="center">
		<h2>Turnos en espera</h2>
		<h1> <?php echo $turnosEspera; ?></h1>
	</div>
</div>

