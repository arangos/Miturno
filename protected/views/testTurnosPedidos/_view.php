<?php
/* @var $this TestTurnosPedidosController */
/* @var $data TestTurnosPedidos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Cod')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Cod), array('view', 'id'=>$data->Cod)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NombreDependencia')); ?>:</b>
	<?php echo CHtml::encode($data->NombreDependencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NumeroAviso')); ?>:</b>
	<?php echo CHtml::encode($data->NumeroAviso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Turno')); ?>:</b>
	<?php echo CHtml::encode($data->Turno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Empresa')); ?>:</b>
	<?php echo CHtml::encode($data->Empresa); ?>
	<br />


</div>