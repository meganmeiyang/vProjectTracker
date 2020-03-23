<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Weekly */
/* @var $form ActiveForm */
?>
<div class="site-add-weekly">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'id_week') ?>
        <?= $form->field($model, 'num_week') ?>
        <?= $form->field($model, 'id_toProject') ?>
        <?= $form->field($model, 'date_submitted') ?>
        <?= $form->field($model, 'date_check') ?>
        <?= $form->field($model, 'date_modified') ?>
        <?= $form->field($model, 'name_submitter') ?>
        <?= $form->field($model, 'action') ?>
        <?= $form->field($model, 'name_at') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-add-weekly -->
