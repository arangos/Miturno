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

<?php $this->renderPartial('_form', array('model'=>$model)); ?>