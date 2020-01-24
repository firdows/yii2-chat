<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\ton\models\Ton */

$this->title = 'Create Ton';
$this->params['breadcrumbs'][] = ['label' => 'Tons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ton-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
