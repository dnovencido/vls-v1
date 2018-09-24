<?php

use yii\db\Migration;

/**
 * Class m180924_034143_table_employee
 */
class m180924_034143_table_employee extends Migration
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
        if (!in_array('office', $tables))  { 
            if ($dbType == "mysql") {
                $this->createTable('{{%office}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'office_desc' => 'VARCHAR(255) NULL',
                ], $tableOptions_mysql);
            }
        }
         
        $this->execute('SET foreign_key_checks = 0');

        $this->insert('{{%office}}',['id'=>'2','office_desc'=>'Region 1']);

        $this->insert('{{%office}}',['id'=>'4','office_desc'=>'Head Office']);

        $this->execute('SET foreign_key_checks = 1;');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->execute('SET foreign_key_checks = 0');

        $this->execute('DROP TABLE IF EXISTS `employee`');

        $this->execute('SET foreign_key_checks = 1;');       
         
        echo "m180924_034143_table_employee cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180924_034143_table_employee cannot be reverted.\n";

        return false;
    }
    */
}
