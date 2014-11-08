<?php
/* @var $this TblEstadisticasController */
/* @var $model TblEstadisticas */

$this->breadcrumbs=array(
	'Tbl Estadisticases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblEstadisticas', 'url'=>array('index')),
	array('label'=>'Manage TblEstadisticas', 'url'=>array('admin')),
);
?>

<h1>Create TblEstadisticas</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>