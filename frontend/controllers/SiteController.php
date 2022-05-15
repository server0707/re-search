<?php

namespace frontend\controllers;

use common\models\Article;
use common\models\Editorials;
use common\models\InteractiveServices;
use common\models\Journal;
use common\models\News;
use Yii;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\db\Query;
use yii\web\Controller;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{

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
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->saveData()) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * view all journals
     *
     * @return mixed
     */
    public function actionJournals()
    {
        return $this->render('journals');
    }

    /**
     * view all articles
     *
     * @return mixed
     */
    public function actionArticles()
    {
        return $this->render('articles');
    }

    /**
     * view all news
     *
     * @return mixed
     */
    public function actionNews()
    {
        $newsDataProvider = new ActiveDataProvider([
            'query' => News::find()->where(['status' => News::STATUS_ACTIVE])->orderBy(['created_at' => SORT_DESC]),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $this->render('news', compact('newsDataProvider'));
    }

    /**
     * view all news detail
     *
     * @return mixed
     */
    public function actionNewsDetail($id)
    {
        $new = News::findOne(['id' => $id, 'status' => News::STATUS_ACTIVE]);
        $this->setMeta($new->title, $new->keywords, $new->description);

        return $this->render('news-detail', compact('new'));
    }

    /**
     * view all editorials
     *
     * @return mixed
     */
    public function actionEditorial()
    {
        $editorials = Editorials::find()->orderBy(['view_number' => SORT_ASC])->all();
        return $this->render('editorial', compact('editorials'));
    }

    /**
     * view all archives
     *
     * @return mixed
     */
    public function actionArchive()
    {
        $query = new Query();
        $yearsDataProvider = new ActiveDataProvider([
            'query' => $query->select(['year' => 'YEAR(published)'])->from('journal')->distinct('year')->orderBy(['year' => SORT_DESC]),
            'pagination' => [
                'pageSize' => 12,
            ],
        ]);

        return $this->render('archive', compact('yearsDataProvider'));
    }

    /**
     * view all archive month
     *
     * @return mixed
     */
    public function actionArchiveMonths($year)
    {
        $query = new Query();
        $monthsDataProvider = new ActiveDataProvider([
            'query' => $query->select(['month' => 'MONTH(published)'])->from('journal')->where(['YEAR(published)' => $year])->distinct('month')->orderBy(['month' => SORT_ASC]),
            'pagination' => [
                'pageSize' => 15,
            ],
        ]);

        return $this->render('archive-month', compact('monthsDataProvider', 'year'));
    }

    /**
     * view all archive journals
     *
     * @return mixed
     */
    public function actionArchiveJournals($year, $month)
    {
        $query = new Query();
        $journalsDataProvider = new ActiveDataProvider([
            'query' => $query->select('*')->from('journal')->where(['YEAR(published)' => $year, 'MONTH(published)' => $month])->orderBy(['published' => SORT_DESC]),
            'pagination' => [
                'pageSize' => 15,
            ],
        ]);

        //        Yillarni olish BEGIN
        $query = new Query();
        $years = $query->select(['year' => 'YEAR(published)'])->from('journal')->distinct('year')->orderBy(['year' => SORT_DESC])->limit(10)->all();
        //        Yillarni olish END

        return $this->render('archive-journals', compact('journalsDataProvider', 'year', 'month', 'years'));
    }

    /**
     * view all departments of journal
     *
     * @return mixed
     */
    public function actionDepartmentsOfJournal()
    {
        $journalsDataProvider = new ActiveDataProvider([
            'query' => Journal::find()->orderBy(['published' => SORT_DESC]),
            'pagination' => [
                'pageSize' => 12,
            ],
        ]);
        return $this->render('departments-of-journal', compact('journalsDataProvider'));
    }

    /**
     * view all journal details
     *
     * @return mixed
     */
    public function actionJournalDetails($id)
    {
        $current_journal = Journal::findOne(['id' => $id]);
        $articlesDataProvider = new ActiveDataProvider([
            'query' => Article::find()->where(['journal_id' => $id])->orderBy(['pagesOfJournal' => SORT_ASC]),
            'pagination' => [
                'pageSize' => 2,
            ],
        ]);

        //        Oxirgi 20 ta jurnal BEGIN
        $journals = Journal::find()->orderBy(['published' => SORT_DESC])->limit(10)->all();
        //        Oxirgi 20 ta jurnal END

        return $this->render('journal-details', compact('current_journal', 'articlesDataProvider', 'journals'));
    }

    /**
     * view all interactive services
     *
     * @return mixed
     */
    public function actionInteractiveServices()
    {
        $model = new InteractiveServices();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Jo'natmangiz qabul qilindi. Tez orada siz bilan bog'lanamiz!");
            return $this->refresh();
        }

        return $this->render('interactive-services', compact('model'));
    }

    protected function setMeta($title = null, $keywords = null, $description = null)
    {
        $this->view->title = $title;
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]);
        $this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);
    }
}
