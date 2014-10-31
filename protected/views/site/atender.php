<?php
/* @var $this SiteController */

$model = new LoginForm();
$attribute = Yii::app()->user->IdEmpresa;

//print_r ($attribute);

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






//$clientId = Yii::app()->Clientes->IdCliente;

//$empresaId = Yii::app()->empresa->IdEmpresa;

// if(Yii::app()->user->Tipo == 'admin'){
// 				$this->redirect(Yii::app()->user->returnUrl);
// 				//$this->redirect(Yii::app()->user->returnUrl=array('/AdminView'));
// 			}else if(Yii::app()->user->Tipo == 'empleado')
// 				$this->redirect(Yii::app()->user->returnUrl=array('atender'));

// 		}

// print_r($dependencias);
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
