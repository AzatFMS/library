<?php

class m140807_080558_crete_book2reader_table extends CDbMigration
{
	public function safeUp()
	{
        $this->createTable(
            '{{book2reader}}',
            array(
                'id' => 'pk',
                'book_id' => 'int',
                'reader_id' => 'int',
            ),
            'engine=innodb'
        );
        $this->addForeignKey('book2reader_book_fk', '{{book2reader}}', 'book_id', '{{books}}', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('book2reader_reader_fk', '{{book2reader}}', 'reader_id', '{{readers}}', 'id', 'RESTRICT', 'CASCADE');
	}

	public function safeDown()
	{
        $this->dropTable('{{book2reader}}');
	}
}