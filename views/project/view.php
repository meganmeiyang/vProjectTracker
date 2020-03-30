<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Project */

$this->title = $model->id_project;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="project-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_project], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_project], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_project',
            'created_on:datetime',
            'created_by',
            'name_customer',
            //'role_customer',
			'role.content_role',
            //'industry_customer',
			'industry.content_industry',
            'name_country',
            'text_requirements',
            'text_solutions',
			'sellmodel.content_selling_model',
            'name_sales',
            'name_FAE',
            'name_PM',
			//*****SIM related:
            'quantity_sim',
            //'type_sim',
			'simtype.content_type_sim',
			'sales_exp_sim:currency',
            'sales_act_sim:currency',
            //'service_data',
			//******Data related fields:
			[
				'label'=>'Has data?',
				'value'=>$model->boolean_data->content_type_boolean
			],
			//'cycle_data',
			'cycle.content_type_cycle',
            'size_data',
			'name_supplier',
            'coverage',
			'sales_exp_data:currency',
            'sales_act_data:currency',
			
			//******Platform related fields:
			[
				'label'=>'Platform Info:',
				'value'=>'',
				'captionOptions'=> [
					'style'=>'text-white bg-orange',
					'colspan'=> 'all'
				]
			],
			'boolean_platform.content_type_boolean',
			'sales_exp_platform:currency',
            'sales_act_platform:currency',
            //'service_platform',
            //'service_software',
			//******Platform related fields:
			[
				'label'=>'Software Info:',
				'value'=>'',
				'class'=>'text-white bg-orange'
			],
			'boolean_software.content_type_boolean',
					
			[
				'label'=>'Does software include eSIM app',
				'value'=>'boolean_esim.content_type_boolean'
			],
			'sales_exp_software:currency',
			'sales_act_software:currency',
			
			///////sales summary
			/*[
				'label'=>'Summary:',
				'value'=>'',
				'class'=>'text-white bg-orange'
			],*/
			'progressx.content_progress',
            'status.content_data_status',
            'sales_exp_total:currency',
			'sales_act_total:currency',
            'sales_weighed_total:currency',
            //'tag_eSIM',
            //'name_operation',
				
        ],
    ]) ?>

</div>
