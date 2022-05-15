<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $content
 * @property int|null $status
 * @property string|null $keywords
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class News extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    public $image;
    public $gallery;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'content'], 'required'],
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['description', 'keywords'], 'string', 'max' => 500],
            [['title'], 'string', 'max' => 255],

            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE]],

            [['image'], 'file', 'extensions' => ['png', 'jpg', 'jpeg']],
            [['gallery'], 'file', 'extensions' => ['png', 'jpg', 'jpeg'], 'maxFiles' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Sarlavha',
            'description' => 'Tavsif',
            'content' => 'Asosiy qism',
            'status' => 'Holat',
            'keywords' => 'Kalitlar',
            'image' => 'Rasm',
            'gallery' => 'Galereya',
            'created_at' => 'Yaratilgan',
            'updated_at' => 'Yangilangan',
        ];
    }

    //  {----------------Image uploads BEGIN----------------}
    public function upload()
    {
        if ($this->validate()) {
            $path = Yii::getAlias('@webroot') . $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path, true);
            @unlink($path);
            return true;
        } else {
            return false;
        }
    }

    public function uploadGallery()
    {
        if ($this->validate()) {
            foreach ($this->gallery as $file) {
                $path = Yii::getAlias('@webroot') . $file->baseName . '.' . $file->extension;
                $file->saveAs($path);
                $this->attachImage($path);
                @unlink($path);
            }
            return true;
        } else {
            return false;
        }
    }

    //  {----------------Image uploads END----------------}

    public function afterSave($insert, $changedAttributes)
    {
        //        rasm uchun begin
        if ($this->image = UploadedFile::getInstance($this, 'image')) {
            $this->upload();
        }
        unset($this->image);

        if ($this->gallery = UploadedFile::getInstances($this, 'gallery')) {
            $this->uploadGallery();
        }
        //        rasm uchun end

//        Keywordlarni saqlash BEGIN
        $keywords = explode(',', $this->keywords);
        foreach ($keywords as $keyword) {
            if (empty(Keyword::find()->where(['like', 'name', $keyword])->one())){
                $object = new Keyword();
                $object->name = $keyword;
                $object->save(false);

                unset($object);
            }
        }
//        Keywordlarni saqlash END

        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }

    public function afterDelete()
    {
        $this->removeImages();
        parent::afterDelete(); // TODO: Change the autogenerated stub
    }

}
