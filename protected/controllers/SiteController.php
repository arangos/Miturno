<?php
require 'vendor/autoload.php';

use Parse\ParseClient;
use Parse\ParseObject;
use Parse\ParseInstallation;
use Parse\ParseQuery;
use Parse\ParseACL;
use Parse\ParsePush;
use Parse\ParseUser;
use Parse\ParseException;
use Parse\ParseAnalytics;
use Parse\ParseFile;
use Parse\ParseCloud;
class SiteController extends Controller {
	/**
	 * Declares class-based actions.
	 */
	public function actions() {
		return array (
				// captcha action renders the CAPTCHA image displayed on the contact page
				'captcha' => array (
						'class' => 'CCaptchaAction',
						'backColor' => 0xFFFFFF
				),
				// page action renders "static" pages stored under 'protected/views/site/pages'
				// They can be accessed via: index.php?r=site/page&view=FileName
				'page' => array (
						'class' => 'CViewAction'
				)
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex() {
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render ( 'index' );
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError() {
		if ($error = Yii::app ()->errorHandler->error) {
			if (Yii::app ()->request->isAjaxRequest)
				echo $error ['message'];
			else
				$this->render ( 'error', $error );
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact() {
		$model = new ContactForm ();
		if (isset ( $_POST ['ContactForm'] )) {
			$model->attributes = $_POST ['ContactForm'];
			if ($model->validate ()) {
				$name = '=?UTF-8?B?' . base64_encode ( $model->name ) . '?=';
				$subject = '=?UTF-8?B?' . base64_encode ( $model->subject ) . '?=';
				$headers = "From: $name <{$model->email}>\r\n" . "Reply-To: {$model->email}\r\n" . "MIME-Version: 1.0\r\n" . "Content-Type: text/plain; charset=UTF-8";

				mail ( Yii::app ()->params ['adminEmail'], $subject, $model->body, $headers );
				Yii::app ()->user->setFlash ( 'contact', 'Thank you for contacting us. We will respond to you as soon as possible.' );
				$this->refresh ();
			}
		}
		$this->render ( 'contact', array (
				'model' => $model
		) );
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin() {
		$model = new LoginForm ();

		// if it is ajax validation request
		if (isset ( $_POST ['ajax'] ) && $_POST ['ajax'] === 'login-form') {
			echo CActiveForm::validate ( $model );
			Yii::app ()->end ();
		}

		// collect user input data
		if (isset ( $_POST ['LoginForm'] )) {
			$model->attributes = $_POST ['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if ($model->validate () && $model->login ())

				if(Yii::app()->user->Tipo == 'admin'){
				$this->redirect(Yii::app()->user->returnUrl);
				//$this->redirect(Yii::app()->user->returnUrl=array('/AdminView'));
			}else if(Yii::app()->user->Tipo == 'empleado')
				$this->redirect(Yii::app()->user->returnUrl=array('atender'));

		}
		// display the login form
		$this->render ( 'login', array (
				'model' => $model
		) );
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout() {
		Yii::app ()->user->logout ();
		$this->redirect ( Yii::app ()->homeUrl );
	}

// -------------actionListEmp()---------------------------------------
	public function actionListEmp() {
		$connection = Yii::app ()->db;
		$json = array ();

		$sqlTurnoActual = new CSqlDataProvider ( "SELECT NombreEmpresa, IdEmpresa FROM empresa" );
		$sqlTurnoActual = $sqlTurnoActual->getData ();

		for($var1 = 0; $var1 < count ( $sqlTurnoActual ); $var1 ++) {
			$emp = $sqlTurnoActual [$var1] ['NombreEmpresa'];
			$id = $sqlTurnoActual [$var1] ['IdEmpresa'];
				
			$json ['listDep'] [] = array (
					"Empresa" => $emp,
					"id" => $id
			);
		}
		echo json_encode ( $json );
	}

// -------------actionListDep()---------------------------------------
	public function actionListDep() {

		$emp = $_POST ['nombreEp'];

		$connection = Yii::app ()->db;
		$json = array ();
		$sqlTurnoActual = new CSqlDataProvider ( "SELECT NombreDependencia FROM dependencia where IdEmpresa = '" .$emp."'");
		$sqlTurnoActual = $sqlTurnoActual->getData ();

		for($var1 = 0; $var1 < count ( $sqlTurnoActual ); $var1 ++) {
			$dep = $sqlTurnoActual [$var1] ['NombreDependencia'];
				
			$sqlTurnoEspera = new CSqlDataProvider ( "select count(NombreDependencia) FROM test_turnos_pedidos where NombreDependencia ='" . $dep . "'" );
			$sqlTurnoEspera = $sqlTurnoEspera->getData ();
			$tur = $sqlTurnoEspera [0] ['count(NombreDependencia)'];
				
			$json ['listDep'] [] = array (
					"Dependencia" => $dep,
					"Turnos" => $tur
			);
		}
		echo json_encode ( $json );
	}

// -------------actionPedirTurno()---------------------------------------
	public function actionPedirTurno() {
		$nomDep = $_POST ['nombreDep'];
		$nomEmp = $_POST ['nombreEmp'];

		$connection = Yii::app ()->db;

		$an = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$su = strlen ( $an ) - 1;

		$codigo = substr ( $an, rand ( 0, $su ), 1 ) . substr ( $an, rand ( 0, $su ), 1 ) . substr ( $an, rand ( 0, $su ), 1 ) . substr ( $an, rand ( 0, $su ), 1 ) . substr ( $an, rand ( 0, $su ), 1 );

		$sqlUltimoTurno = new CSqlDataProvider ( "SELECT * FROM test_turnos_pedidos WHERE Turno = (
				select max(Turno) from test_turnos_pedidos where NombreDependencia = '". $nomDep . "') and NombreDependencia = '". $nomDep . "' and nombreEmpresa = '". $nomEmp . "'" );
		$sqlUltimoTurno = $sqlUltimoTurno->getData ();
		

		$sqlTurnoActual = new CSqlDataProvider ( "SELECT * FROM test_turnos_pedidos WHERE Turno = (
				select min(Turno) from test_turnos_pedidos where NombreDependencia = '". $nomDep . "') and NombreDependencia = '". $nomDep . "' and nombreEmpresa = '". $nomEmp . "'" );
		$sqlTurnoActual = $sqlTurnoActual->getData ();

		$turnoActual = $sqlTurnoActual [0] ['Turno'];
		
		if ($sqlUltimoTurno != null) {
			$turnoNuevo = $sqlUltimoTurno [0] ['Turno'] + 1;
		} else {
			$turnoNuevo = 1;
		}

		$logobj = new TestTurnosPedidos ();
		$logobj->Cod = $codigo;
		$logobj->NombreDependencia = $nomDep;
		$logobj->Turno = $turnoNuevo;
		$logobj->NombreEmpresa = $nomEmp;
		$logobj->insert ();

		echo $codigo . "-" . $turnoNuevo . "-" . $turnoActual;
	}
// -------------actionCallAtender()---------------------------------------
	public function actionCallAtender() {
		$connection = Yii::app ()->db;

		$codigo = "";

		if (isset ( $_POST ['selectVar'] )) {
			$var = $_POST ['selectVar'];
		} else {
			$var = $GLOBALS ['testvar'];
		}
		
// ----------Busca En La BD El Turno Que Se Va A Atender En Este Momento----------
		$sqlTurnoActual = new CSqlDataProvider ( "SELECT * FROM test_turnos_pedidos
				WHERE Turno = (select min(Turno) from test_turnos_pedidos where NombreDependencia = '" . $var . "')
				and NombreDependencia = '" . $var . "'" );
		$sqlTurnoActual = $sqlTurnoActual->getData ();

// ----------Busca En La BD El Turno Que Se Va A Atender Despues Del Actual----------
		$sqlTurnoProximo = new CSqlDataProvider ( "SELECT * FROM test_turnos_pedidos t,
				(SELECT Turno t FROM test_turnos_pedidos x
				WHERE NombreDependencia = '" . $var . "' ORDER BY (x.Turno) ASC LIMIT 1)p
				WHERE NombreDependencia = '" . $var . "' AND Turno = p.t +3" );
		$sqlTurnoProximo = $sqlTurnoProximo->getData ();

// ----------Valida Que Hallan Mas Turnos Adelante----------
		if ($sqlTurnoProximo != null) {
			$sqlTurnoProximo = $sqlTurnoProximo [0];
			$turnoProximo = $sqlTurnoProximo ['Turno'];
			$codigoProximo = $sqlTurnoProximo ['Cod'];
		} else {
			$turnoProximo = "";
			$codigoProximo = null;
		}

// ----------Muestra Al Funcionario El Turno - Codigo Y Turnos En Espera----------
		if ($sqlTurnoActual != null) {
			$sqlTurnoActual = $sqlTurnoActual [0];
			$turnoActual = $sqlTurnoActual ['Turno'];
			$codigo = $sqlTurnoActual ['Cod'];
				
			$connection->createCommand ()->delete ( 'test_turnos_pedidos', 'Cod=:Cod', array (
					':Cod' => $codigo
			) );
		} else {
			$turnoActual = "";
		}

		$sqlTurnosEspera = new CSqlDataProvider ( "SELECT COUNT(NombreDependencia) FROM test_turnos_pedidos where NombreDependencia = '" . $var . "';" );
		$sqlTurnosEspera = $sqlTurnosEspera->getData ();

		if ($sqlTurnosEspera != null) {
			$sqlTurnosEspera = $sqlTurnosEspera [0];
			$turnosEspera = $sqlTurnosEspera ['COUNT(NombreDependencia)'];
		} else {
			$turnosEspera = "";
		}
// ----------Manda Push Al Que Se Va A Atender 3 Turnos Despues----------

		ParseClient::initialize ( '30RmLKXYaKqfDn68xP747xkZJOD2tyiiUvT56qQo', 'qDgjdkVE81EsNPCGTSvk1oAuPPZR3kZMfAvPUgF1', 'Gs62Qmys1afj6J9nI6mfs9opRIv9eYZu62C2Alo1' );

		$dataProximo = array (
				"alert" => "Estas proximo a ser atendido, acercate al punto de atencion o cancela el turno si no puedes asistir"
		);
		
		$queryProximo = ParseInstallation::query ();
		
// 		$queryProximo->decrement("turnos_espera");
//		$queryProximo->equalTo ( "turnos_espera", 14 );
		
 		$queryProximo->equalTo ( "device_id", $codigoProximo );
		
		ParsePush::send ( array (
				"where" => $queryProximo,
				"data" => $dataProximo,
				"turnos_espera" => "increment"
		) );

// ----------Manda Push Al Que Se Voy A Atender En Este Momento----------
		$dataActual = array (
				"alert" => "Es tu turno, muestra el siguiente codigo en la taquilla"
		);

		$queryActual = ParseInstallation::query ();

		$queryActual->equalTo ( "device_id", $codigo );

		ParsePush::send ( array (
				"where" => $queryActual,
				"data" => $dataActual
		) );

// ------------------------------------------------------------

		$this->render ( 'callAtender', array (
				'turnoActual' => $turnoActual,
				'codigo' => $codigo,
				'turnosEspera' => $turnosEspera
		) );
	}

// ------------actionAtender()----------------------------
	public function actionAtender() {
		$codigo = "";
		$turnoActual = "";
		$turnosEspera = "";

		$this->render ( 'atender', array (
				'turnoActual' => $turnoActual,
				'codigo' => $codigo,
				'turnosEspera' => $turnosEspera
		) );
	}

// ------------actionEliminarTurno()----------------------------
	public function actionEliminarTurno(){

		$codigo = $_POST ['codigo'];

		$connection = Yii::app ()->db;

		$connection->createCommand ()->delete ( 'test_turnos_pedidos', 'Cod=:Cod', array (
				':Cod' => $codigo
		) );

		echo "cancelo";
	}
}