<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Project;
use yii\web\JsExpression;



$load_progress = <<< SCRIPT
	function load_progress(newvalue){
		var progress_field = document.getElementById("field_old_progress");
		progress_field.value = newvalue;
	}
	
SCRIPT;
/* @var $this yii\web\View */
/* @var $model app\models\Weekly */
/* @var $form yii\widgets\ActiveForm */
?>
<script>
	$(document).ready(function(){
		$('#weekly-id_toproject').on("select2:select", function(e){
			$('#field_old_progress').val(this.value);
			//console.log(e.params.data);
			//alert(e.params.data);
		});
	
		$('#field_old_progress').on('change', function(e){
			alert(this.value);
		});
	});
</script>


<div class="weekly-form">

    <?php $form = ActiveForm::begin(); ?>
	
	

    <?= $form->field($model, 'id_toProject')->widget(Select2::classname(),[
		'bsVersion' => '4.x',
		'data' => ArrayHelper::map(Project::find()->all(),'id_project','application','name_customer'), 
		'options' => ['placeholder' => 'Select a customer ...'],
    	'pluginOptions' => [
        	'allowClear' => true
    	],
		//'id'=>'select2_project',
		//'pluginEvents'=>[
			/*
			'onselect2-selecting' =>new JsExpression('function(this.value){
				var progressField = document.getElementById("field_old_progress");
				progressField.value = this.value;
			}'),
			*/
		//],
		]) 
	?>
		<?= $form->field($model, 'num_week')->textInput()->hint('current week is '.date('W')) ?>
	<div class="row">
		<div class="col-md-4">
		<?= $form->field($model, 'old_progress_percent')->textInput(['id'=>'field_old_progress',]) ?>
		
		</div>
	</div>
	
	<?= $form->field($model, 'item_week')->textInput(['maxlength' => true]) ?>		
	
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

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
