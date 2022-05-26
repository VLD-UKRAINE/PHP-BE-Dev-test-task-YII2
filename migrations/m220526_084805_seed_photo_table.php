<?php

use yii\db\Migration;

/**
 * Class m220526_084805_seed_photo_table
 */
class m220526_084805_seed_photo_table extends Migration
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

        for ($i = 0; $i < 1000; $i++) {
            $this->insert(
                'photo',
                [
                    'albumId' => $faker->numberBetween(1, 100),
                    'title' => $faker->sentence($nbWords = 3, $variableNbWords = true),
                    'url' => $faker->url
                ]
            );
        }
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220526_060348_seed_photo_table cannot be reverted.\n";

        return false;
    }
}
