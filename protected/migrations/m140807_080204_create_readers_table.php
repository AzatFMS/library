<?php

class m140807_080204_create_readers_table extends CDbMigration
{
    public function up()
    {
        $this->createTable(
            '{{readers}}',
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
        $this->dropTable('{{readers}}');
    }
}