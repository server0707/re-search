<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "contacts".
 *
 * @property int $id
 * @property string $fullName
 * @property string $email
 * @property string $subject
 * @property string $body
 * @property boolean $viewed
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Contacts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contacts';
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
            [['fullName', 'email', 'subject', 'body'], 'required'],
            [['email'], 'email'],
            [['body'], 'string'],
            [['viewed'], 'boolean'],
            [['viewed'], 'default', 'value' => false],
            [['created_at', 'updated_at'], 'integer'],
            [['fullName', 'email', 'subject'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fullName' => 'F.I.O.',
            'email' => 'Email',
            'subject' => 'Mavzu',
            'body' => 'Xabar',
            'viewed' => 'Ko\'rilgan',
            'created_at' => 'Yaratilgan',
            'updated_at' => 'Yangilangan',
        ];
    }
}
