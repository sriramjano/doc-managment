<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Customer;
use common\models\Document;
/* @var $this yii\web\View */
/* @var $model common\models\DocMap */
/* @var $form yii\widgets\ActiveForm */
$cus_list = ArrayHelper::map(Customer::find()->all(), 'uuid', function($model) {
        return $model['firstname'].' '.$model['lastname'].' ('.$model['uuid'].')';
    }
);
$doc_list = ArrayHelper::map(Document::find()->all(), 'uuid', function($model) {
        return $model['doc_type'].' ('.$model['uuid'].')';
    });
?>

<div class="doc-map-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cus_id')
        ->dropDownList(
            $cus_list,           // Flat array ('id'=>'label')
            ['prompt'=>'Select Customer']    // options
        ); ?>

    <?= $form->field($model, 'doc_id')
        ->dropDownList(
            $doc_list,           // Flat array ('id'=>'label')
            ['prompt'=>'Select Document']    // options
        ); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
