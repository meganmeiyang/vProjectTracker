<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Weekly */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="weekly-form">

    <?php $form = ActiveForm::begin(); ?>
	

    <?= $form->field($model, 'id_toProject')->textInput() ?>

    <?= $form->field($model, 'num_week')->textInput() ?>

    <?= $form->field($model, 'action')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_at')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_check')->widget(DatePicker::classname(),[
			'value' => date("Y-m-d"),
    		'pluginOptions' => [
				'format'=>'yyyy-mm-dd',
				'todayHighlight' => true
			]
		]
	
	)?>

    <?= $form->field($model, 'item_week')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
