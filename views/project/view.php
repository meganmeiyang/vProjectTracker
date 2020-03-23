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
            'created_on',
            'created_by',
            'name_customer',
            'role_customer',
            'industry_customer',
            'name_country',
            'text_requirements',
            'text_solutions',
            'name_sales',
            'name_FAE',
            'name_PM',
            'quantity_sim',
            'type_sim',
            'service_data',
            'service_platform',
            'service_software',
            'cycle_data',
            'size_data',
            'sales_exp_data',
            'sales_act_data',
            'sales_exp_sim',
            'sales_act_sim',
            'sales_exp_platform',
            'sales_act_platform',
            'sales_exp_software',
            'sales_act_software',
            'sales_exp_total',
            'sales_act_total',
            'sales_weighed_total',
            'tag_eSIM',
            'progress',
            'statusy',
            'name_operation',
            'mode_selling',
            'name_supplier',
            'coverage',
        ],
    ]) ?>

</div>
