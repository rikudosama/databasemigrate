<?php

use Phinx\Migration\AbstractMigration;

class CreateCategoriesTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $this->table('categories')
              ->addColumn('name', 'string')
              ->addColumn('slug', 'string')
              ->create();

        $this->table('posts')
              ->addColumn('category_id', 'integer', [
                'null' => true
                ])
              ->addForeignKey('category_id', 'categories', 'id', [
                'delete'=> 'SET_NULL',
                'update' => 'NO_ACTION'
                ])->update();
    }
}
