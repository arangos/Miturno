<?php
/* @var $this DependenciaController */
/* @var $model Dependencia */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IdDependencia'); ?>
		<?php echo $form->textField($model,'IdDependencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IdEmpresa'); ?>
		<?php echo $form->textField($model,'IdEmpresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NombreDependencia'); ?>
		<?php echo $form->textField($model,'NombreDependencia',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NumeroTaquillas'); ?>
		<?php echo $form->textField($model,'NumeroTaquillas'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->