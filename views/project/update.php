<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Project */

if(!$boolvalue)
{ //true: view
	$this->title = 'Update Project: ' . $model->id_project;
}
else{
	
	$this->title = 'View Project: ' . $model->id_project;
		
}

$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_project, 'url' => ['view', 'id' => $model->id_project]];
if(!$boolvalue)
{
	$this->params['breadcrumbs'][] = 'Update';		
}
else
{
	$this->params['breadcrumbs'][] = 'View';
	
}
	
?>
<div class="project-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'boolvalue' => $boolvalue
    ]) ?>

</div>
