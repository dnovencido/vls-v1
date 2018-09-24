<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Office */

$this->title = 'Update Office: ' . $model->office_desc;
$this->params['breadcrumbs'][] = ['label' => 'Offices', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->office_desc, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="office-update">
 
	<div class="alert alert-info">
	  <span class="glyphicon glyphicon-pencil"></span> <?= Html::encode($this->title) ?>
	</div>
	
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
