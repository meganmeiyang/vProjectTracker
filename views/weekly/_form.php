<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Weekly */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="weekly-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_week')->textInput() ?>

    <?= $form->field($model, 'name_submitter')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_submitted')->textInput() ?>

    <?= $form->field($model, 'id_toProject')->textInput() ?>

    <?= $form->field($model, 'num_week')->textInput() ?>

    <?= $form->field($model, 'action')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_at')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_check')->textInput() ?>

    <?= $form->field($model, 'date_modified')->textInput() ?>

    <?= $form->field($model, 'name_modifiedBy')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'item_week')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
