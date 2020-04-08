<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Project;
use yii\web\JsExpression;
use yii\web\View;
use yii\helpers\Json;
use app\models\DataProgress;

?>

<?php


$options = [
    'appName' => Yii::$app->name,
    'targetUrl' => Yii::$app->urlManager->createUrl('weekly/ajprocess'),
    'language' => Yii::$app->language,
    // ...
];


$this->registerJs(
	"var options = ". Json::htmlEncode($options). ";".
	
	//once project is selected, the old-progress of this project will be loaded automatically
	"$('#weekly-id_toproject').on('select2:select', function(e){
		console.log(e);
		$.ajax({
		
		type:'POST',
		url: options.targetUrl,
		data:{ selected:e.params.data.id},
		dataType: 'json',
		error: function(xhr, tStatus, e){alert('we havea an error');console.log(e);},
		success: function(data){
			//alert(data.progress);
			//console.log($('#weekly-old_progress_percent'));
			console.log(data.progress);
			$('#weekly-old_progress_percent').val(data.progress);
			$('#weekly-old_progress_percent').trigger('change');
		}
	});
		
	}); 
	",
	
	View::POS_READY,
	"js-load-progress" //my-button-handler,id of the script

);

?>



<div class="weekly-form">

    <?php $form = ActiveForm::begin(); ?>
	<h3>Project Info</h3>
	<hr>
	<div class="row">
		<div class="col-md-6">
    <?= $form->field($model, 'id_toProject')->widget(Select2::classname(),[
		'bsVersion' => '4.x',
		'data' => ArrayHelper::map(Project::find()->all(),'id_project','application','name_customer'), 
		'options' => ['placeholder' => 'Select a customer ...'],
    	'pluginOptions' => [
        	'allowClear' => true
    	],
		'theme'=>Select2::THEME_KRAJEE,
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
		</div>
		<div class="col-md-6">
		<?= $form->field($model, 'num_week')->textInput()->hint('current week is '.date('W')) ?>
		</div>
		
		</div>
		<div class="row">	
		<div class="col-md-6">
		<!--?= $form->field($model, 'old_progress_percent')->textInput(['id'=>'field_old_progress',]) ?-->
		<!--change to a select2-->
		<?= $form->field($model, 'old_progress_percent')->widget(Select2::classname(),[
		'bsVersion' => '4.x',
		'data' => ArrayHelper::map(DataProgress::find()->all(),'iddata_progress','content_progress'), 
		'options' => ['placeholder' => 'Select the new progress ...'],
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
		])->label('Progress to change')->hint('Here displays the current progress.. Select the new progress if there is one, or keep it unchanged.') 
			?>
		
		</div><!--col-md-4-->
		</div>
		<h3>Weekly Updates</h3>
		<hr>
	<div class="row">
		<div class="col-md-6">
	<?= $form->field($model, 'item_week')->textInput(['maxlength' => true]) ?>		
		</div>
	<div class="col-md-6">	
    <?= $form->field($model, 'action')->textInput(['maxlength' => true]) ?>
	</div>
	</div>
	<div class="row">
	<div class="col-md-6">
    <?= $form->field($model, 'name_at')->textInput(['maxlength' => true]) ?>
	</div>
	
	<div class="col-md-6">
    <?= $form->field($model, 'date_check')->widget(DatePicker::classname(),[
			'value' => date("Y-m-d"),
    		'pluginOptions' => [
				'format'=>'yyyy-mm-dd',
				'todayHighlight' => true
			]
		]
	
	)?>
	</div>
	</div> <!--end of row-->

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
