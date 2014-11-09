<?php
/* @var $this TblEstadisticasController */
/* @var $model TblEstadisticas */

$this->breadcrumbs=array(
	'Tbl Estadisticases'=>array('index'),
	$model->IdEstadistica,
);

$this->menu=array(
	array('label'=>'List TblEstadisticas', 'url'=>array('index')),
	array('label'=>'Create TblEstadisticas', 'url'=>array('create')),
	array('label'=>'Update TblEstadisticas', 'url'=>array('update', 'id'=>$model->IdEstadistica)),
	array('label'=>'Delete TblEstadisticas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IdEstadistica),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblEstadisticas', 'url'=>array('admin')),
);
?>

<h1>View TblEstadisticas #<?php echo $model->IdEstadistica; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IdEstadistica',
		'IdDependencia',
		'Fecha',
		'Mes',
		'Dia',
		'Hora',
	),
)); ?>
