<?php

use yii\db\Migration;

/**
 * Class m180926_115023_add_fields
 */
class m180926_115023_add_fields extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('profile', 'fname', $this->string());
        $this->addColumn('profile', 'lname', $this->string());
        $this->addColumn('profile', 'position', $this->string());
        $this->addColumn('profile', 'office_id', $this->integer());

        //Add foreign key table `office`
        $this->addForeignKey(
            'fk-office-id',
            'profile',
            'office_id',
            'office',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('profile', 'fname');
        $this->dropColumn('profile', 'lname');
        $this->dropColumn('profile', 'position');
        $this->dropColumn('profile', 'office');

        // drops foreign key for table `office`
        $this->dropForeignKey(
            'fk-office-id',
            'office'
        );

        echo "m180915_142412_added_fields cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180915_142412_added_fields cannot be reverted.\n";

        return false;
    } */
}
