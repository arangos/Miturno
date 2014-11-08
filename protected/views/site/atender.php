<?php
/* @var $this SiteController */

$model = new LoginForm();
$attribute = Yii::app()->user->IdEmpresa;

$coso = Yii::app()->user->Tipo;
echo ("este es le tipo de usuario -> " . $coso);
echo ('<br>'); 

$fechayhora = new CSqlDataProvider ("SELECT SYSDATE();");
$fechayhora = $fechayhora->getData();

$string = $fechayhora[0]['SYSDATE()'];
//echo $string;

$string1 = split(' ', $string);
echo ("fecha ->  " . $string1[0]);
echo ('<br>');
echo ("Hora -> " . $string1[1]);


$this->pageTitle = Yii::app ()->name;

$cliente = Clientes::model ()->findAll ();
//print_r($cliente);


$dependencias = new CSqlDataProvider ( "SELECT NombreDependencia FROM dependencia WHERE IdEmpresa = $attribute LIMIT 50;");
//print_r( $dependencias);
$dependencias = $dependencias->getData ();

//no borrar trae el login del post
if (isset ( $_POST ['LoginForm'] )) {
	$model->attributes = $_POST ['LoginForm'];
	$us = Yii::app()->user->User;

	$user = Clientes::model()->find(array('condition'=>"User='$us'"));
	//	print_r($user);
}

?>

<form action="callAtender" method="post">
	<div>
		Elije la dependencia que atenderas: <select name="selectVar">

			<?php
			for($var1 = 0; $var1< count($dependencias);$var1++){
				echo " <option value='".$dependencias[$var1]['NombreDependencia']."'>".$dependencias[$var1]['NombreDependencia']."</option>";
			}
			?>

		</select>
	</div>
	<br>


	<div style="width: 50%; float: left">
		<div align="center">
			<h2>Turno Actual</h2>
			<h1>
				<?php echo $turnoActual; ?>
			</h1>
		</div>

		<hr>
		<div align="center">


			<button type="submit" id="boton" style="height: 60px">Llamar Turno</button>
			<!-- 		 onclick="window.location.reload()" -->

		</div>

	</div>

	<div style="width: 48%; float: left">
		<div align="center">
			<h2>Codigo</h2>
			<h1>
				<?php echo $codigo; ?>
			</h1>
		</div>

		<hr>

		<!-- 	<div align="center" style="border: 2px solid gree -->

		<div align="center">
			<h2>Turnos en espera</h2>
			<h1>
				<?php echo $turnosEspera; ?>
			</h1>
		</div>
	</div>

</form>
