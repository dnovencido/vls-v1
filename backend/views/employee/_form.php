<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use borales\extensions\phoneInput\PhoneInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Employee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-form">
    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'fname')->textInput() ?>

            <?= $form->field($model, 'lname')->textInput() ?>

            <?= $form->field($model, 'email')->textInput() ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'office')->widget(Select2::classname(), [
                    'data' => ArrayHelper::map($office, 'id', 'office_desc'),
                    'language' => 'en',
                    'options' => ['placeholder' => 'Select office ...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
            ?>
            
            <?= $form->field($model, 'position')->textInput() ?>     

            <?=
                $form->field($model, 'mobile_no')->widget(PhoneInput::className(), [
                    'jsOptions' => [
                        'preferredCountries' => ['nz'],
                    ]
                ]);

             ?>   
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-4 pull-right">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-block']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>   

    <?php ActiveForm::end(); ?>

</div>
