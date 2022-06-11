<?php

namespace backend\controllers;

use common\models\Article;
use common\models\Journal;
use common\models\LoginForm;
use common\models\News;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

/**
 * Site controller
 */
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
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'fake'],
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
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $newContactsCount = \common\models\Contacts::find()->where(['viewed' => false])->count();
        $newInteractiveServicesCount = \common\models\InteractiveServices::find()->where(['viewed' => false])->count();
        return $this->render('index', compact('newContactsCount', 'newInteractiveServicesCount'));
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'main-login';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->loginAdmin()) {
            return $this->goBack();
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

    public function actionFake()
    {
        /**
         * get faker object as $faker
         */
        $faker = \Faker\Factory::create('en_EN');

        //        create 100 journals
        for ($i = 1; $i <= 100; $i++){
            $obj = new Journal();
            $obj->name = $faker->realText(255);
            $obj->file_name = $faker->filePath().'.'.$faker->fileExtension();
            $obj->published = $faker->date('Y-m-d');
            $obj->pages_count = $faker->numberBetween(100,1000);
            while (!$obj->save(false)){
                $obj->name = $faker->realText(255);
                $obj->published = $faker->date('Y-m-d');
            }
            unset($obj);
        }

        //        create 1000 articles
        for ($i = 1; $i <= 1000; $i++){
            $obj = new Article();
            $obj->theme = $faker->realText(255);
            $obj->journal_id = $faker->numberBetween(1,100);
            $obj->file_name = $faker->filePath().'.'.$faker->fileExtension();
            $obj->authors = $faker->realText(500);
            $number = $faker->numberBetween(1,980);
            $obj->pagesOfJournal = $number . ' - ' . ($number + $faker->numberBetween(2, 20));
            $obj->save(false);

            unset($obj);
        }

        //        create 100 news
        for ($i = 1; $i <= 100; $i++){
            $obj = new News();
            $obj->title = $faker->realText(255);
            $obj->description = $faker->realText(255);
            $obj->content = $faker->realText(2000);
            $obj->status = $faker->numberBetween(0,1);
            $obj->save(false);

            unset($obj);
        }

        return $this->goHome();
    }
}
