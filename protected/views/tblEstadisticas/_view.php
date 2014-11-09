<?php
/* @var $this TblEstadisticasController */
/* @var $data TblEstadisticas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdEstadistica')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IdEstadistica), array('view', 'id'=>$data->IdEstadistica)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IdDependencia')); ?>:</b>
	<?php echo CHtml::encode($data->IdDependencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Mes')); ?>:</b>
	<?php echo CHtml::encode($data->Mes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Dia')); ?>:</b>
	<?php echo CHtml::encode($data->Dia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Hora')); ?>:</b>
	<?php echo CHtml::encode($data->Hora); ?>
	<br />


</div>