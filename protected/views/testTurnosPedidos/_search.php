<?php
/* @var $this TestTurnosPedidosController */
/* @var $model TestTurnosPedidos */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'NombreDependencia'); ?>
		<?php echo $form->textField($model,'NombreDependencia',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Cod'); ?>
		<?php echo $form->textField($model,'Cod',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NumeroAviso'); ?>
		<?php echo $form->textField($model,'NumeroAviso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Turno'); ?>
		<?php echo $form->textField($model,'Turno'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Empresa'); ?>
		<?php echo $form->textField($model,'Empresa',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->