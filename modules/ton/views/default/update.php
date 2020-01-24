<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\ton\models\Ton */

$this->title = 'Update Ton: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tons', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ton-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
