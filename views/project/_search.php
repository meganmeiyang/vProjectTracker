<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_project') ?>

    <?= $form->field($model, 'created_on') ?>

    <?= $form->field($model, 'created_by') ?>

    <?= $form->field($model, 'name_customer') ?>

    <?= $form->field($model, 'role_customer') ?>

    <?php // echo $form->field($model, 'industry_customer') ?>

    <?php // echo $form->field($model, 'name_country') ?>

    <?php // echo $form->field($model, 'text_requirements') ?>

    <?php // echo $form->field($model, 'text_solutions') ?>

    <?php // echo $form->field($model, 'name_sales') ?>

    <?php // echo $form->field($model, 'name_FAE') ?>

    <?php // echo $form->field($model, 'name_PM') ?>

    <?php // echo $form->field($model, 'quantity_sim') ?>

    <?php // echo $form->field($model, 'type_sim') ?>

    <?php // echo $form->field($model, 'service_data') ?>

    <?php // echo $form->field($model, 'service_platform') ?>

    <?php // echo $form->field($model, 'service_software') ?>

    <?php // echo $form->field($model, 'cycle_data') ?>

    <?php // echo $form->field($model, 'size_data') ?>

    <?php // echo $form->field($model, 'sales_exp_data') ?>

    <?php // echo $form->field($model, 'sales_act_data') ?>

    <?php // echo $form->field($model, 'sales_exp_sim') ?>

    <?php // echo $form->field($model, 'sales_act_sim') ?>

    <?php // echo $form->field($model, 'sales_exp_platform') ?>

    <?php // echo $form->field($model, 'sales_act_platform') ?>

    <?php // echo $form->field($model, 'sales_exp_software') ?>

    <?php // echo $form->field($model, 'sales_act_software') ?>

    <?php // echo $form->field($model, 'sales_exp_total') ?>

    <?php // echo $form->field($model, 'sales_act_total') ?>

    <?php // echo $form->field($model, 'sales_weighed_total') ?>

    <?php // echo $form->field($model, 'tag_eSIM') ?>

    <?php // echo $form->field($model, 'progress') ?>

    <?php // echo $form->field($model, 'statusy') ?>

    <?php // echo $form->field($model, 'name_operation') ?>

    <?php // echo $form->field($model, 'mode_selling') ?>

    <?php // echo $form->field($model, 'name_supplier') ?>

    <?php // echo $form->field($model, 'coverage') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
