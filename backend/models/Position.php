<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "position".
 *
 * @property int $id
 * @property string $position_desc
 *
 * @property Profile[] $profiles
 */
class Position extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'position';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['position_desc'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'position_desc' => 'Position'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployees()
    {
        return $this->hasMany(Employee::className(), ['position' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfiles()
    {
        return $this->hasMany(Profile::className(), ['position_id' => 'id']);
    }
}
