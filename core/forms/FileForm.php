<?php

namespace app\core\forms;

use yii\base\Model;

class FileForm extends Model
{
    public $file;

    public function rules()
    {
        return [
            ['file', 'file', 'skipOnEmpty' => false, 'extensions' => 'pptx, pdf']
        ];
    }
}