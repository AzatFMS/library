<?php

class m140807_080609_crete_book2author_table extends CDbMigration
{
    public function safeUp()
    {
        $this->createTable(
            '{{book2author}}',
            array(
                'id' => 'pk',
                'book_id' => 'int',
                'author_id' => 'int',
            ),
            'engine=innodb'
        );
        $this->addForeignKey('book2author_book_fk', '{{book2author}}', 'book_id', '{{books}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('book2author_author_fk', '{{book2author}}', 'author_id', '{{authors}}', 'id', 'RESTRICT', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropTable('{{book2author}}');
    }
}