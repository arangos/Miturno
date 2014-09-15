<?php
/* @var $this TestTurnosPedidosController */
/* @var $model TestTurnosPedidos */

$this->breadcrumbs=array(
	'Test Turnos Pedidoses'=>array('index'),
	$model->Cod=>array('view','id'=>$model->Cod),
	'Update',
);

$this->menu=array(
	array('label'=>'List TestTurnosPedidos', 'url'=>array('index')),
	array('label'=>'Create TestTurnosPedidos', 'url'=>array('create')),
	array('label'=>'View TestTurnosPedidos', 'url'=>array('view', 'id'=>$model->Cod)),
	array('label'=>'Manage TestTurnosPedidos', 'url'=>array('admin')),
);
?>

<h1>Update TestTurnosPedidos <?php echo $model->Cod; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>