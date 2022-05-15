<?php
namespace backend\models;

use common\models\User;
use Yii;
use yii\base\Model;

/**
 * @property User $_user
 * Change password form
 */
class ChangePasswordForm extends Model
{
    public $current_password;
    public $new_password;
    public $confirm_password;

    public $_user;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['current_password', 'new_password', 'confirm_password'], 'required'],
            [['current_password', 'new_password', 'confirm_password'], 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
            ['current_password', 'validateCurrentPassword'],
            ['confirm_password', 'compare', 'compareAttribute' => 'new_password'],
        ];
    }

    public function validateCurrentPassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->_user;
            if (!$user || !$user->validatePassword($this->current_password)) {
                $this->addError($attribute, 'Joriy parol noto\'g\'ri kiritilgan.');
            }
        }
    }

    public function save(){
        if ($this->validate()){
            $this->_user->setPassword($this->new_password);
            return $this->_user->save(false);
        }

        return false;
    }
}