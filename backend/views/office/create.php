<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Office */

$this->title = 'Add Office';
$this->params['breadcrumbs'][] = ['label' => 'Offices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="office-create">

    <div class="alert alert-info">
    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  	<span class="glyphicon glyphicon-home"></span> <?= Html::encode($this->title) ?> </div>
	</div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
