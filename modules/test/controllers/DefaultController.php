<?php

namespace app\modules\test\controllers;

use app\modules\test\models\Authors;
use Yii;
use app\modules\test\models\Books;
use app\modules\test\models\BooksSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DefaultController implements the CRUD actions for Books model.
 */
class DefaultController extends Controller
{
    public $booksModel;
    public $searchModel;
    public $authorsModel;

    public function __construct($id, $module, Books $booksModel, BooksSearch $searchModel, Authors $authorsModel, $config = [])
    {
        $this->booksModel = $booksModel;
        $this->searchModel = $searchModel;
        $this->authorsModel = $authorsModel;


        parent::__construct($id, $module, $config);
    }

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Books models.
     * @return mixed
     */
    public function actionIndex()
    {
        $authorsList = $this->authorsModel->find()->getAuthorsList();
        $dataProvider = $this->searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'authorsList' => $authorsList,
            'searchModel' => $this->searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Books model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        header("Cache-Control: no-cache, no-store, must-revalidate, max-age=0");
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Updates an existing Books model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(\Yii::$app->session->get('referer'));
        } else {
            \Yii::$app->session->set('referer',Yii::$app->request->referrer);
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Books model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Books model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Books the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = $this->booksModel->findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
