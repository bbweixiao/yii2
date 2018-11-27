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
        'options' => ['class' => 'box-body'],
        'fieldConfig' => [
            'template' => '<div class="row"> <div class="col-xs-1">{label}：</div><div class="col-xs-2">{input}</div></div> ',
        ],
    ]); ?>



    <?= $form->field($model, 'username')->textInput(['class'=>'form-control']) ?>
  <!--  <?/*=Html::dropDownList('list','2',['1'=>'160','2'=>'170','3'=>'180'],['class'=>'form-control']);*/?>  -->
    <?php echo $form->field($model, 'vip_lv')->dropDownList(['1'=>'大学','2'=>'高中','3'=>'初中'], ['prompt'=>'请选择','style'=>'width:120px']) ?>
    <?php echo  $form->field($model, 'avatar')->radioList(['1'=>'男','0'=>'女']) ?>
    <?php  echo $form->field($model, 'email')->textInput(['class'=>'form-control']) ?>
    <?php  echo $form->field($model, 'status')->textInput(['class'=>'form-control']) ?>
    </div>
    <?php // echo $form->field($model, 'avatar') ?>

    <?php // echo $form->field($model, 'vip_lv') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
