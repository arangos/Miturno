<?php
/* @var $this EmpresaController */
/* @var $model Empresa */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IdEmpresa'); ?>
		<?php echo $form->textField($model,'IdEmpresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IdCliente'); ?>
		<?php echo $form->textField($model,'IdCliente'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NombreEmpresa'); ?>
		<?php echo $form->textField($model,'NombreEmpresa',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->