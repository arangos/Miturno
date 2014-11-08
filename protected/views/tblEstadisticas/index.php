<?php
/* @var $this TblEstadisticasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Estadisticases',
);

$this->menu=array(
	array('label'=>'Create TblEstadisticas', 'url'=>array('create')),
	array('label'=>'Manage TblEstadisticas', 'url'=>array('admin')),
);
?>

<h1>Tbl Estadisticases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
