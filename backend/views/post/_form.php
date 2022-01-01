<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tags')->textarea(['rows' => 6]) ?>

    <?php
    $statusArry = \common\models\Poststatus::find()
            ->select(['name','id'])
            ->indexBy('id')
            ->column();
//    $statusArry = \yii\helpers\ArrayHelper::map($statusObjs,'id','name');
//    $statusArry = (new \yii\db\Query())
//    ->select(['name','id'])
//    ->from('poststatus')
//    ->indexBy('id')
//    ->column();
    $adminuserArry = \common\models\Adminuser::find()
        ->select(['nickname','id'])
        ->indexBy('id')
        ->column();
    ?>

    <?= $form->field($model, 'status')
        ->dropDownList($statusArry,
        ['prompt'=>'请选择状态']) ?>


    <?= $form->field($model, 'author_id')
        ->dropDownList($adminuserArry,
            ['prompt'=>'请选择作者']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
