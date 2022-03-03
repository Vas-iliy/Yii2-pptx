<?php

namespace app\core\services;

use yii\web\UploadedFile;

class UploadFilesService
{
    public static function createPptx(UploadedFile $pptx): string
    {
        if ($pptx->extension == 'pptx') {
            $dir = \Yii::$app->params['directoryPptx'];
        }
        $dir = \Yii::$app->params['directoryTmp'];
        if (!is_dir($dir)) {
            mkdir($dir);
        }
        $file_name = uniqid() . '_' . $pptx->baseName . '.' . $pptx->extension;
        $pptx->saveAs($dir . $file_name);
        return $file_name;
    }
}