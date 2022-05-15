<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string $theme
 * @property string $authors
 * @property string $pagesOfJournal
 * @property string $file_name
 * @property int $journal_id
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Journal $journal
 */
class Article extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['theme', 'authors', 'pagesOfJournal', 'file_name', 'journal_id', 'file'], 'required'],
            [['authors'], 'string'],
            [['journal_id', 'created_at', 'updated_at'], 'integer'],
            [['theme', 'pagesOfJournal', 'file_name'], 'string', 'max' => 255],
            [['journal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Journal::className(), 'targetAttribute' => ['journal_id' => 'id']],

            [['file'], 'file', 'extensions' => ['pdf'], 'maxFiles' => 1],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'theme' => 'Mavzu',
            'authors' => 'Mualliflar',
            'pagesOfJournal' => 'Jurnaldagi varoqlar',
            'file_name' => 'Fayl nomi',
            'file' => 'Fayl',
            'journal_id' => 'Jurnal',
            'created_at' => 'Yaratilgan',
            'updated_at' => 'Yangilangan',
        ];
    }

    /**
     * Gets query for [[Journal]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJournal()
    {
        return $this->hasOne(Journal::className(), ['id' => 'journal_id']);
    }

    public function afterSave($insert, $changedAttributes)
    {
        //        PDF fayl uchun begin
        if (!empty($this->file)){
            $this->file->saveAs('@frontend/web/articles/' . $this->file_name);
        }
        //        PDF fayl uchun end

        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }

    public function beforeValidate()
    {
        if ($this->file = UploadedFile::getInstance($this, 'file')) {
            $this->removeFile();
            $this->file_name = $this->file->baseName . '_' . time() . '.' . $this->file->extension;
        }

        return parent::beforeValidate(); // TODO: Change the autogenerated stub
    }

    private function removeFile(){
        \Yii::setAlias('@root', realpath(dirname(__FILE__).'/../../'));
        if (!is_dir(\Yii::getAlias('@root') . '/frontend/web/articles/' . $this->file_name) && file_exists(\Yii::getAlias('@root') . '/frontend/web/articles/' . $this->file_name)) {
            return unlink(\Yii::getAlias('@root') . '/frontend/web/articles/' . $this->file_name);
        }
    }

    public function afterDelete()
    {
        $this->removeFile();
        parent::afterDelete(); // TODO: Change the autogenerated stub
    }

}