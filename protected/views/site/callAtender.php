<?php

// $Site = new SiteController("Site");
// $Site->actionFunctionAtender();
	
// ?>

<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app ()->name;

$cliente = Clientes::model ()->findAll ();

$var = $_POST['selectVar'];

global $testvar;
$testvar = ''.$var;

// print_r($cliente);
?>
<form action="callAtender" method="post">

<h2> Taquilla: <?php echo " ".$var?></h2>

<input type="text" name="selectVar" style="display: none;" value="<?php echo $var;?>">



<div style="width: 50%; float: left ">
	<div align="center" >
		<h2>Turno Actual</h2>
		<h1> <?php echo $turnoActual; ?></h1>
	</div>

	<hr>
	<div align="center" >
	
	
		 <button type="submit" id="boton" style="height:60px"  >Llamar Turno</button>
<!-- 		 onclick="window.location.reload()" -->
		 
	</div>
	
</div>
</form>
<!-- window.location.reload() -->


<div style=" width: 48%; float: left">
<div align="center" >
		<h2>Codigo</h2>
		<h1> <?php echo $codigo;?></h1>
	</div>
	 	
<hr>

<!-- 	<div align="center" style="border: 2px solid gree -->
	
	<div align="center">
		<h2>Turnos en espera</h2>
		<h1> <?php echo $turnosEspera; ?></h1>
	</div>
</div>

