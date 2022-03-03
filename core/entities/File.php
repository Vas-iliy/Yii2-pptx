<?php

namespace app\core\entities;

use yii\db\ActiveRecord;

class File extends ActiveRecord
{
    public static function tableName()
    {
        return 'files';
    }

    public static function create($image, $pdf)
    {
        $file = new static();
        $file->image = $image;
        $file->pdf = $pdf;
        return $file;
    }
}