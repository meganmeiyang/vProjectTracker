<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\WeeklySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Weeklies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="weekly-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Weekly', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id_week',
            'name_submitter',
            'date_submitted',
            'id_toProject',
			[
				'attribute'=>'project.name_customer',	
				'value'=>function($model, $key, $index, $widget){
					return Html::a($model->project->name_customer.": ".$model->project->application,['project/view', 'id'=>$model->id_toProject]);
				},
				'format'=>'raw',
			],
            'num_week',
			'item_week',
            'action',
            'name_at',
            //'date_check',
            //'date_modified',
            //'name_modifiedBy',
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
