<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%files}}`.
 */
class m220303_120244_create_files_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%files}}', [
            'id' => $this->primaryKey(),
            'pdf' => $this->string(),
            'image' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%files}}');
    }
}
