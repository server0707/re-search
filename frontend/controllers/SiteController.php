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
use yii\helpers\Url;
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
        $this->setMeta(
            'Bosh sahifa',
            "Bosh sahifa home page index asosiy",
            "Ziyo scientific center - ilmiy tadqiqotlar markazi 1119360-sonli guvohnoma asosida faoliyatini yuritadi.",
            Yii::$app->params['supportEmail'],
            "",
            Url::base(true),
            Url::base(true) . "/images/logo.png",
            "",
            Url::base(true)
        );

        $last_published_journals = Journal::find()->orderBy(['published' => SORT_DESC])->limit(5)->all();

        return $this->render('index', compact('last_published_journals'));
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $this->setMeta(
            'Aloqa',
            "Aloqa contact connect",
            "Biz bilan bog'lanish. Telefon: +998993473605, Manzil: Xorazm viloyati, Shovot tumani Oʻzbekiston koʻchasi 30-uy",
            Yii::$app->params['supportEmail'],
            "",
            Url::base(true) . Url::to(['/contact']),
            Url::base(true) . "/images/logo.png",
            "",
            Url::base(true)
        );

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
        $this->setMeta(
            "Umumiy ma'lumotlar",
            "Umumiy ma'lumotlar biz haqimizda about",
            "",
            Yii::$app->params['supportEmail'],
            "",
            Url::base(true) . Url::to(['/about']),
            Url::base(true) . "/images/logo.png",
            "",
            Url::base(true)
        );
        return $this->render('about');
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

        if (empty($newsDataProvider->getModels())) {
            throw new \yii\web\NotFoundHttpException();
        }

        $this->setMeta(
            "Yangiliklar",
            "Yangiliklar, news, Yangilik, new",
            "",
            Yii::$app->params['supportEmail'],
            "",
            Url::base(true) . Url::to(['/news']),
            Url::base(true) . "/images/logo.png",
            "",
            Url::base(true)
        );

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

        if (empty($new)) {
            throw new \yii\web\NotFoundHttpException();
        }

        $this->setMeta(
            "$new->title",
            "$new->keywords",
            "$new->description",
            Yii::$app->params['supportEmail'],
            "",
            Url::base(true) . '/news-detail/' . $id,
            Url::base(true) . $new->getImage()->getUrl(),
            "",
            Url::base(true)
        );

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

        $this->setMeta(
            'Tahririyat',
            "tahririyat, editorials, editorial",
            "Tahririyat bo'limi",
            Yii::$app->params['supportEmail'],
            "",
            Url::base(true) . Url::to(['/editorial']),
            Url::base(true) . "/images/logo.png",
            "",
            Url::base(true)
        );

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

        $this->setMeta(
            'ARXIV - Yillar',
            "Yillar, yil, year, years, 2015, 2016, 2017, 2018, 2019, 2020, 2021, 2022",
            "",
            Yii::$app->params['supportEmail'],
            "",
            Url::base(true) . Url::to(['/archive']),
            Url::base(true) . "/images/logo.png",
            "",
            Url::base(true)
        );

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

        if (empty($monthsDataProvider->getModels())) {
            throw new \yii\web\NotFoundHttpException();
        }

        $this->setMeta(
            'ARXIV(' . $year . ') - Oylar',
            "oylar, months, month, oy, Yanvar, Fevral, Mart, Aprel, May, Iyun, Iyul, Avgust, Sentabr, Oktabr, Noyabr, Dekabr",
            "",
            Yii::$app->params['supportEmail'],
            "",
            Url::base(true) . '/archive-months/' . $year,
            Url::base(true) . "/images/logo.png",
            "",
            Url::base(true)
        );

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

        if (empty($journalsDataProvider->getModels())) {
            throw new \yii\web\NotFoundHttpException();
        }

        $month_names = ['Yanvar', 'Fevral', 'Mart', 'Aprel', 'May', 'Iyun', 'Iyul', 'Avgust', 'Sentabr', 'Oktabr', 'Noyabr', 'Dekabr'];
        $this->setMeta(
            'ARXIV(' . $year . '-' . $month_names[$month - 1] . ') - Jurnallar',
            "journal, journals, jurnallar, jurnal, arxive, archive, $year, {$month_names[$month - 1]}",
            "",
            Yii::$app->params['supportEmail'],
            "",
            Url::base(true) . '/archive-journals/' . $year . '/' . $month,
            Url::base(true) . "/images/logo.png",
            "",
            Url::base(true)
        );

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
        $this->setMeta(
            "Jurnal bo'limlari",
            "journal, journals, jurnallar, jurnal, bo'limlar, bolimlar",
            "Jurnal bo'limlari",
            Yii::$app->params['supportEmail'],
            "",
            Url::base(true) . Url::to(['/departments-of-journal']),
            Url::base(true) . "/images/logo.png",
            "",
            Url::base(true)
        );

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
        if (empty($current_journal)) {
            throw new \yii\web\NotFoundHttpException();
        }

        $articlesDataProvider = new ActiveDataProvider([
            'query' => Article::find()->where(['journal_id' => $id])->orderBy(['pagesOfJournal' => SORT_ASC, 'created_at' => SORT_ASC]),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $this->setMeta(
            "$current_journal->name",
            "journal, journals, jurnallar, jurnal, $current_journal->name, $current_journal->published, $current_journal->pages_count",
            "$current_journal->name  $current_journal->published  $current_journal->pages_count",
            Yii::$app->params['supportEmail'],
            "",
            Url::base(true) . '/journal-details/' . $id,
            Url::base(true) . $current_journal->getImage()->getUrl(),
            "",
            Url::base(true)
        );

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
        $this->setMeta(
            "Interaktiv xizmatlar",
            "interactive, services, interactive services, interactive-services, interaktiv xizmatlar, interaktiv, xizmatlar, interaktivxizmatlar, interaktiv-xizmatlar",
            "Maqola uchun UDK raqam olish. Disertatsiya uchun UDK raqam olish. Antiplagiatda tekshirish.",
            Yii::$app->params['supportEmail'],
            "",
            Url::base(true) . Url::to(['site/interactive-services']),
            Url::base(true) . "/images/logo.png",
            "",
            Url::base(true)
        );

        $model = new InteractiveServices();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', "Jo'natmangiz qabul qilindi. Tez orada siz bilan bog'lanamiz!");
            return $this->refresh();
        }

        return $this->render('interactive-services', compact('model'));
    }

    protected function setMeta($title = null, $keywords = null, $description = null, $contact = null,
                               $ogTitle = null, $ogUrl = null, $ogImage = null, $ogDescription = null,
                               $ogSiteName = null)
    {
        $this->view->title = $title;
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]);
        $this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);
        $this->view->registerMetaTag(['name' => 'contact', 'content' => "$contact"]);

        $this->view->registerMetaTag(['property' => 'og:title', 'content' => ($ogTitle != null) ? "$ogTitle" : "$title"]);
        $this->view->registerMetaTag(['property' => 'og:url', 'content' => "$ogUrl"]);
        $this->view->registerMetaTag(['property' => 'og:image', 'content' => "$ogImage"]);
        $this->view->registerMetaTag(['property' => 'og:description', 'content' => ($ogDescription != null) ? "$ogDescription" : "$description"]);
        $this->view->registerMetaTag(['property' => 'og:site_name', 'content' => "$ogSiteName"]);

        $this->view->registerMetaTag(['name' => 'twitter:site', 'content' => "$ogSiteName"]);
        $this->view->registerMetaTag(['name' => 'twitter:title', 'content' => "$title"]);
        $this->view->registerMetaTag(['name' => 'twitter:description', 'content' => ($ogDescription != null) ? "$ogDescription" : "$description"]);
    }
}
