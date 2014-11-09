<?php
/* @var $this ClientesController */
/* @var $model Clientes */

$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Clientes', 'url'=>array('index')),
	array('label'=>'Manage Clientes', 'url'=>array('admin')),
);
?>

<h1>Create Clientes</h1>

<?php
$this->widget('zii.widgets.CMenu',array(
		'encodeLabel'=>false,
		'items'=>array(
				//array('label'=>'Cliente', 'url'=>array('/clientes'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Administrar Empresas', 'url'=>array('/empresa'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Administrar Dependencias', 'url'=>array('/dependencia'), 'visible'=>!Yii::app()->user->isGuest),
		)));

$this->renderPartial('_form', array('model'=>$model));

?>