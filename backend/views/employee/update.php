<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Employee */

$this->title =  $model->fname .' '. $model->lname;
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fname .' '. $model->lname, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="employee-update">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
        'position' => $position,
        'office' => $office
    ]) ?>

</div>
