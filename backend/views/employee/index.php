<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Office;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-index">

    <p>
        <?= Html::a('Add Employee', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'fname',

            'lname',

            'position',

            [
                'value' => 'officeName',
                'filter'=>Select2::widget([
                    'model' =>  $searchModel,
                    'attribute' => 'office',
                    'data' => ArrayHelper::map(Office::find()->asArray()->all(), 'id', 'office_desc'),
                    'options' => [
                        'placeholder' => 'Select Region ...',
                        'multiple' => true
                    ],                    
                ]),
            ], 

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
