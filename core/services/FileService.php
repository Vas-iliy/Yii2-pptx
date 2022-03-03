<?php

namespace app\core\services;

use app\core\entities\File;
use app\core\forms\FileForm;
use yii\web\UploadedFile;

class FileService
{
    public function create(FileForm $form): bool
    {
        $file = UploadedFile::getInstance($form, 'file');
        if ($file = UploadFilesService::createFile($file)) {
            if (strpos($file, '.pptx')) {
                $file = UploadFilesService::createTmpPdf($file);
            }
            $images = UploadFilesService::createImagesAndPdf($file);
            foreach ($images as $image) {
                $save = File::create($image, str_replace('.png', '.pdf', $image));
                $save->save();
            }
            return true;
        }
        return false;
    }
}