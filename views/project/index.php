<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Projects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Project', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_project',
            //'created_on',
            //'created_by',
			'name_country',
            'name_customer',
            //'role_customer',
			'role.content_role',
            //'industry_customer',
            //
            //'text_requirements',
            'text_solutions',
			//'mode_selling',
			'sellmodel.content_selling_model',
            //'name_sales',
            //'name_FAE',
            //'name_PM',
            'quantity_sim',
            //'type_sim',
            'simtype.content_type_sim',
			//'service_data',
            //'service_platform',
            //'service_software',
            //'cycle_data',
            'cycle.content_type_cycle',
			'size_data',
			'name_supplier',
            'coverage',
            //'sales_exp_data',
            //'sales_act_data',
            //'sales_exp_sim',
            //'sales_act_sim',
            //'sales_exp_platform',
            //'sales_act_platform',
            //'sales_exp_software',
            //'sales_act_software',
            'sales_exp_total',
            'sales_act_total',
            'sales_weighed_total',
            //'tag_eSIM',
            //'progress',
            'progressx.content_progress',
			'status.content_data_status',
			'exp_mp_date',	
			//'statusy',
            
			//'name_operation',
            
				
			
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
