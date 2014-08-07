<?php

class m140807_075431_crete_books_table extends CDbMigration
{
	public function up()
	{
        $this->createTable(
            '{{books}}',
            array(
                'id' => 'pk',
                'name' => 'varchar(500)',
                'time_updated' => 'int',
                'time_created' => 'int',
            ),
            'engine=innodb'
        );
	}

	public function down()
	{
		$this->dropTable('{{books}}');
	}
}