<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 */
class m180217_145027_create_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),
            'product_id' => $this->integer(),
            'name' => $this->string(),
            'description' => $this->integer(),
            'quantity' => $this->integer(),
            'price' => $this->float(),
            'created_time' => $this->integer(),
            'status' => $this->boolean(),
        ]);

        $this->createIndex('category_id_index', 'category', 'category_id');

        $this->addForeignKey(
            'fk_product_cat_id',
            'product',
            'category_id',
            'category',
            'category_id',
            'CASCADE'
        );

        //Category 1
        $this->insert('product', [
            'category_id' => 1,
            'product_id' => 1,
            'name' => 'Выше',
            'description' => 'Альбом: Выбирать чудо 2010г.',
            'quantity' => 15,
            'price' => 20.00,
            'created_time' => time(),
            'status' => true,
        ]);

        $this->insert('product', [
            'category_id' => 1,
            'product_id' => 2,
            'name' => 'Где ты, там я',
            'description' => 'Альбом: Объединение 2012г.',
            'quantity' => 20,
            'price' => 25.50,
            'created_time' => time(),
            'status' => true,
        ]);

        $this->insert('product', [
            'category_id' => 1,
            'product_id' => 3,
            'name' => 'Цунами',
            'description' => 'Альбом: Объединение 2012г. Лучший трек года.',
            'quantity' => 15,
            'price' => 40.99,
            'created_time' => time(),
            'status' => true,
        ]);

        //Category 2
        $this->insert('product', [
            'category_id' => 2,
            'product_id' => 4,
            'name' => 'Седая ночь',
            'description' => 'Альбом: Золотой альбом 2002г.',
            'quantity' => 1040,
            'price' => 90.00,
            'created_time' => time(),
            'status' => true,
        ]);

        $this->insert('product', [
            'category_id' => 2,
            'product_id' => 5,
            'name' => 'Забудь',
            'description' => 'Альбом: Запиши мой голос 2006г.',
            'quantity' => 650,
            'price' => 99.99,
            'created_time' => time(),
            'status' => true,
        ]);

        //Category 3
        $this->insert('product', [
            'category_id' => 3,
            'product_id' => 6,
            'name' => 'Офицеры',
            'description' => 'Альбом: Морячка 1993г.',
            'quantity' => 5,
            'price' => 350.50,
            'created_time' => time(),
            'status' => true,
        ]);

        $this->insert('product', [
            'category_id' => 3,
            'product_id' => 7,
            'name' => 'Есаул',
            'description' => 'Альбом: Эскадрон 2007г.',
            'quantity' => 1400,
            'price' => 300.00,
            'created_time' => time(),
            'status' => true,
        ]);

        $this->insert('product', [
            'category_id' => 3,
            'product_id' => 8,
            'name' => 'Загулял',
            'description' => 'Альбом: Загулял 1991.',
            'quantity' => 40,
            'price' => 150.00,
            'created_time' => time(),
            'status' => true,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk_product_cat_id', 'product');
        $this->dropIndex('category_id_index', 'category');
        $this->dropTable('product');
    }
}
