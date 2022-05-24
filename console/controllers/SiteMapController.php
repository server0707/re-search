<?php

namespace console\controllers;

use common\models\Article;
use common\models\Journal;
use common\models\News;
use yii\console\Controller;
use yii\db\Query;
use yii\helpers\Url;


class SiteMapController extends Controller
{
    /**
     * Generate sitemap text action
     * @return void
     */
    public function actionIndex()
    {
        $begin = '<?xml version="1.0" encoding="UTF-8"?>
                    <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        $end = '    </urlset>';

        $content = '<url><loc>' . Url::base(true) . '</loc><priority>1.0</priority></url>';
        $content .= '<url><loc>' . Url::base(true) . '/editorial</loc><priority>0.9</priority></url>';
        $content .= '<url><loc>' . Url::base(true) . '/departments-of-journal</loc><priority>0.9</priority></url>';
        $content .= '<url><loc>' . Url::base(true) . '/archive</loc><priority>0.9</priority></url>';
        $content .= '<url><loc>' . Url::base(true) . '/news</loc><priority>0.9</priority></url>';
        $content .= '<url><loc>' . Url::base(true) . '/about</loc><priority>0.9</priority></url>';
        $content .= '<url><loc>' . Url::base(true) . '/contact</loc><priority>0.9</priority></url>';
        $content .= '<url><loc>' . Url::base(true) . '/site/interactive-services</loc><priority>0.9</priority></url>';

        $journals = Journal::find()->all();
        foreach ($journals as $journal) {
            $content .= '<url><loc>' . Url::base(true) . '/journal-details/' . $journal->id . '</loc><priority>0.9</priority></url>';
            if (!empty($journal->file_name)){
                $content .= '<url><loc>' . Url::base(true) . '/journals/' . $journal->file_name . '</loc><priority>0.8</priority></url>';
            }
        }

        $query = new Query();
        $years = $query->select(['year' => 'YEAR(published)'])->from('journal')->distinct('year')->orderBy(['year' => SORT_DESC])->all();
        foreach ($years as $year) {
            $content .= '<url><loc>' . Url::base(true) . '/archive-months/' . $year['year'] . '</loc><priority>0.9</priority></url>';
        }

        foreach ($years as $year) {
            $months = $query->select(['month' => 'MONTH(published)'])->from('journal')->where(['YEAR(published)' => $year['year']])->distinct('month')->orderBy(['month' => SORT_ASC])->all();

            foreach ($months as $month) {
                $content .= '<url><loc>' . Url::base(true) . '/archive-journals/' . $year['year'] . '/' . $month['month'] . '</loc><priority>0.9</priority></url>';
            }
        }

        $news = News::find()->where(['status' => News::STATUS_ACTIVE])->orderBy(['created_at' => SORT_DESC])->all();
        foreach ($news as $new) {
            $content .= '<url><loc>' . Url::base(true) . '/news-detail/' . $new->id . '</loc><priority>0.9</priority></url>';
        }

        $articles = Article::find()->all();
        foreach ($articles as $article) {
            $content .= '<url><loc>' . Url::base(true) . '/articles/' . $article->file_name . '</loc><priority>0.8</priority></url>';
        }

        $siteMap = $begin . $content . $end;

        //faylni ochish. yo'q bolsa, yangisi yaratiladi
        $fp = fopen("frontend/web/sitemap.xml", "w");

        //faylga yozish
        fwrite($fp, $siteMap);

        fclose($fp);

    }
}
