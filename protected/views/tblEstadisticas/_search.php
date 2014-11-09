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
		<?php echo $form->textField($model,'Fecha',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Mes'); ?>
		<?php echo $form->textField($model,'Mes',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Dia'); ?>
		<?php echo $form->textField($model,'Dia',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Hora'); ?>
		<?php echo $form->textField($model,'Hora',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->