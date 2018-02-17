<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category`.
 */
class m180217_130151_create_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),
            'user_id' => $this->integer(),
            'name' => $this->string(),
            'description' => $this->string(),
            'created_time' => $this->integer(),
            'status' => $this->boolean(),
        ]);

        $this->insert('category', [
            'category_id' => 1,
            'user_id' => null,
            'name' => 'Нюша',
            'description' => 'Российская певица, автор песен, композитор, актриса.',
            'created_time' => time(),
            'status' => true,
        ]);

        $this->insert('category', [
            'category_id' => 2,
            'user_id' => null,
            'name' => 'Юрий шатунов',
            'description' => 'Советский и российский певец, бывший солист группы «Ласковый май».',
            'created_time' => time(),
            'status' => true,
        ]);

        $this->insert('category', [
            'category_id' => 3,
            'user_id' => null,
            'name' => 'Олег газманов',
            'description' => 'Советский и российский эстрадный певец, композитор, поэт, актёр, продюсер. ',
            'created_time' => time(),
            'status' => true,
        ]);

        $this->addForeignKey(
            'fk_category_user_id',
            'category',
            'user_id',
            'user',
            'id',
            'CASCADE'
        ); 
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk_category_user_id', 'category');
        $this->dropTable('category');
    }
}
