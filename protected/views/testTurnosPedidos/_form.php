<?php
/* @var $this TestTurnosPedidosController */
/* @var $model TestTurnosPedidos */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'test-turnos-pedidos-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'NombreDependencia'); ?>
		<?php echo $form->textField($model,'NombreDependencia',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'NombreDependencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Cod'); ?>
		<?php echo $form->textField($model,'Cod',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'Cod'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NumeroAviso'); ?>
		<?php echo $form->textField($model,'NumeroAviso'); ?>
		<?php echo $form->error($model,'NumeroAviso'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Turno'); ?>
		<?php echo $form->textField($model,'Turno'); ?>
		<?php echo $form->error($model,'Turno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Empresa'); ?>
		<?php echo $form->textField($model,'Empresa',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'Empresa'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->