<?php
/* @var $this DependenciaController */
/* @var $model Dependencia */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'dependencia-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'IdEmpresa'); ?>
		<?php echo $form->textField($model,'IdEmpresa'); ?>
		<?php echo $form->error($model,'IdEmpresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NombreDependencia'); ?>
		<?php echo $form->textField($model,'NombreDependencia',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'NombreDependencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NumeroTaquillas'); ?>
		<?php echo $form->textField($model,'NumeroTaquillas'); ?>
		<?php echo $form->error($model,'NumeroTaquillas'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->