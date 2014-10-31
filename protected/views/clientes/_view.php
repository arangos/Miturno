<?php
/* @var $this ClientesController */
/* @var $data Clientes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdCliente')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdCliente), array('view', 'id'=>$data->IdCliente)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('User')); ?>:</b>
	<?php echo CHtml::encode($data->User); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pass')); ?>:</b>
	<?php echo CHtml::encode($data->Pass); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tipo')); ?>:</b>
	<?php echo CHtml::encode($data->Tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdEmpresa')); ?>:</b>
	<?php echo CHtml::encode($data->IdEmpresa); ?>
	<br />


</div>