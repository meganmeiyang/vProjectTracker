<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Project;


/* @var $this yii\web\View */
/* @var $model app\models\Weekly */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="weekly-form">

    <?php $form = ActiveForm::begin(); ?>
	

    <?= $form->field($model, 'id_toProject')->widget(Select2::classname(),[
		'data' => ArrayHelper::map(Project::find()->all(),'id_project','application','name_customer'), 
		'options' => ['placeholder' => 'Select a customer ...'],
    	'pluginOptions' => [
        	'allowClear' => true
    	],
		
		]) 
	?>
			

    <?= $form->field($model, 'num_week')->textInput()->hint('current week is '.date('W')) ?>

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
