<?php

namespace app\controllers;

use app\core\forms\FileForm;
use app\core\services\FileService;
use yii\web\Controller;

class SiteController extends Controller
{
    private $service;

    public function __construct($id, $module,FileService $service, $config = [])
    {
        $this->service = $service;
        parent::__construct($id, $module, $config);
    }
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
                ]
            ];
    }

    public function actionIndex()
    {
        $form = new FileForm();
        if ($this->request->isPost && $form->load($this->request->post())) {
            if ($this->service->create($form)) {
                \Yii::$app->session->setFlash('success', 'File uploaded.');
                return $this->redirect('/file');
            }
            \Yii::$app->session->setFlash('error', 'Error');
            return $this->refresh();
        }
        return $this->render('index', [
            'model' => $form,
        ]);
    }
}
