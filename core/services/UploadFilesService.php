<?php

namespace app\core\services;

use yii\web\UploadedFile;

class UploadFilesService
{
    public static function createFile(UploadedFile $file): string
    {
        if ($file->extension == 'pptx') {
            $dir = \Yii::$app->params['directoryPptx'];
        }
        $dir = \Yii::$app->params['directoryTmp'];
        if (!is_dir($dir)) {
            mkdir($dir);
        }
        $file_name = uniqid() . '_' . $file->baseName . '.' . $file->extension;
        $file->saveAs($dir . $file_name);
        return $dir . $file_name;
    }

    public static function createTmpPdf(string $pptx): string
    {
        $libreoffice = \Yii::$app->params['libreoffice'];
        $path = \Yii::$app->params['directoryTmp'];
        $conv = exec($libreoffice.' --headless --convert-to pdf --outdir '.$path.' '.$pptx);
        return str_replace('pptx', 'pdf', $pptx);
    }
}