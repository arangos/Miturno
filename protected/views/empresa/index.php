<?php
/* @var $this EmpresaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Empresas',
);

$this->menu=array(
	array('label'=>'Create Empresa', 'url'=>array('create')),
	array('label'=>'Manage Empresa', 'url'=>array('admin')),
);
?>

<h1>Admininstrar Empresas</h1>

<?php 
$this->widget('zii.widgets.CMenu',array(
		'encodeLabel'=>false,
		'items'=>array(
				array('label'=>'Administrar Clientes', 'url'=>array('/clientes'), 'visible'=>!Yii::app()->user->isGuest),
				//array('label'=>'Administrar Empresas', 'url'=>array('/empresa'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Administrar Dependencias', 'url'=>array('/dependencia'), 'visible'=>!Yii::app()->user->isGuest),
)));

$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
