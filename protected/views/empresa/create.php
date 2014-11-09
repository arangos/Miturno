<?php
/* @var $this EmpresaController */
/* @var $model Empresa */

$this->breadcrumbs=array(
	'Empresas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Empresa', 'url'=>array('index')),
	array('label'=>'Manage Empresa', 'url'=>array('admin')),
);
?>

<h1>Create Empresa</h1>

<?php 
$this->widget('zii.widgets.CMenu',array(
		'encodeLabel'=>false,
		'items'=>array(
				array('label'=>'Administrar Clientes', 'url'=>array('/clientes'), 'visible'=>!Yii::app()->user->isGuest),
				//array('label'=>'Administrar Empresas', 'url'=>array('/empresa'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Administrar Dependencias', 'url'=>array('/dependencia'), 'visible'=>!Yii::app()->user->isGuest),
		)));
$this->renderPartial('_form', array('model'=>$model)); ?>