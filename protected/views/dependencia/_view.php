<?php
/* @var $this DependenciaController */
/* @var $data Dependencia */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdDependencia')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdDependencia), array('view', 'id'=>$data->IdDependencia)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdEmpresa')); ?>:</b>
	<?php echo CHtml::encode($data->IdEmpresa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NombreDependencia')); ?>:</b>
	<?php echo CHtml::encode($data->NombreDependencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NumeroTaquillas')); ?>:</b>
	<?php echo CHtml::encode($data->NumeroTaquillas); ?>
	<br />


</div>