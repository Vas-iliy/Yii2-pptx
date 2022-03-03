<?php

namespace app\core\services;

use app\core\forms\FileForm;
use yii\web\UploadedFile;

class FileService
{
    public function create(FileForm $form)
    {
        $file = UploadedFile::getInstance($form, 'file');
        if ($file = UploadFilesService::createPptx($file)) {

        }
    }
}