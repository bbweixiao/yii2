<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Test */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="test-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row" >
       <!-- <div class="col-sm-6">
            <?/*= $form->field($model, 'username')->textInput(['maxlength' => 128]) */?>

            <?/*= $form->field($model, 'username')->textInput(['id' => 'parent_name']) */?>

            <?/*= $form->field($model, 'username')->textInput(['id' => 'route']) */?>
        </div>
        <div class="col-sm-6">
            <?/*= $form->field($model, 'username')->input('number') */?>

            <?/*= $form->field($model, 'username')->textarea(['rows' => 4]) */?>
        </div>-->

        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-body">
                    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'email_validate_token')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'role')->textInput() ?>

                    <?= $form->field($model, 'status')->textInput() ?>

                    <?= $form->field($model, 'avatar')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'vip_lv')->textInput() ?>

                    <?= $form->field($model, 'created_at')->textInput() ?>

                    <?= $form->field($model, 'updated_at')->textInput() ?>
                </div>

            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-body">
                    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'email_validate_token')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'role')->textInput() ?>

                    <?= $form->field($model, 'status')->textInput() ?>

                    <?= $form->field($model, 'avatar')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'vip_lv')->textInput() ?>

                    <?= $form->field($model, 'created_at')->textInput() ?>

                    <?= $form->field($model, 'updated_at')->textInput() ?>
                </div>

            </div>
        </div>

        <div class="box-footer">
            <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
