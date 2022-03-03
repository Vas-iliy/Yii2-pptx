<?php

namespace app\core\services;

use Imagick;
use yii\web\UploadedFile;

class UploadFilesService
{
    public static function createFile(UploadedFile $file): string
    {
        if ($file->extension == 'pptx') {
            $dir = \Yii::$app->params['directoryPptx'];
        } else {
            $dir = \Yii::$app->params['directoryTmp'];
        }
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
        return str_replace('.pptx', '.pdf', $pptx);
    }

    public static function createImagesAndPdf(string $pdf): array
    {
        $images = new Imagick($pdf);
        $file_name = \Yii::$app->security->generateRandomString();
        $name = [];
        $counr_pages = $images->getNumberImages();
        if ($counr_pages) {
            for ($i=0; $i<$counr_pages; $i++) {
                $page = $pdf.'['.$i.']';
                $image = new Imagick($page);
                $pdfOne = new Imagick($page);
                $image->setImageFormat('png');
                $pdfOne->setImageFormat('pdf');
                $image->writeImage(\Yii::$app->params['directoryImage'].$file_name.'__'.($i+1).'.png');
                $pdfOne->writeImage(\Yii::$app->params['directoryPdf'].$file_name.'__'.($i+1).'.pdf');
                $name[] = $file_name.'__'.($i+1).'.png';
            }
        }
        return $name;
    }
}