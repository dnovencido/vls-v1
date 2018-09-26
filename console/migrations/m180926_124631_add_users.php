<?php

use yii\db\Migration;

/**
 * Class m180926_124631_add_users
 */
class m180926_124631_add_users extends Migration
{
     
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
    public function safeDown()
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

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180926_124631_add_users cannot be reverted.\n";

        return false;
    }
    */
}
