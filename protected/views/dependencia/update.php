<?php
/* @var $this DependenciaController */
/* @var $model Dependencia */

$this->breadcrumbs=array(
	'Dependencias'=>array('index'),
	$model->IdDependencia=>array('view','id'=>$model->IdDependencia),
	'Update',
);

$this->menu=array(
	array('label'=>'List Dependencia', 'url'=>array('index')),
	array('label'=>'Create Dependencia', 'url'=>array('create')),
	array('label'=>'View Dependencia', 'url'=>array('view', 'id'=>$model->IdDependencia)),
	array('label'=>'Manage Dependencia', 'url'=>array('admin')),
);
?>

<h1>Update Dependencia <?php echo $model->IdDependencia; ?></h1>

<?php
$this->widget('zii.widgets.CMenu',array(
		'encodeLabel'=>false,
		'items'=>array(
				array('label'=>'Administrar Clientes', 'url'=>array('/clientes'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Administrar Empresas', 'url'=>array('/empresa'), 'visible'=>!Yii::app()->user->isGuest),
				//array('label'=>'Administrar Dependencias', 'url'=>array('/dependencia'), 'visible'=>!Yii::app()->user->isGuest),
		)));


$this->renderPartial('_form', array('model'=>$model)); ?>