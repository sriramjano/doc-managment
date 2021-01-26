<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\DocMapSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Doc Maps');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doc-map-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create Doc Map'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'cus_id',
            'doc_id',

            ['class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        return Html::a ( 'update', $url );
                    },
                ],
                'template' => '{update}'
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
