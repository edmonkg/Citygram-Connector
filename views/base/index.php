<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CrimeMessage */
/* @var $dataProvider yii\data\ActiveDataProvider */

$title = $searchModel->pageTitle . 's';
$this->params['breadcrumbs'][] = $title;
?>
<div class="model-index">

    <h1><?= Html::encode($title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
    $indexAttributes = $searchModel->indexAttributes();
    $actionColumn = $searchModel->actionColumn($searchModel);
    if($indexAttributes !== []){
	    echo GridView::widget( [
		    'dataProvider' => $dataProvider,
		    'filterModel'  => $searchModel,
		    'columns'      => array_merge($indexAttributes, [$actionColumn])
	    ]);
    } else {
	    echo GridView::widget( [
		    'dataProvider' => $dataProvider,
		    'filterModel'  => $searchModel,
		    'filterUrl' => $searchModel->urlName,
		    'columns'      => [
			    [ 'class' => 'yii\grid\SerialColumn' ],
			    [ 'attribute' => 'datetime.sec', 'format' => 'datetime', 'label' => 'Incident Date / Time' ],
			    'id',
			    'dataset',
			    'properties.title',
			    'properties.status',
			    [ 'attribute' => 'datetime.sec', 'format' => 'datetime', 'label' => 'Report Date / Time' ],
			    [ 'attribute' => 'created_at.sec', 'format' => 'datetime', 'label' => 'Added to DB at' ],
			    [ 'attribute' => 'updated_at.sec', 'format' => 'datetime', 'label' => 'Updated at' ],
		    ],
	    ] );
    }
    ?>

</div>
