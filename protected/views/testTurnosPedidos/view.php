<?php
/* @var $this TestTurnosPedidosController */
/* @var $model TestTurnosPedidos */

$this->breadcrumbs=array(
	'Test Turnos Pedidoses'=>array('index'),
	$model->Cod,
);

$this->menu=array(
	array('label'=>'List TestTurnosPedidos', 'url'=>array('index')),
	array('label'=>'Create TestTurnosPedidos', 'url'=>array('create')),
	array('label'=>'Update TestTurnosPedidos', 'url'=>array('update', 'id'=>$model->Cod)),
	array('label'=>'Delete TestTurnosPedidos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Cod),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TestTurnosPedidos', 'url'=>array('admin')),
);
?>

<h1>View TestTurnosPedidos #<?php echo $model->Cod; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'NombreDependencia',
		'Cod',
		'Turno',
	),
)); ?>
