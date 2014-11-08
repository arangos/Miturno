<?php
/* @var $this TblEstadisticasController */
/* @var $model TblEstadisticas */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IdEstadistica'); ?>
		<?php echo $form->textField($model,'IdEstadistica'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IdDependencia'); ?>
		<?php echo $form->textField($model,'IdDependencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Fecha'); ?>
		<?php echo $form->textField($model,'Fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Hora'); ?>
		<?php echo $form->textField($model,'Hora'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->