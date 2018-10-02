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

        if (!in_array('employee', $tables))  { 
            if ($dbType == "mysql") {
                $this->createTable('{{%employee}}', [
                    'id' => 'INT(11) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'fname' => 'VARCHAR(55) NULL',
                    'lname' => 'VARCHAR(55) NULL',
                    'address' => 'VARCHAR(255) NULL',
                    'email' => 'VARCHAR(55) NULL',
                    'office' => 'INT(11) NULL',
                    'position' => 'VARCHAR(255) NULL',
                    'mobile_no' => 'VARCHAR(255) NULL',
                ], $tableOptions_mysql);
            }
        }
        
        $this->createIndex('idx_office_46_01','employee','office',0);
         
        $this->execute('SET foreign_key_checks = 0');
        
        $this->addForeignKey('fk_office_46_01','{{%employee}}', 'office', '{{%office}}', 'id', 'CASCADE', 'NO ACTION' );
        
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
