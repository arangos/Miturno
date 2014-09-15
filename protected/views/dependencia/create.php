<?php
/* @var $this DependenciaController */
/* @var $model Dependencia */

$this->breadcrumbs=array(
	'Dependencias'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Dependencia', 'url'=>array('index')),
	array('label'=>'Manage Dependencia', 'url'=>array('admin')),
);
?>

<h1>Create Dependencia</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>