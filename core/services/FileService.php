<?php

namespace app\core\services;

use app\core\forms\FileForm;
use yii\web\UploadedFile;

class FileService
{
    public function create(FileForm $form)
    {
        $file = UploadedFile::getInstance($form, 'file');
        if ($file = UploadFilesService::createFile($file)) {
            if (strpos($file, '.pptx')) {
                $file = UploadFilesService::createTmpPdf($file);
            }
        }
        return false;
    }
}