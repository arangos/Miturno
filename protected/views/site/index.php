<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app ()->name;

$cliente = Clientes::model ()->findAll ();
// print_r($cliente);
?>
<center>
	<h1>Mi Turno es un sistema con el cual podras pedir tu turno desde el
		celular para alguna entidad sin tener, sin tener que esperar largas
		horas en un mismo sitio y adelantar otras tareas que tengas que
		realizar, nuestra idea es que controles mejor tu tiempo.</h1>
		
<!-- 		<form action="listDep" method="post"> -->
<!-- 		 <button type="submit" id="boton" style="height:60px"  >Pedir Turno</button> -->

<!-- 		 </form> -->
		
</center>