<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\test\models\Books */

?>
<div class="modal-header">
    <button type="button" class="dismiss close" data-dismiss="modal" aria-hidden="true">?</button>
    <h4 class="modal-title">View Book(<?=$model->name?>)</h4>
</div>
<div class="books-view modal-body">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'date_update',
            [
                'format' => 'html',
                'attribute' => 'preview',
                'value' => '<img src="'.Url::to('@web/'.$model['preview']).'">',
            ],
            'date',
            'author_id',
        ],
    ]) ?>
</div>
<div class="modal-footer">
    <a href="#" class="btn btn-primary dismiss" data-dismiss="modal">Close</a>
</div>
