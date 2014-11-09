<?php
/* @var $this EmpresaController */
/* @var $model Empresa */

$this->breadcrumbs=array(
	'Empresas'=>array('index'),
	$model->IdEmpresa=>array('view','id'=>$model->IdEmpresa),
	'Update',
);

$this->menu=array(
	array('label'=>'List Empresa', 'url'=>array('index')),
	array('label'=>'Create Empresa', 'url'=>array('create')),
	array('label'=>'View Empresa', 'url'=>array('view', 'id'=>$model->IdEmpresa)),
	array('label'=>'Manage Empresa', 'url'=>array('admin')),
);
?>

<h1>Update Empresa <?php echo $model->IdEmpresa; ?></h1>

<?php
$this->widget('zii.widgets.CMenu',array(
		'encodeLabel'=>false,
		'items'=>array(
				array('label'=>'Administrar Clientes', 'url'=>array('/clientes'), 'visible'=>!Yii::app()->user->isGuest),
				//array('label'=>'Administrar Empresas', 'url'=>array('/empresa'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Administrar Dependencias', 'url'=>array('/dependencia'), 'visible'=>!Yii::app()->user->isGuest),
)));

$this->renderPartial('_form', array('model'=>$model)); ?>