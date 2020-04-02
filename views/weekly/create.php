<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Weekly */

$this->title = 'Create Weekly';
$this->params['breadcrumbs'][] = ['label' => 'Weeklies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="weekly-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model
    ]) ?>

</div>
