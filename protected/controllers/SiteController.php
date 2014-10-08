<?php
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
				$this->redirect ( Yii::app ()->user->returnUrl );
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
	
	public function actionPedirTurno(){
		
		$connection = Yii::app ()->db;
		
		$an = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$su = strlen($an) - 1;
		
		$codigo = substr($an, rand(0, $su), 1) .
		substr($an, rand(0, $su), 1) .
		substr($an, rand(0, $su), 1) .
		substr($an, rand(0, $su), 1) .
		substr($an, rand(0, $su), 1);
		
		$sqlUltimoTurno = new CSqlDataProvider ( "SELECT * FROM test_turnos_pedidos WHERE Turno = (
    select max(Turno) from test_turnos_pedidos where NombreDependencia = 'dep4') and NombreDependencia = 'dep4'" );
		$sqlUltimoTurno = $sqlUltimoTurno->getData ();
		
		if ($sqlUltimoTurno != null) {
			$turnoNuevo = $sqlUltimoTurno[0] ['Turno']+1;
		}else{
			$turnoNuevo = 1;
		}
	
		$logobj = new TestTurnosPedidos();
		$logobj->Cod = $codigo;
		$logobj->NombreDependencia = 'dep4';
		$logobj->Turno = $turnoNuevo;
		$logobj->insert();
		
		echo $codigo."-".$turnoNuevo;
	}
	
	public function actionCallAtender() {
		
		$connection = Yii::app ()->db;
		
		$codigo = "";
		
		if(isset($_POST['selectVar'])){
			$var = $_POST['selectVar'];
		}else{
			$var = $GLOBALS['testvar'];
		}
// 		$var = "dep4";
		
		$sqlTurnoActual = new CSqlDataProvider ( "SELECT * FROM test_turnos_pedidos WHERE Turno = (
    select min(Turno) from test_turnos_pedidos where NombreDependencia = '".$var."') and NombreDependencia = '".$var."'" );
		$sqlTurnoActual = $sqlTurnoActual->getData ();
		
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
		
		$sqlTurnosEspera = new CSqlDataProvider ( "SELECT COUNT(NombreDependencia) FROM test_turnos_pedidos where NombreDependencia = '".$var."';" );
		$sqlTurnosEspera = $sqlTurnosEspera->getData ();
		
		if ($sqlTurnosEspera != null) {
			$sqlTurnosEspera = $sqlTurnosEspera [0];
			$turnosEspera = $sqlTurnosEspera ['COUNT(NombreDependencia)'];
		} else {
			$turnosEspera = "";
		}
		
		$this->render ( 'callAtender', array (
				'turnoActual' => $turnoActual,
				'codigo' => $codigo,
				'turnosEspera' => $turnosEspera 
		) );
		
	}
	
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
}