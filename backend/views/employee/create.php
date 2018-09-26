<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Employee */

$this->title = 'Add employee';
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-create">

    <div class="alert alert-info">
    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  	<span class="glyphicon glyphicon-user"></span> <?= Html::encode($this->title) ?> </div>
	</div>

    <?= $this->render('_form', [
        'model' => $model,
        'position' => $position,
        'office' => $office
    ]) ?>

</div>
