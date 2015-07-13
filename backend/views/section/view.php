<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Section */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend/section', 'Sections'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="section-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('backend/section', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('backend/section', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('backend/section', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'parent',
            'ancestor',
            'next',
            'prev',
            'toc_mode',
            'status',
            'comment_mode',
            'comment_num',
            'content:ntext',
            'ver',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
