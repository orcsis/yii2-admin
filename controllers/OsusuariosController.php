<?php

namespace orcsis\admin\controllers;

use Yii;
use common\models\Osusuarios;
use common\models\searchs\Osusuarios as OsusuariosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OsusuariosController implements the CRUD actions for Osusuarios model.
 */
class OsusuariosController extends Controller
{
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
     * Lists all Osusuarios models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OsusuariosSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Osusuarios model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
    	$passChanged = false;
        $model = $this->findModel($id);
        $post = Yii::$app->request->post();
        
        if(isset($post['Osusuarios']['usu_clave']) && !$model->validatePassword($post['Osusuarios']['usu_clave']) ) {
        	$passChanged = true;
        }
        
        $val = $model->load($post);
        if($val && $passChanged) {
        	$model->setPassword($model->usu_clave);
        }

        if ($val && $model->save()) {
        return $this->redirect(['view', 'id' => $model->usu_id]);
        } else {
        return $this->render('view', ['model' => $model]);
}
    }

    /**
     * Creates a new Osusuarios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Osusuarios;
        
        $val = $model->load(Yii::$app->request->post());
        if($val){
        	$model->setPassword($model->usu_clave);
        }

        if ( $val && $model->save()) {
            return $this->redirect(['view', 'id' => $model->usu_id]);
        } else {
        	$model->usu_clave = "";
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Osusuarios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
    	$passChanged = false;
        $model = $this->findModel($id);
        $post = Yii::$app->request->post();
        
        if(isset($post['Osusuarios']['usu_clave']) && !$model->validatePassword($post['Osusuarios']['usu_clave']) ) {
        	$passChanged = true;
        }
        
        $val = $model->load($post);
        if($val && $passChanged) {
        	$model->setPassword($model->usu_clave);
        }

        if ($val && $model->save()) {
            return $this->redirect(['view', 'id' => $model->usu_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Osusuarios model.
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
     * Finds the Osusuarios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Osusuarios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Osusuarios::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app','The requested page does not exist.'));
        }
    }
}
