<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DocMap */

$this->title = Yii::t('app', 'Update Doc Map: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Doc Maps'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="doc-map-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
