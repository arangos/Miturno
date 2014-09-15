<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

$cliente = Clientes::model()->findAll();
// print_r($cliente);
?>

<h1>Turno Actual </h1> 
<h2>27</h2> <br>


<button type="button" id="boton"> Antender Siguiente Turno</button>