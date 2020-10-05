<?php

namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\db\Schema;

/**
 * Site controller
 */
class SiteController extends Controller {
	/**
	 * @inheritdoc
	 */
// 	public function behaviors() {
// 		return [ 
// 				'access' => [ 
// 						'class' => AccessControl::className (),
// 						'only' => [ 
// 								'logout',
// 								'signup' 
// 						],
// 						'rules' => [ 
// 								[ 
// 										'actions' => [ 
// 												'signup' 
// 										],
// 										'allow' => true,
// 										'roles' => [ 
// 												'?' 
// 										] 
// 								],
// 								[ 
// 										'actions' => [ 
// 												'logout' 
// 										],
// 										'allow' => true,
// 										'roles' => [ 
// 												'@' 
// 										] 
// 								] 
// 						] 
// 				],
// 				'verbs' => [ 
// 						'class' => VerbFilter::className (),
// 						'actions' => [ 
// 								'logout' => [ 
// 										'post' 
// 								] 
// 						] 
// 				] 
// 		];
// 	}
	public function actionEmail() {
		$model = new User ();
		if (sizeof ( $_POST ) === 0) {
			$this->render ( 'email', array (
					'model' => $model 
			) );
			Yii::app ()->end ();
		}
		if (isset ( $_POST ['email'] ) && $_POST ['email'] !== '') {
			$model->email = $_POST ['email'];
			$model->name = '@';
			$model->title = '@';
			$model->phone = '@';
			$model->company = '@';
			$model->address = '@';
			$model->usertype = 'email';
			$ce = new CEmailValidator ();
			if ($ce->validateValue ( $model->email )) {
				$model->save ();
			} else {
				$this->render ( 'email', array (
						'm' => '邮箱格式不正确，请重新输入！' 
				) );
				Yii::app ()->end ();
			}
			$this->render ( 'email', array (
					'm' => '订阅成功！' 
			) );
		} else {
			$this->render ( 'email', array (
					'm' => '订阅失败！' 
			) );
		}
	}
	public function actionReg() {
		$model = new User ();
		if (sizeof ( $_POST ) === 0) {
			$this->render ( 'reg', array (
					'model' => $model 
			) );
			Yii::app ()->end ();
		}
		if (isset ( $_POST ['name'] ) && $_POST ['name'] === '' || isset ( $_POST ['email'] ) && $_POST ['email'] === '' || isset ( $_POST ['title'] ) && $_POST ['title'] === '' || isset ( $_POST ['phone'] ) && $_POST ['phone'] === '' || isset ( $_POST ['company'] ) && $_POST ['company'] === '' || isset ( $_POST ['address'] ) && $_POST ['address'] === '') 
		{
			$this->render ( 'failure', array (
					'm' => '姓名、邮箱、职位/学校、电话、公司、地址中某项为空,请重新输入' 
			) );
			Yii::app ()->end ();
		}
		$ce = new CEmailValidator ();
		if (! $ce->validateValue ( $_POST ['email'] )) {
			$this->render ( 'failure', array (
					'm' => '邮箱输入错误,请重新输入' 
			) );
			Yii::app ()->end ();
		}
		
		$model->name = $_POST ['name'];
		$model->email = $_POST ['email'];
		$model->title = $_POST ['title'];
		$model->phone = $_POST ['phone'];
		$model->company = $_POST ['company'];
		$model->address = $_POST ['address'];
		$model->trade = $_POST ['trade'];
		$model->QQ = $_POST ['QQ'];
		$model->weixin = $_POST ['weixin'];
		$model->weibo = $_POST ['weibo'];
		$model->www = $_POST ['www'];
		$model->demand = $_POST ['demand'];
		$model->usertype = 'reg';
		if ($model->validate ()) {
			$model->save ();
			$this->render ( 'success', array (
					'm' => '认证成功！' 
			) );
		} else {
			$this->render ( 'failure', array (
					'm' => '认证失败！' 
			) );
		}
	}
	public function actionError() {
		if ($error = Yii::app ()->errorHandler->error) {
			if (Yii::app ()->request->isAjaxRequest)
				echo $error ['message'];
			else
				$this->render ( 'error', $error );
		}
	}
	
