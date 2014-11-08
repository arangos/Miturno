<?php
/* @var $this TblEstadisticasController */
/* @var $model TblEstadisticas */

$this->breadcrumbs=array(
	'Tbl Estadisticases'=>array('index'),
	$model->IdEstadistica=>array('view','id'=>$model->IdEstadistica),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblEstadisticas', 'url'=>array('index')),
	array('label'=>'Create TblEstadisticas', 'url'=>array('create')),
	array('label'=>'View TblEstadisticas', 'url'=>array('view', 'id'=>$model->IdEstadistica)),
	array('label'=>'Manage TblEstadisticas', 'url'=>array('admin')),
);
?>

<h1>Update TblEstadisticas <?php echo $model->IdEstadistica; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>