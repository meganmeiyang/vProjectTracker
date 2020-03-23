<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'created_on')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_customer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'role_customer')->textInput() ?>

    <?= $form->field($model, 'industry_customer')->textInput() ?>

    <?= $form->field($model, 'name_country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text_requirements')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text_solutions')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_sales')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_FAE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_PM')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantity_sim')->textInput() ?>

    <?= $form->field($model, 'type_sim')->textInput() ?>

    <?= $form->field($model, 'service_data')->textInput() ?>

    <?= $form->field($model, 'service_platform')->textInput() ?>

    <?= $form->field($model, 'service_software')->textInput() ?>

    <?= $form->field($model, 'cycle_data')->textInput() ?>

    <?= $form->field($model, 'size_data')->textInput() ?>

    <?= $form->field($model, 'tag_eSIM')->textInput() ?>

    <?= $form->field($model, 'statusy')->textInput() ?>

    <?= $form->field($model, 'name_operation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mode_selling')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
