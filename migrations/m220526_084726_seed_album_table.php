<?php

use yii\db\Migration;

/**
 * Class m220526_084726_seed_album_table
 */
class m220526_084726_seed_album_table extends Migration
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

        for ($i = 0; $i < 100; $i++) {
            $this->insert(
                'album',
                [
                    'userId' => $faker->numberBetween(1, 10),
                    'title' => $faker->sentence($nbWords = 3, $variableNbWords = true)
                ]
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220526_055022_seed_album_table cannot be reverted.\n";

        return false;
    }
}
