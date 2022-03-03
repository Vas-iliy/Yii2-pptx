<?php

namespace app\core\entities;

use yii\db\ActiveRecord;

class File extends ActiveRecord
{
    public function rules()
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