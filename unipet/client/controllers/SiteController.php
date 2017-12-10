<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\User;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'successCallback'],
                'successUrl' => \yii\helpers\Url::to(['index']),
            ],
        ];
    }

    public function successCallback($client){
        $attributes = $client->getUserAttributes();

        if(!isset($attributes['email'])){
            $google = true;
        }else{
            $google = false;
        }

        $nome  = '';
        $email = '';
        if($google){
            $nome  = $attributes['name']['givenName'] . ' ' . $attributes['name']['familyName'];
            $email = $attributes['emails']['0']['value'];
        }else{
            $nome  = $attributes['name'];
            $email = $attributes['email'];
        }

        $model = new User();
        $model->id          = '100';
        $model->username    = $nome;
        $model->password    = $email;
        $model->authKey     = 'test100key';
        $model->accessToken = '100-token';

        $model->setUser([
            '100' => [
                'id' => '100',
                'username' => $nome,
                'password' => $email,
                'authKey' => 'test100key',
                'accessToken' => '100-token',
            ],
        ]);

        \Yii::$app->session->set('nome', $nome);

        Yii::$app->user->login($model);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
