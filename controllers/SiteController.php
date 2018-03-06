<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\web\ForbiddenHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\forms\LoginForm;
use app\forms\ContactForm;
use app\forms\SignupForm;
use app\forms\CustomerSearch;
use app\models\Customer;
use yii\data\ActiveDataProvider;



class SiteController extends Controller
{
    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
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
        ];
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
        if (!Yii::$app->user->isGuest) 
        {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) 
        {
            Yii::$app->getSession()->setFlash('message', 'Welcome');
            return $this->redirect(['data']);
        }

        $model->password = '';
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

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionData()
    {
        $searchModel = new CustomerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('data', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }

    public function actionView($id)
    {
        return $this->render('view',[
            'model' => Customer::findOne($id),
        ]);
    }

    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('update'))
        {
            $model = Customer::findOne($id);
            if($model->load(Yii::$app->request->post()))
            {
                if(!$model->update())
                {
                    throw new \Exception(current($model->getFirstErrors()));
                }
                Yii::$app->getSession()->setFlash('message', 'Customer Successfully Updated ');
                return $this->redirect(['data', 'id'=>$model->id]);
            }
            else
            {
                return $this->render('update', ['model' => $model]);
            }
        }
        else
        {
            throw new ForbiddenHttpException;
        }    
    }

    // public function actionDelete($id)
    // {
    //     //$this->findModel($id)->delete();
    //     $model = Customer::findOne($id);
    //     $model->is_deleted = 0;
    //     // $accountholder->save();
    //     $model->update(false, ['is_deleted']); // boolean

    //     // throw new \Exception(current($accountholder->getFirstErrors()));
        
    //     //$db->createCommand('INSERT INTO `Accountholder` (`is_deleted`) VALUES (1) WHERE id = $id')->execute();

    //     return $this->redirect(['data']);
    // }

    public function actionSign_up()
    {
        if(Yii::$app->user->can('sign-up'))
        {
           $model = new SignupForm();
            if ($model->load(Yii::$app->request->post())) 
            {
                if (!$model->signup())
                {
                    throw new \Exception(current($model->getFirstErrors()));
                }
                Yii::$app->getSession()->setFlash('message', 'Customer Successfuly Created');
                return $this->redirect(['data']);
            }
            else
            {
                return $this->render('sign_up', ['model' => $model]);
            } 
        }
        else
        {
            throw new ForbiddenHttpException;
        }
        
    }

}
