<?php

use app\core\entities\File;
use yii\grid\GridView;
use yii\helpers\Html;

?>
<div class="box">
        <div class="box-body" >
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    [
                        'attribute' => 'image',
                        'value' => function(File $file) {
                            return Html::img('@web/files/images/'.$file->image, ['width' => '300px']);
                        },
                        'format' => 'raw',
                    ],
                    [
                        'attribute' => 'pdf',
                        'value' => function(File $file) {
                            return "<iframe src=\"files/pdf/".$file->pdf."\"  width=\"300px\"></iframe>";
                        },
                        'format' => 'raw',
                    ],
                ],
            ]); ?>
        </div>
    </div>