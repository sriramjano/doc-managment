<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DocMap */

$this->title = Yii::t('app', 'Create Doc Map');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Doc Maps'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doc-map-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
