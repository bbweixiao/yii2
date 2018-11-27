<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\assets\LteAsset;
/* @var $this yii\web\View */
/* @var $searchModel common\models\TestSeach */
/* @var $dataProvider yii\data\ActiveDataProvider */
//LteAsset::register($this);
$this->title = 'Tests';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="test-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Test', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'options' => ['class' => 'dataTables_wrapper form-inline dt-bootstrap ','style'=>'overflow:auto', 'id' => 'grid'],
        'tableOptions'=> ['class'=>'table table-bordered table-hover dataTable','role'=>'grid'],
        'headerRowOptions'=>['role'=>"row"],
        'caption'=>'测试列表',
        'layout'=>"{items}\n{pager}",
        'pager' => [
            'firstPageLabel'=>'首页',
            'lastPageLabel'=>'尾页',
            'maxButtonCount'=>5,
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'username',
                'headerOptions' => ['width'=>'100','style'=> 'text-align: center;'],
                'contentOptions' => ['style'=> 'text-align: center;']
            ],
            'username',
            [
                'attribute' => 'created_at',
                'format' => 'text',
                'headerOptions' => ['width'=>'auto','style'=> 'text-align: center;'],
                'contentOptions' => ['style'=> 'text-align: center;'],
                'value' => function($data){return date("Y-m-d H:i:s",($data->created_at));},
            ],
            [
                'attribute' => 'status',
                'format' => 'text',
                'headerOptions' => ['width'=>'auto','style'=> 'text-align: center;'],
                'contentOptions' => ['style'=> 'text-align: center;'],
            ],
            'updated_at',
            'password_reset_token',
            //'email_validate_token:email',
            //'email:email',
            //'role',
            //'status',
            //'avatar',
            //'vip_lv',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
