<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">
	
	
    <?php $form = kartik\form\ActiveForm::begin([
		
		'disabled'=> $boolvalue,
		
	
	]); ?>
	<hr>
	<h4> Customer Info</h4>
    <div class="row">
		<div class="col-md-6"><?= $form->field($model, 'name_customer')->textInput(['maxlength' => true]) ?> </div>
		<div class="col-md-6"><?= $form->field($model, 'name_country')->textInput(['maxlength' => true]) ?> </div>
	</div>
	<div class="row">
    <div class="col-md-4"><?= $form->field($model, 'role_customer')->dropDownList([1=>'MNO', 2=>'MVNO', 3=>'OEM', 4=>'OES', 5=>'ODM', 6=>'Government',7=>'Agency',8=>'Others'])?> </div>

    <div class="col-md-4"><?= $form->field($model, 'industry_customer')->dropDownList([1=>'IOT',2=>'Tourism']) ?> </div>
	<div class="col-md-4"><?= $form->field($model, 'application')->textInput(['maxlength' => true]) ?> </div>

	</div>

	<hr>
	<h4> Requirements and solution </h4>
	<div class="col-md-6">
    <?= $form->field($model, 'text_requirements')->textArea(['maxlength' => true]) ?>
	</div>
	
    <div class="col-md-6"><?= $form->field($model, 'text_solutions')->textArea(['maxlength' => true]) ?></div>
	<?= $form->field($model, 'mode_selling')->radioList([1=>'Direct Selling', 2=>'Distribution'], ['inline'=>true]) ?>
	
	<hr>
	<div class="row">
    	<div class="col-md-4"><?= $form->field($model, 'name_sales')->textInput(['maxlength' => true]) ?></div>

    	<div class="col-md-4"><?= $form->field($model, 'name_FAE')->textInput(['maxlength' => true]) ?></div>

    	<div class="col-md-4"><?= $form->field($model, 'name_PM')->textInput(['maxlength' => true]) ?></div>
	</div>
	<hr>
	<h4>Products and Services </h4>
    <hr>
	<h5>1. SIMs </h5>
    <?= $form->field($model, 'type_sim')->radioList([1=>'Plastic SIM', 2=>'SoftSIM', 3=>'ChipSIM', 4=>'eSIM',5=>'Others', 6=>'noSIM'],['inline'=>true])->label("SIM Type") ?>
	<?= $form->field($model, 'quantity_sim')->textInput()->label("SIM Annual Quantity") ?>
	<div class="row">
		<div class="col-md-6">
		<?= $form->field($model,'sales_exp_sim')->textInput(['maxlength' => true]) ->label("Expected annual SIM sales (USD)")?>
		</div>
		<div class="col-md-6">
		<?= $form->field($model,'sales_act_sim')->textInput(['maxlength' => true])->label("Actual SIM sales (USD)")?>
	</div>
	</div>
	<hr>

	<h5> 2. Data </h5>
	<div class="row">
    	<div class="col-md-6"><?= $form->field($model, 'service_data')->radioList([1=>'Yes', 2=>'No'],['inline'=>true])->label("Service includes data?") ?></div>
		<div class="col-md-6"><?= $form->field($model, 'cycle_data')->radioList([1=>'Month', 2=>'Year', 3=>'Day', 4=>'Others'],['inline'=>true]) ?></div>
	</div>
	<div class="row">
		<div class="col-md-6">
		<?= $form->field($model,'sales_exp_data')->textInput(['maxlength' => true]) ->label("Expected annual data sales (USD)")?>
		</div>
		<div class="col-md-6">
		<?= $form->field($model,'sales_act_data')->textInput(['maxlength' => true])->label("Actual data sales (USD)")?>
		</div>
	</div>
	<div class="row">
	    	<div class="col-md-4"><?= $form->field($model, 'coverage')->textInput()->label("Country(ies) to be covered") ?></div>
		<div class="col-md-4"><?= $form->field($model, 'size_data')->textInput() ->label("Required data size (MB)") ?></div>
		<div class="col-md-4"><?= $form->field($model, 'name_supplier')->textInput()->label("Data Supplier(s)") ?></div>
	</div>
<?php
$script = <<< JS
$("#project-service_data").change(function(){
		
        var val = $('#project-service_data').val();
		console.log(val);
        if(val == 2 ) {
          $('#project-sales_exp_data').hide();
        } else {
          $('#project-sales_exp_data').show();
        }
});

JS;
$this->registerJs($script);
?>
	<hr>
	<h5> 3. Platform </h5>
	<p> CMP, RSP/OTA, licensing model or intergraton </p>
    <?= $form->field($model, 'service_platform')->radioList([1=>'Yes', 2=>'No'],['inline'=>true])->label("Service includes platform?") ?>
	<div class="row">
		<div class="col-md-6">
		<?= $form->field($model,'sales_exp_platform')->textInput(['maxlength' => true]) ->label("Expected annual platform sales (USD)")?>
		</div>
		<div class="col-md-6">
		<?= $form->field($model,'sales_act_platform')->textInput(['maxlength' => true])?>
		</div>
	</div>	

	<hr>
	<h5> 4. Software </h5>
	<p>Software tool/app/web/toolkit/SDK etc development</p>
	<div class="row">
    	<div class="col-md-6"><?= $form->field($model, 'service_software')->radioList([1=>'Yes', 2=>'No'],['inline'=>true]) ->label("Service includes software?")?></div>
	
    	<div class="col-md-6"><?= $form->field($model, 'tag_eSIM')->radioList([1=>'yes', 2=>'no'],['inline'=>true])->label("Is the software eSIM App?") ?></div>
	</div>
	<div class="row">
		<div class="col-md-6">
		<?= $form->field($model,'sales_exp_software')->textInput(['maxlength' => true]) ->label("Expected software sales (USD)")?>
		</div>
		<div class="col-md-6">
		<?= $form->field($model,'sales_act_software')->textInput(['maxlength' => true])?>
		</div>
	</div>	
	<hr>
	<h4> Progress </h4>

    <?= $form->field($model, 'progress')-> radioList([1=>'10%:engaged or demoed', 2=>'20%:hw/sw design completed', 3=>'30%:quoted', 4=>'50%:mgmt accepted', 5=>'60%:poc/sample tested', 6=>'80%:pilot order', 7=>'100%:MP'], ['inline'=>true])->hint("weighed sales = expected sales x progress%") ?>
    <div class="row">
	<div class="col-md-6"><?= $form->field($model, 'statusy')->dropDownList([1=>'ongoing', 2=>'suspended', 3=>'terminted', 4=>'closed/MP']) ?></div>   
	<div class="col-md-6"><?= $form->field($model, 'exp_mp_date')->widget(\yii\widgets\MaskedInput::className(), ['mask' => '9999-99',])->label("Targeted Mass Production Date (yyyy-mm)") ?></div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success', 'disabled'=>$boolvalue]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
