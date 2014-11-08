<?php
/* @var $this TestTurnosPedidosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Test Turnos Pedidoses',
);

$this->menu=array(
	array('label'=>'Create TestTurnosPedidos', 'url'=>array('create')),
	array('label'=>'Manage TestTurnosPedidos', 'url'=>array('admin')),
);
?>

<h1>Test Turnos Pedidoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
