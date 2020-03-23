<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WeeklySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="weekly-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_week') ?>

    <?= $form->field($model, 'name_submitter') ?>

    <?= $form->field($model, 'date_submitted') ?>

    <?= $form->field($model, 'id_toProject') ?>

    <?= $form->field($model, 'num_week') ?>

    <?php // echo $form->field($model, 'action') ?>

    <?php // echo $form->field($model, 'name_at') ?>

    <?php // echo $form->field($model, 'date_check') ?>

    <?php // echo $form->field($model, 'date_modified') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
