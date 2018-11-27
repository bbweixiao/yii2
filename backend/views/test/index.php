<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel common\models\TestSeach */
/* @var $dataProvider yii\data\ActiveDataProvider */
//LteAsset::register($this);
$this->title = '测试';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="test-search">
        <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
        ]); ?>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="dataTables_filter" id="searchDiv">
                            <input placeholder="请输入姓名" name="name" class="form-control" type="search" likeoption="true">
                            <input placeholder="请输入登录名" name="email" class="form-control" type="search" likeoption="true">
                            <div class="btn-group">
                                <?= Html::submitButton('查询', ['class' => 'btn btn-primary']) ?>
                                <button type="button" class="btn btn-default" data-btn-type="reset">重置</button>
                            </div>
                            <div class="btn-group">
                                <?= Html::a('新增', ['create'], ['class' => 'btn btn-default']) ?>
                                <button type="button" class="btn btn-default" data-btn-type="delete">删除</button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div id="user_table_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div id="user_table_processing" class="dataTables_processing" style="display: none;">处理中...</div>
                                <?= GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'options' => ['class' => 'dataTables_wrapper form-inline dt-bootstrap ','style'=>'overflow:auto', 'id' => 'grid'],
                                    'tableOptions'=> ['class'=>'table table-bordered table-striped table-hover dataTable no-footer','role'=>'grid'],
                                    'headerRowOptions'=>['role'=>"row"],
                                  /*  'layout'=>"{items}\n{pager}",*/
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
                                        [
                                            'attribute' => 'email',
                                            'format' => 'text',
                                            'headerOptions' => ['width'=>'auto','style'=> 'text-align: center;'],
                                            'contentOptions' => ['style'=> 'text-align: center;'],
                                        ],
                                        [
                                            'attribute' => 'created_at',
                                            'format' => 'text',
                                            'headerOptions' => ['width'=>'auto','style'=> 'text-align: center;'],
                                            'contentOptions' => ['style'=> 'text-align: center;'],
                                            'value' => function($data){return date("Y-m-d H:i:s",($data->created_at));},
                                        ],
                                        [
                                            'attribute' => 'updated_at',
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
                                        [
                                            'header' => '操作',
                                            'class' => 'yii\grid\ActionColumn',
                                            'contentOptions' => ['class'=>'text-center'],
                                            'headerOptions' => [
                                                'width' => '10%',
                                                'style'=> 'text-align: center;'
                                            ],
                                            'template' =>'{view} {update} {delete}',
                                            'buttons' => [
                                                'delete' => function ($url, $model, $key) {
                                                    $options = [
                                                        'title' => Yii::t('yii', 'Delete'),
                                                        'aria-label' => Yii::t('yii', 'Delete'),
                                                        'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                                        'data-method' => 'post',
                                                        'data-pjax' => '0',
                                                    ];
                                                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, $options);
                                                }
                                            ],
                                        ],
                                    ],
                                ]); ?>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <?php ActiveForm::end(); ?>
    </div>

</div>
