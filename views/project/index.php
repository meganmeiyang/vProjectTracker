<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use app\models\Project;
use app\models\Weekly;
use yii\bootstrap\Progress;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Projects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Project', ['create'], ['class' => 'btn button3']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,		
        'filterModel' => $searchModel,	
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            [   'width'=>'17px',
				'attribute'=>'id_project',
            ],
			//'created_on',
            //'created_by',
			[
				'width'=>'30px',
				'attribute'=>'name_country',
			],
            [
				'attribute'=>'name_customer',
				'width'=>'35px',	
					
				
				//['style'=>'color:#333333'],
				
			],
            //'role_customer',
			[
				'attribute'=>'role.content_role',
					'width'=>'20px',
			],
            //'industry_customer',
            [
				'attribute'=>'application',
					'width'=>'45px',
			],
			[
				'attribute'=>'name_sales',
					'width'=>'50px',
			],
            //'text_requirements',
            //'text_solutions',
			//'mode_selling',
			//'sellmodel.content_selling_model',
            //'name_sales',
            //'name_FAE',
            //'name_PM',
			[
				'attribute'=>'simtype.content_type_sim',
					'width'=>'40px',
			],
            [
				'attribute'=>'quantity_sim',
				'width'=>'30px',
				'value'=> function($model){
					return $model->quantity_sim/1000;
				},
				'format'=> 'decimal',
			],
            //'type_sim',
            [
				'label'=>'Data requirements',
					'width'=>'50px',
				'attribute'=>'name_supplier',
				'value' => function ($model, $key, $index, $widget) { 
					if($model->service_data == 2){//No
						return "N.A";
					}
					//return (string)$model->size_data + " per "+$model->cycle->content_type_cycle + " "+ $model->coverage + " by " + $model-> name_supplier;
					return $model->size_data. "MB/" . $model->cycle->content_type_cycle. " in ".$model->coverage." by ".$model->name_supplier;//'size_data', 'cycle.content_type_cycle', 'coverage', 'name_supplier');
				},
				//'filterType' => GridView::FILTER_SELECT2,
				//'filter' => ArrayHelper::map(Project::find()->orderBy('size_data')->asArray()->all(), 'coverage', 'name_supplier'), 
			],
			//'service_data',
			
            //'service_platform',
            //'service_software',
            //'cycle_data',
            //'cycle.content_type_cycle',
			//'size_data',
			//'name_supplier',
            //'coverage',
            //'sales_exp_data',
            //'sales_act_data',
            //'sales_exp_sim',
            //'sales_act_sim',
            //'sales_exp_platform',
            //'sales_act_platform',
            //'sales_exp_software',
            //'sales_act_software',
            
			[
				'attribute'=>'sales_exp_total',
				'width'=>'40px',
				'label'=>'Projected(K)',
				'value'=>function($model){
					return $model-> sales_exp_total/1000;
				},
				'format'=>'currency',	
				'pageSummary' => true,		
			],
			[
				'attribute'=>'sales_weighed_total',
					'width'=>'40px',
				'label'=>'Weighted Sales(K)',
				'value'=>function($model){
					return $model-> sales_weighed_total/1000;
				},
				'format'=>'currency',
				'pageSummary' => true,	
			],
            [
				'attribute'=>'sales_act_total',
				'label'=>'Actual(K)',
					'width'=>'40px',
				'value'=>function($model){
					return $model-> sales_act_total/1000;
				},
				'format'=>'currency',
				'pageSummary' => true,
			],
			[
				'attribute'=>'exp_mp_date',	
					'width'=>'50px',
			],
            //'tag_eSIM',
            //'progress',
					
			[
				'width'=>'60px',
				'attribute'=>'progressx.content_progress',
				'format'=>'raw',
				/*'value'=>function($model){
					$cur_week = Weekly::find()->where(['id_toProject'=>$model->id_project, 'num_week'=>date('W')])->orderBy(['date_modified'=>SORT_DESC])->one();
					return empty($cur_week)?"empty week":$cur_week->old_progress_percent;
				}*/
					
				'value' => function ($model) {
                    // striped animated
					//1. check last week
					$cur_week = Weekly::find()->where(['id_toProject'=>$model->id_project, 'num_week'=>date('W')])->orderBy(['date_modified'=>SORT_DESC])->one();
					//$last_week = Weekly::find()->where(['id_toProject'=>$model->id_project, 'num_week'<date('W')])->orderBy(['date_modified'=>SORT_DESC])->one();
					
					if ( empty($cur_week)
						|| (!empty($cur_week) && empty($cur_week->old_progress_percent)) 
						|| (!empty($cur_week) && ($cur_week->old_progress_percent == $model->progress))
						)
					{ //if current week is not updated, show current progress, no stack bar.
						
						return \yii\bootstrap\Progress::widget([
                            	'percent' => $model->progressx->value_progress * 100,
								'label'=> $model->progressx->content_progress,
									//'labelOptions'=> ['style'=>'color:black',],
								'barOptions'=>['class'=>'progress-bar-success'],
								//'options'=>['style'=>'color:black']		
                            	//'options' => //['class' => 'progress-success active progress-striped'],
										//['class'=>'progress-bar-success'],
						]);
						//return $model->progressx->value_progress * 100;
					}
					
					else{ //current week has update and update old progress!= current progress
					
					
                    return \yii\bootstrap\Progress::widget([
                        'bars'=>[
							//last week
							[
                            	'percent' => $cur_week -> progressx ->value_progress * 100,
								//'label'=> ($cur_week -> progressx->value_progress * 100). '%' ,
								
                            	'options' => //['class' => 'progress-success active progress-striped'],
										['class'=>'progress-bar-success'], //green
                        	],
							[
                            	'percent' => $model->progressx->value_progress * 100,
								'label'=> $model->progressx->content_progress,
							
                            	'options' => //['class' => 'progress-success active progress-striped'],
										['class'=>'progress-bar-info'], //blue
							],	
						]
                    ]);
					}
                },	
				
					
			],		
				
			'status.content_data_status',
			/*[
				
				
				'label'=>'Progress',
				'value'=> function($model, $key, $index, $widget){
					return Progress::widget([
    				'percent' => $model->progressx->value_progress * 100,
					'barOptions' => ['class' => 'progress-bar-success'],
					]);		
				},
				
			],*/	
			//'statusy',
            
			//'name_operation',
            //week
			[
				'label'=> 'Weekly Updates',
				'width'=>'170px',
				//'filter'=>ArrayHelper::map(Weekly::find()->orderBy('date_modified')->asArray()->all(), 'id_week', 'item_week'),
				//'attribute'=> Project::find()=>where(['id'=>])
				//'attribute'=>'weekx.item_week', //weekly updates
				'value'=> function($model, $key, $index, $widget){
					$week = Weekly::find()->where(['id_toProject'=>$model->id_project])->orderBy(['date_modified'=>SORT_DESC])->one();
					if($week==null){
						return Html::a('No update, Create one?',
							['weekly/create', 'id'=>$model->id_project]);
					}
					else{
						$content=$week->item_week;
						return Html::a('week '.$week->num_week.": ".$content,
							['weekly/view','id'=>$week->id_week]);
						//['title'=>'view']
						//);
					}
					
				},
				'format'=>'raw',
				//'attribute'=>'weeklies.item_week',
				/*'value' => function ($model, $key, $index, $widget) { 
					//$url = Url::to(['weekly/view', 'id' => ]);
        			return Html::a($model->weekx->item_week,  
            		['weekly/view','id'=>$model->weekx->id_week]); 
				}, */ 
			],
			[
				'width'=>'170px',
				'label'=> 'Action',
				'value'=> function($model, $key, $index, $widget){
					$week = Weekly::find()->where(['id_toProject'=>$model->id_project])->orderBy(['date_modified'=>SORT_DESC])->one();
					if($week==null){
						return Html::a('No update, Create one?',
							['weekly/create', 'id'=>$model->id_project]);
					}
					else{
						return $week->action." at ".$week->name_at." on ".$week->date_check;
					}
				},
				'format'=>'raw',
			],
				
            [
				'class' => 'yii\grid\ActionColumn',
				'template' => '{view} {update} {delete} {weekly}',
				'buttons'=>[
					 'weekly' => function ($url, $model) {
               				 return Html::a('<span class="glyphicon glyphicon-calendar"></span>', $url, 
							 [ 
								 'title' => Yii::t('app', 'weekly'),
						     ]
						     );
					}
            	],
				'urlCreator' => function ($action, $model, $key, $index) {
            		if ($action === 'weekly') {
                		$url =Url::to(['weekly/create', 'id'=>$model->id_project]);
                		return $url;
					}
				},
					
			
			],
			//check box	
			[
    			'class' => 'kartik\grid\CheckboxColumn',
    			'headerOptions' => ['class' => 'kartik-sheet-style'],
			],	
				
        ], 
		//'tableOptions' =>['style' => 'width: 1800px;'],	
			/*
		'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false	
		'exportConfig' => [
    		GridView::CSV => ['label' => 'Save as CSV'],
    		//GridView::HTML => [ html settings],
    		GridView::PDF => [ 'label'=> 'Save as PDF'],
		],
		'headerRowOptions' => ['class' => 'kartik-sheet-style'],
				'pjax' => true,		
		'export' => [
        	'fontAwesome' => true
    	],	
		'toolbar' =>  [
        	['content'=>
                Html::button('<i class="glyphicon glyphicon-plus"></i>', [
                    'type'=>'button', 
                    'title'=>'Add Book', 
                    'class'=>'btn btn-success'
                ]) . ' '.
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], [
                    'class' => 'btn btn-default', 
                    'title' => 'Reset Grid'
                ]),
			],
        	'{export}',
        	'{toggleData}',
		],	
		*/
	'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
    'headerRowOptions' => ['class' => 'kartik-sheet-style'],
    'filterRowOptions' => ['class' => 'kartik-sheet-style'],
    'pjax' => true, // pjax is set to always true for this demo
    // set your toolbar
    'toolbar' =>  [
        /*['content' => 
            Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type' => 'button', 'title' => 'Add Book', 'class' => 'btn btn-success', 'onclick' => 'alert("This will launch the book creation form.\n\nDisabled for this demo!");']) . ' '.
            Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], ['data-pjax' => 0, 'class' => 'btn btn-default', 'title' => 'Reset Grid'])
        ],*/
        '{export}',
        '{toggleData}',
    ],
	//'resizableColumns'=>true,
	'floatHeader'=>true,
	'floatHeaderOptions'=>['top'=>'50'],
	
    // set export properties
    'export' => [
        'fontAwesome' => true,
		//'label'=>'export',
		'icon'=>'glyphicon glyphicon-download-alt',
    ],
    // parameters from the demo form
    //'bordered' => true,
    'striped' => false,
    'condensed' => true,
    'responsive' =>true,
    'hover' => true,
    'showPageSummary' => true,
    'panel' => [
        'type' => GridView::TYPE_DEFAULT,
        'heading' => true,
    ], 
    'persistResize' => true,
    'toggleDataOptions' => ['minCount' => 10],
    'exportConfig' => [
    		GridView::CSV => ['label' => 'Save as CSV'],
    		//GridView::HTML => [ html settings],
    		GridView::PDF => [ 'label'=> 'Save as PDF'],
		],
    //'itemLabelSingle' => 'book',
			//'itemLabelPlural' => 'books',
			
    ]); ?>

    <?php Pjax::end(); ?>

</div>
