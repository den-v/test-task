<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\modules\test\assets\TestAsset;
use yii\bootstrap\Modal;

TestAsset::register($this);

if(!\Yii::$app->user->isGuest){
    $template = '{update} {view} {delete}';
}else{
    $template = '';
}

$this->title = 'Books';

$form = ActiveForm::begin([
    'id' => 'filter-form',
    'options' => ['class' => 'form-inline'],
    'method' => 'GET',
    'action' => Url::to('@web/test/')
]) ?>
<?= $form->field($searchModel, 'author_id')->dropDownList($authorsList,['class' => 'form-control','style' =>'width:auto;'])->label('Author'); ?>
<?= $form->field($searchModel, 'name')->textInput(['placeholder'=>'please enter book name','style' =>'width:auto;'])->label('Book Name'); ?>
<br><br>
<?=  $form->field($searchModel,'date')->widget(\kartik\daterange\DateRangePicker::className(),[
'attribute'=>'date',
'id'=>'daterange',
'convertFormat'=>true,
'pluginOptions'=>[
'timePicker'=>false,
'timePicker12Hour'=>false,
'hideInput'=>true,
'presetDropdown'=>true,
'timePickerIncrement'=>5,
'format'=>'d/m/Y',
],
])->label('Date Range');
?>
<?= Html::submitButton('Search', ['class' => 'btn btn-primary pull-right']) ?>
<?php ActiveForm::end() ?>

<div class="books-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name',
            [
                'format' => 'html',
                'header' => '<a href="#">Preview</a>',
                'options' => ['style' => 'width:10%'],
                'value' => function($model) {
                    return '<img class ="small img" src="'.Url::to('@web/'.$model['preview']).'">';
                },
            ],
            'authors.author',
            'date',
            'date_update',
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '<a href="#">Actions</a>',
                'template' => $template,
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>',Url::to('@web/test/default/view?id='.$model['id']), [
                            'id' => 'activity-view-link',
                            'title' => Yii::t('yii', 'View'),
                            'data-toggle' => 'modal',
                            'data-target' => '#view-modal',
                            'data-id' => $key,
                            'data-pjax' => '0',

                        ]);
                    },
                ],
            ],
        ],
    ]); ?>

</div>

<div class="modal large fade" id="view-modal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>

