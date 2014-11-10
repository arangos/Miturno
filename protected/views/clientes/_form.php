<?php
/* @var $this ClientesController */
/* @var $model Clientes */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'clientes-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'User'); ?>
		<?php echo $form->textField($model,'User',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'User'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Pass'); ?>
		<?php echo $form->passwordField($model,'Pass',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'Pass'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Tipo'); ?>
		<?php echo $form->dropDownList($model, 'Tipo', CHtml::listData(Clientes::model()->findAll(), 'Tipo', 'Tipo'))?>
		<?php echo $form->error($model,'Tipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IdEmpresa'); ?>
		<?php echo $form->textField($model,'IdEmpresa'); ?>
		<?php echo $form->error($model,'IdEmpresa'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->