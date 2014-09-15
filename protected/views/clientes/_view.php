<?php
/* @var $this ClientesController */
/* @var $data Clientes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdCliente')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdCliente), array('view', 'id'=>$data->IdCliente)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nombre')); ?>:</b>
	<?php echo CHtml::encode($data->Nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Apellido')); ?>:</b>
	<?php echo CHtml::encode($data->Apellido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('User')); ?>:</b>
	<?php echo CHtml::encode($data->User); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pass')); ?>:</b>
	<?php echo CHtml::encode($data->Pass); ?>
	<br />
	
	

</div>