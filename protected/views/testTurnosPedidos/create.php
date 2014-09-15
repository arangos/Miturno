<?php
/* @var $this TestTurnosPedidosController */
/* @var $model TestTurnosPedidos */

$this->breadcrumbs=array(
	'Test Turnos Pedidoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TestTurnosPedidos', 'url'=>array('index')),
	array('label'=>'Manage TestTurnosPedidos', 'url'=>array('admin')),
);
?>

<h1>Create TestTurnosPedidos</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>