<?php
/* @var $this TblEstadisticasController */
/* @var $model TblEstadisticas */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-estadisticas-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'IdEstadistica'); ?>
		<?php echo $form->textField($model,'IdEstadistica'); ?>
		<?php echo $form->error($model,'IdEstadistica'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IdDependencia'); ?>
		<?php echo $form->textField($model,'IdDependencia'); ?>
		<?php echo $form->error($model,'IdDependencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Fecha'); ?>
		<?php echo $form->textField($model,'Fecha'); ?>
		<?php echo $form->error($model,'Fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Hora'); ?>
		<?php echo $form->textField($model,'Hora'); ?>
		<?php echo $form->error($model,'Hora'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->