<?php

namespace app\controllers;

use Yii;
use app\models\Weekly;
use app\models\WeeklySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/**
 * WeeklyController implements the CRUD actions for Weekly model.
 */
class WeeklyController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
			'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['create','update','delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
			
			
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Weekly models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WeeklySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Weekly model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Weekly model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id=0)
    {
		
        $model = new Weekly();
		if($id!=null && $id!=0){
			$model->id_toProject = $id;
		}

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			yii::debug("hereis model id".$model->id_week);
            return $this->redirect(['view', 'id' => $model->id_week]);
        }

        return $this->render('create', [
            'model' => $model
        ]);
    }

    /**
     * Updates an existing Weekly model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_week]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Weekly model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Weekly model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Weekly the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Weekly::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
