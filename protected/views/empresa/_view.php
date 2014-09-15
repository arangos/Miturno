<?php
/* @var $this EmpresaController */
/* @var $data Empresa */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdEmpresa')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdEmpresa), array('view', 'id'=>$data->IdEmpresa)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdCliente')); ?>:</b>
	<?php echo CHtml::encode($data->IdCliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NombreEmpresa')); ?>:</b>
	<?php echo CHtml::encode($data->NombreEmpresa); ?>
	<br />


</div>