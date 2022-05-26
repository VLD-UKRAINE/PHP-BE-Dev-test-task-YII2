<?php

use yii\db\Migration;

/**
 * Class m220526_084630_seed_user_table
 */
class m220526_084630_seed_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->insertFakeUsers();
    }

    private function insertFakeUsers()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $this->insert(
                'user',
                [
                    'firstName' => $faker->firstName,
                    'lastName' => $faker->lastName,
                    'password' => Yii::$app->params['password'],
                    'authKey' => $faker->uuid,
                    'accessToken' =>$faker->uuid
                ]
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220526_052215_seed_user_table cannot be reverted.\n";

        return false;
    }
}
