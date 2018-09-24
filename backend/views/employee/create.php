<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Employee */

$this->title = 'Add Employee';
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-create">

    <div class="well"><?= Html::encode($this->title) ?></div>

    <?= $this->render('_form', [
        'model' => $model,
        'position' => $position,
        'office' => $office
    ]) ?>

</div>
