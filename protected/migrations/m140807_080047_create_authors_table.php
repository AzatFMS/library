<?php

class m140807_080047_create_authors_table extends CDbMigration
{
    public function up()
    {
        $this->createTable(
            '{{authors}}',
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
        $this->dropTable('{{authors}}');
    }
}