	/**
	 * @inheritdoc
	 */
	public function actions() {
		return [ 
				'error' => [ 
						'class' => 'yii\web\ErrorAction' 
				],
				'captcha' => [ 
						'class' => 'yii\captcha\CaptchaAction',
						'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null 
				] 
		];
	}
	public function actionIndex() {
		// $this->sdb();
		return $this->render ( 'index' );
	}
	public function actionLogin() {
		if (! \Yii::$app->user->isGuest) {
			return $this->goHome ();
		}
		
		$model = new LoginForm ();
		if ($model->load ( Yii::$app->request->post () ) && $model->login ()) {
			return $this->goBack ();
		} else {
			return $this->render ( 'login', [ 
					'model' => $model 
			] );
		}
	}
	public function actionLogout() {
		Yii::$app->user->logout ();
		
		return $this->goHome ();
	}
	public function actionContact() {
		$model = new ContactForm ();
		if ($model->load ( Yii::$app->request->post () ) && $model->validate ()) {
			if ($model->sendEmail ( Yii::$app->params ['adminEmail'] )) {
				Yii::$app->session->setFlash ( 'success', 'Thank you for contacting us. We will respond to you as soon as possible.' );
			} else {
				Yii::$app->session->setFlash ( 'error', 'There was an error sending email.' );
			}
			
			return $this->refresh ();
		} else {
			return $this->render ( 'contact', [ 
					'model' => $model 
			] );
		}
	}
	public function actionAbout() {
		return $this->render ( 'about' );
	}
	
	public function actionTrain1() {
		return $this->render ( 'Train1' );
	}
	
	public function actionTrain2() {
		return $this->render ( 'Train2' );
	}
	
	public function actionTrain3() {
		return $this->render ( 'Train3' );
	}
	
	public function actionTrain4() {
		return $this->render ( 'Train4' );
	}
	
	public function actionConsultation1() {
		return $this->render ( 'consultation1' );
	}
	
	public function actionConsultation2() {
		return $this->render ( 'consultation2' );
	}
	
	public function actionSelldata() {
		return $this->render ( 'selldata' );
	}
	
	public function actionOsoft() {
		return $this->render ( 'osoft' );
	}
	
	public function actionBsoft() {
		return $this->render ( 'bsoft' );
	}
	
	public function actionBuydata() {
		return $this->render ( 'buydata' );
	}
	
