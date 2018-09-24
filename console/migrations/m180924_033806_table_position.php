<?php

use yii\db\Migration;

/**
 * Class m180924_033806_table_position
 */
class m180924_033806_table_position extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $dbType = $this->db->driverName;
        $tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
        $tableOptions_mssql = "";
        $tableOptions_pgsql = "";
        $tableOptions_sqlite = "";
        
        /* MYSQL */
        if (!in_array('position', $tables))  { 
            if ($dbType == "mysql") {
                $this->createTable('{{%position}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'position_desc' => 'VARCHAR(255) NULL',
                ], $tableOptions_mysql);
            }
        }
         
        $this->execute('SET foreign_key_checks = 0');
        
        $this->insert('{{%position}}',['id'=>'1','position_desc'=>'Desktop Engineer']);
        
        $this->insert('{{%position}}',['id'=>'2','position_desc'=>'Developer']);
        
        $this->execute('SET foreign_key_checks = 1;');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->execute('SET foreign_key_checks = 0');

        $this->execute('DROP TABLE IF EXISTS `position`');

        $this->execute('SET foreign_key_checks = 1;');   

        echo "m180924_033806_table_position cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180924_033806_table_position cannot be reverted.\n";

        return false;
    }
    */
}
