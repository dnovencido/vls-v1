<?php

namespace backend\models;

use Yii;
use borales\extensions\phoneInput\PhoneInputValidator;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property int $fname
 * @property int $lname
 * @property int $address
 * @property int $office
 * @property int $position
 * @property int $mobile_no
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fname'], 'string', 'max' => 55],
            [['lname'], 'string', 'max' => 65],
            [['address'], 'string', 'max' => 155],
            [['fname', 'lname', 'address'], 'trim'],
            [['fname', 'lname', 'address', 'office', 'position', 'mobile_no'], 'required'],
            [['office', 'position'], 'integer'],
            [['mobile_no'], 'string'],
            [['mobile_no'], PhoneInputValidator::className()],            
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fname' => 'First name',
            'lname' => 'Last name',
            'address' => 'Address',
            'office' => 'Office',
            'mobile_no' => 'Mobile Number',
            'PositionName' => 'Position'            
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPositionTable()
    {
        return $this->hasOne(Position::className(), ['id' => 'position']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfficeTable()
    {
        return $this->hasOne(Office::className(), ['id' => 'office']);
    }

    public function getPositionName()
    {
        return $this->positionTable->position_desc;
    }

    public function getOfficeName()
    {
        return $this->officeTable->office_desc;
    }

}
