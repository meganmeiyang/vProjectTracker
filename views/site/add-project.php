<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Project */
/* @var $form ActiveForm */
?>
<div class="site-add-project">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'created_on') ?>
        <?= $form->field($model, 'name_customer') ?>
        <?= $form->field($model, 'name_country') ?>
        <?= $form->field($model, 'quantity_sim') ?>
        <?= $form->field($model, 'type_sim') ?>
        <?= $form->field($model, 'service_data') ?>
        <?= $form->field($model, 'service_platform') ?>
        <?= $form->field($model, 'service_software') ?>
        <?= $form->field($model, 'cycle_data') ?>
        <?= $form->field($model, 'size_data') ?>
        <?= $form->field($model, 'sales_data') ?>
        <?= $form->field($model, 'sales_sim') ?>
        <?= $form->field($model, 'sales_platform') ?>
        <?= $form->field($model, 'sales_software') ?>
        <?= $form->field($model, 'tag_eSIM') ?>
        <?= $form->field($model, 'statusx') ?>
        <?= $form->field($model, 'statusy') ?>
        <?= $form->field($model, 'mode_selling') ?>
        <?= $form->field($model, 'industry_customer') ?>
        <?= $form->field($model, 'role_customer') ?>
        <?= $form->field($model, 'created_by') ?>
        <?= $form->field($model, 'name_sales') ?>
        <?= $form->field($model, 'name_FAE') ?>
        <?= $form->field($model, 'name_PM') ?>
        <?= $form->field($model, 'name_operation') ?>
        <?= $form->field($model, 'text_requirements') ?>
        <?= $form->field($model, 'text_solutions') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-add-project -->
