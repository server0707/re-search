<?php

use yii\db\Migration;

/**
 * Class m220512_044247_insert_users_to_user_table
 */
class m220512_044247_insert_users_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('user', [
            'username' => 'user',
            'auth_key' => 'Dp7_ymJWugujvymm8RbO754cCOl6p6iI',
            'password_hash' => '$2y$13$xzZ1c8rCfzzjsAiGGzQHx.Uz3xBZKOnxv9wuj8LV1IRRcTtY67p8e',
            'email' => 'user@example.com',
            'status' => 10,
            'isAdmin' => 0,
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->insert('user', [
            'username' => 'admin',
            'auth_key' => 'maT2EGjgiGkKOJV9yv6y9kSgrCnbQOiY',
            'password_hash' => '$2y$13$hvo9kyiQbuFHNysgZm9uHuoGRWBFc.f8Va5cSXL2N0bxfnXZrY9mG',
            'email' => 'admin@example.com',
            'status' => 10,
            'isAdmin' => 1,
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('user', ['username' => 'admin']);
        $this->delete('user', ['username' => 'user']);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220512_044247_insert_users_to_user_table cannot be reverted.\n";

        return false;
    }
    */
}
