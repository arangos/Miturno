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

<h1>Administar Dependencias</h1>

<?php
$this->widget('zii.widgets.CMenu',array(
		'encodeLabel'=>false,
		'items'=>array(
				array('label'=>'Administrar Clientes', 'url'=>array('/clientes'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Administrar Empresas', 'url'=>array('/empresa'), 'visible'=>!Yii::app()->user->isGuest),
				//array('label'=>'Administrar Dependencias', 'url'=>array('/dependencia'), 'visible'=>!Yii::app()->user->isGuest),
		)));
 
 $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
