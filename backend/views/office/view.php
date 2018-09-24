<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Office */

$this->title = $model->office_desc;
$this->params['breadcrumbs'][] = ['label' => 'Offices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="office-view">

    <h4><?= Html::encode($this->title) ?></h4>

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-sm',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'office_desc',
        ],
    ]) ?>

</div>
