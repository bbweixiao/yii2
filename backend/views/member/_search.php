<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TestSeach */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="test-search">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
  <!--  <?/*=Html::dropDownList('list','2',['1'=>'160','2'=>'170','3'=>'180'],['class'=>'form-control']);*/?>  -->
<!--    --><?php /*echo $form->field($model, 'vip_lv')->dropDownList(['1'=>'大学','2'=>'高中','3'=>'初中'], ['prompt'=>'请选择','style'=>'width:120px']) */?>
   <!-- --><?php /*echo  $form->field($model, 'avatar')->radioList(['1'=>'男','0'=>'女']) */?>


    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="dataTables_filter" id="searchDiv">
                        <h5 class="pull-left">用户列表</h5>
                        <input placeholder="请输入姓名" name="name" class="form-control" type="search" likeoption="true">
                        <input placeholder="请输入登录名" name="loginName" class="form-control" type="search" likeoption="true">
                        <div class="btn-group">
                            <?= Html::submitButton('查询', ['class' => 'btn btn-primary']) ?>
                          <!--  <button type="button" class="btn btn-primary" data-btn-type="search">查询</button>-->
                            <button type="button" class="btn btn-default" data-btn-type="reset">重置</button>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default" data-btn-type="add">新增</button>
                            <button type="button" class="btn btn-default" data-btn-type="edit">编辑</button>
                            <button type="button" class="btn btn-default" data-btn-type="delete">删除</button>
                        </div>
                        <button type="button" class="btn btn-info" data-pagename="user_list" data-btn-type="custom"><i class="fa fa-check-square-o"></i>&nbsp;自定义列</button>
                    </div>

                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <?php ActiveForm::end(); ?>

</div>
