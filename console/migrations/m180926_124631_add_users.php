<?php

use yii\db\Migration;

/**
 * Class m180926_124631_add_users
 */
class m180926_124631_add_users extends Migration
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
        if (!in_array('user', $tables))  { 
            if ($dbType == "mysql") {
                $this->createTable('{{%user}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'username' => 'VARCHAR(255) NOT NULL',
                    'email' => 'VARCHAR(255) NOT NULL',
                    'password_hash' => 'VARCHAR(60) NOT NULL',
                    'auth_key' => 'VARCHAR(32) NOT NULL',
                    'confirmed_at' => 'INT(11) NULL',
                    'unconfirmed_email' => 'VARCHAR(255) NULL',
                    'blocked_at' => 'INT(11) NULL',
                    'registration_ip' => 'VARCHAR(45) NULL',
                    'created_at' => 'INT(11) NOT NULL',
                    'updated_at' => 'INT(11) NOT NULL',
                    'flags' => 'INT(11) NOT NULL',
                    'last_login_at' => 'INT(11) NULL',
                ], $tableOptions_mysql);
            }
        }
         
        /* MYSQL */
        if (!in_array('profile', $tables))  { 
            if ($dbType == "mysql") {
                $this->createTable('{{%profile}}', [
                    'user_id' => 'INT(11) NOT NULL',
                    0 => 'PRIMARY KEY (`user_id`)',
                    'name' => 'VARCHAR(255) NULL',
                    'public_email' => 'VARCHAR(255) NULL',
                    'gravatar_email' => 'VARCHAR(255) NULL',
                    'gravatar_id' => 'VARCHAR(32) NULL',
                    'location' => 'VARCHAR(255) NULL',
                    'website' => 'VARCHAR(255) NULL',
                    'bio' => 'TEXT NULL',
                    'timezone' => 'VARCHAR(40) NULL',
                    'fname' => 'VARCHAR(255) NULL',
                    'lname' => 'VARCHAR(255) NULL',
                    'position_id' => 'INT(11) NULL',
                    'office_id' => 'INT(11) NULL',
                ], $tableOptions_mysql);
            }
        }
         
         
        $this->createIndex('idx_UNIQUE_username_42_00','user','username',1);
       
        $this->createIndex('idx_UNIQUE_email_42_01','user','email',1);
       
        $this->createIndex('idx_office_id_43_02','profile','office_id',0);
       
        $this->createIndex('idx_position_id_43_03','profile','position_id',0);
         
        $this->execute('SET foreign_key_checks = 0');
       
        $this->addForeignKey('fk_office_43_00','{{%profile}}', 'office_id', '{{%office}}', 'id', 'CASCADE', 'NO ACTION' );
       
        $this->addForeignKey('fk_position_43_01','{{%profile}}', 'position_id', '{{%position}}', 'id', 'CASCADE', 'NO ACTION' );
       
        $this->addForeignKey('fk_user_43_02','{{%profile}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'NO ACTION' );
       
        $this->execute('SET foreign_key_checks = 1;');
         
        $this->execute('SET foreign_key_checks = 0');
       
        $this->insert('{{%user}}',['id'=>'1','username'=>'Denver','email'=>'dnovencido@gmail.com','password_hash'=>'$2y$10$kRJ2h/gRl8mkj6wYLkbEWeloDhtzOyaCYDiJmL.At9sYVfJKTXCfW','auth_key'=>'Z3VgBCjylqba5DGZrvLAW9gAj9jteCoT','confirmed_at'=>'1','unconfirmed_email'=>'','blocked_at'=>'','registration_ip'=>'::1','created_at'=>'1537027562','updated_at'=>'1537027562','flags'=>'0','last_login_at'=>'1537887019']);
       
        $this->insert('{{%user}}',['id'=>'2','username'=>'Juan','email'=>'juan@gmail.com','password_hash'=>'$2y$10$we45YzFnuVXQi1I80M54XOX5JsNFWaK4oIELveiOmEPQn6aruPj1i','auth_key'=>'ZxY83oGVNwwtxN5RlOEcJ_oD1LXYdX7O','confirmed_at'=>'1537028116','unconfirmed_email'=>'','blocked_at'=>'','registration_ip'=>'::1','created_at'=>'1537028116','updated_at'=>'1537196059','flags'=>'0','last_login_at'=>'1537885249']);
       
        $this->insert('{{%profile}}',['user_id'=>'1','name'=>'','public_email'=>'','gravatar_email'=>'','gravatar_id'=>'','location'=>'','website'=>'','bio'=>'','timezone'=>'','fname'=>'','lname'=>'','position_id'=>'','office_id'=>'']);
       
        $this->insert('{{%profile}}',['user_id'=>'2','name'=>'Juan Dela Cruz','public_email'=>'juan@gmail.com','gravatar_email'=>'','gravatar_id'=>'','location'=>'','website'=>'','bio'=>'','timezone'=>'','fname'=>'Juan','lname'=>'Dela Cruz','position_id'=>'2','office_id'=>'2']);
       
        $this->execute('SET foreign_key_checks = 1;');
    }
 

    /**
     * {@inheritdoc}
     */ 
    public function down()
    {

        $this->execute('SET foreign_key_checks = 0');

        $this->execute('DROP TABLE IF EXISTS `user`');

        $this->execute('SET foreign_key_checks = 1;');

        $this->execute('SET foreign_key_checks = 0');

        $this->execute('DROP TABLE IF EXISTS `profile`');

        $this->execute('SET foreign_key_checks = 1;');

        echo "m180926_124631_add_users cannot be reverted.\n";

        return false;
    }
    
}
