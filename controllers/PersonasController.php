<?php

namespace app\controllers;

use app\models\Personas;
use app\models\PersonasSearch;
use app\models\Tarifas;
use Yii;
use yii\db\Expression;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * PersonasController implements the CRUD actions for Personas model.
 */
class PersonasController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Personas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PersonasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lista todos los clientes.
     * @return mixed
     */
    public function actionClientes()
    {
        $searchModel = new PersonasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['tipo' => 'Cliente']);

        return $this->render('clientes', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lista todos los monitores.
     * @return mixed
     */
    public function actionMonitores()
    {
        $searchModel = new PersonasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['tipo' => 'Monitor']);

        return $this->render('monitores', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Personas model.
     * @param int $id
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
     * Creates a new Personas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Personas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Clientes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionAltaCliente()
    {
        $model = new Personas();
        $model->fecha_alta = new Expression('NOW()');
        $model->tipo = 'Cliente';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('altaCliente', [
            'model' => $model,
            'listaTarifas' => $this->listaTarifas(),
            'listaMonitores' => $this->listaMonitores(),
        ]);
    }

    /**
     * Creates a new Monitor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionAltaMonitor()
    {
        $model = new Personas();
        $model->fecha_alta = new Expression('NOW()');
        $model->tipo = 'Monitor';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('altaMonitor', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Personas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Personas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Personas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @return Personas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Personas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Devuelve un listado de las tarifas.
     * @return Tarifas
     */
    private function listaTarifas()
    {
        return Tarifas::find()->select('tarifa')->indexBy('id')->column();
    }

    /**
     * Devuelve un listado de personas.
     * @return Personas que son de tipo monitor
     */
    private function listaMonitores()
    {
        return Personas::find()
            ->select('nombre')
            ->where(['tipo' => 'monitor'])
            ->indexBy('id')
            ->column();
    }
}