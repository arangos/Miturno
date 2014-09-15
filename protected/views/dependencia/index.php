<?php
/* @var $this DependenciaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dependencias',
);

$this->menu=array(
	array('label'=>'Create Dependencia', 'url'=>array('create')),
	array('label'=>'Manage Dependencia', 'url'=>array('admin')),
);
?>

<h1>Dependencias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
