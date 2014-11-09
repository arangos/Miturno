<?php
/* @var $this ClientesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Clientes',
);

$this->menu=array(
	array('label'=>'Create Clientes', 'url'=>array('create')),
	array('label'=>'Manage Clientes', 'url'=>array('admin')),
);
?>

<h1>Administracion de clientes</h1>




<?php
$this->widget('zii.widgets.CMenu',array(
		'encodeLabel'=>false,
		'items'=>array(
		//array('label'=>'Cliente', 'url'=>array('/clientes'), 'visible'=>!Yii::app()->user->isGuest),
		array('label'=>'Administrar Empresas', 'url'=>array('/empresa'), 'visible'=>!Yii::app()->user->isGuest),
		array('label'=>'Administrar Dependencias', 'url'=>array('/dependencia'), 'visible'=>!Yii::app()->user->isGuest),
				)));
 
 $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
