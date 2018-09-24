<?php
use kartik\nav\NavX;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';

$userRole = Yii::$app->authManager->getRolesByUser(Yii::$app->user->id);
if(array_key_exists('Super Administrator', $userRole)){
    $menuItems = [
    
            ['label' => '<span class="glyphicon glyphicon-list-alt"></span> Dashboard', 'url' => ['/site/index'], 'active' => in_array(\Yii::$app->controller->id, ['site']),],
            ['label' => '<span class="glyphicon glyphicon-user"></span> Manage Administrators', 'items' => [
                ['label' => 'List of Administrators', 'url' => ['/user/admin/index']],
                ['label' => 'Roles', 'url' => ['/rbac/role/index']],
                ['label' => 'Permissions', 'url' => ['rbac/permission/index']],
            ]],
            ['label' => '<span class="glyphicon glyphicon-book"></span> Employee Records','url' => ['/employee/index'], 'active' => in_array(\Yii::$app->controller->id, ['employee'])],   
            ['label' => '<span class="glyphicon glyphicon-home"></span> Offices', 'url' => ['/office/index'], 'active' => in_array(\Yii::$app->controller->id, ['office']),],
            ['label' => '<span class="glyphicon glyphicon-folder-open"></span> Positions', 'url' => ['/position/index'], 'active' => in_array(\Yii::$app->controller->id,['position']),],
            '<li class="divider"></li>',
            //['label' => 'Separated link', 'url' => '#'],
        
    ];
} else {
    $menuItems = [
        ['label' => '<span class="glyphicon glyphicon-list-alt"></span> Dashboard', 'url' => ['/site/index']],
        ['label' => '<span class="glyphicon glyphicon-book"></span> Employee Records', 'url' => '#'],   
        ['label' => '<span class="glyphicon glyphicon-home"></span> Offices', 'url' => '#'],
        '<li class="divider"></li>',
        //['label' => 'Separated link', 'url' => '#'],
    ];
}

?>

<div class="navigation-list-menu">
 <?=
    NavX::widget([
        'options' => ['class' => 'nav nav-pills'],
        'items' => $menuItems,
        'encodeLabels' => false
    ]);
 ?>
</div>

