<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Weekly */

$this->title = 'Update Weekly: ' . $model->id_week;
$this->params['breadcrumbs'][] = ['label' => 'Weeklies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_week, 'url' => ['view', 'id' => $model->id_week]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="weekly-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