	public function actionSignup() {
		$model = new SignupForm ();
		if ($model->load ( Yii::$app->request->post () )) {
			if ($user = $model->signup ()) {
				if (Yii::$app->getUser ()->login ( $user )) {
					return $this->goHome ();
				}
			}
		}
		
		return $this->render ( 'signup', [ 
				'model' => $model 
		] );
	}
	public function actionRequestPasswordReset() {
		$model = new PasswordResetRequestForm ();
		if ($model->load ( Yii::$app->request->post () ) && $model->validate ()) {
			if ($model->sendEmail ()) {
				Yii::$app->getSession ()->setFlash ( 'success', 'Check your email for further instructions.' );
				
				return $this->goHome ();
			} else {
				Yii::$app->getSession ()->setFlash ( 'error', 'Sorry, we are unable to reset password for email provided.' );
			}
		}
		
		return $this->render ( 'requestPasswordResetToken', [ 
				'model' => $model 
		] );
	}
	public function actionResetPassword($token) {
		try {
			$model = new ResetPasswordForm ( $token );
		} catch ( InvalidParamException $e ) {
			throw new BadRequestHttpException ( $e->getMessage () );
		}
		
		if ($model->load ( Yii::$app->request->post () ) && $model->validate () && $model->resetPassword ()) {
			Yii::$app->getSession ()->setFlash ( 'success', 'New password was saved.' );
			
			return $this->goHome ();
		}
		
		return $this->render ( 'resetPassword', [ 
				'model' => $model 
		] );
	}
	private function sdb() {
		$c = new \yii\db\Connection ( [ 
				'dsn' => 'mysql:host=localhost;dbname=shop',
				'username' => 'root',
				'password' => 'password',
				'charset' => 'utf8' 
		] );
		$c->open ();
		
		$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		
		$c->createCommand ()->createTable ( '{{%user}}', [ 
				'id' => Schema::TYPE_PK,
				'username' => Schema::TYPE_STRING . ' NOT NULL',
				'auth_key' => Schema::TYPE_STRING . '(32) NOT NULL',
				'password_hash' => Schema::TYPE_STRING . ' NOT NULL',
				'password_reset_token' => Schema::TYPE_STRING,
				'email' => Schema::TYPE_STRING . ' NOT NULL',
				
				'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
				'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
				'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL' 
		], $tableOptions )->execute ();
		$c->createCommand ()->createTable ( '{{%category}}', [ 
				'id' => Schema::TYPE_PK,
				'parent_id' => Schema::TYPE_INTEGER,
				'title' => Schema::TYPE_STRING,
				'slug' => Schema::TYPE_STRING 
		], $tableOptions )->execute ();
		
		$c->createCommand ()->addForeignKey ( 'fk-category-parent_id-category-id', '{{%category}}', 'parent_id', '{{%category}}', 'id', 'CASCADE' )->execute ();
		
		$c->createCommand ()->createTable ( '{{%product}}', [ 
				'id' => Schema::TYPE_PK,
				'title' => Schema::TYPE_STRING,
				'slug' => Schema::TYPE_STRING,
				'description' => Schema::TYPE_TEXT,
				'category_id' => Schema::TYPE_INTEGER,
				'price' => Schema::TYPE_MONEY 
		], $tableOptions )->execute ();
		
		$c->createCommand ()->addForeignKey ( 'fk-product-category_id-category_id', '{{%product}}', 'category_id', '{{%category}}', 'id', 'RESTRICT' )->execute ();
		
		$c->createCommand ()->createTable ( '{{%image}}', [ 
				'id' => Schema::TYPE_PK,
				'product_id' => Schema::TYPE_INTEGER 
		], $tableOptions )->execute ();
		
		$c->createCommand ()->addForeignKey ( 'fk-image-product_id-product_id', '{{%image}}', 'product_id', 'product', 'id', 'SET NULL' )->execute ();
		
		$c->createCommand ()->createTable ( '{{%order}}', [ 
				'id' => Schema::TYPE_PK,
				'created_at' => Schema::TYPE_INTEGER,
				'updated_at' => Schema::TYPE_INTEGER,
				'phone' => Schema::TYPE_STRING,
				'address' => Schema::TYPE_TEXT,
				'email' => Schema::TYPE_STRING,
				'notes' => Schema::TYPE_TEXT,
				'status' => Schema::TYPE_STRING 
		], $tableOptions )->execute ();
		
		$c->createCommand ()->createTable ( '{{%order_item}}', [ 
				'id' => Schema::TYPE_PK,
				'order_id' => Schema::TYPE_INTEGER,
				'title' => Schema::TYPE_STRING,
				'price' => Schema::TYPE_MONEY,
				'product_id' => Schema::TYPE_INTEGER,
				'quantity' => Schema::TYPE_FLOAT 
		], $tableOptions )->execute ();
		
		$c->createCommand ()->addForeignKey ( 'fk-order_item-order_id-order-id', '{{%order_item}}', 'order_id', '{{%order}}', 'id', 'CASCADE' )->execute ();
		$c->createCommand ()->addForeignKey ( 'fk-order_item-product_id-product-id', '{{%order_item}}', 'product_id', '{{%product}}', 'id', 'SET NULL' )->execute ();
	}
}
