<?php


namespace app\core\repositories;


use app\core\entities\File;
use yii\data\ActiveDataProvider;

class FileRepository
{
    public static function getAll(): ActiveDataProvider
    {
        $files = File::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $files,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
        ]);
        return $dataProvider;
    }
}