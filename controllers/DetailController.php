<?php

namespace app\controllers;

use Yii;
use app\models\DetailModel;
use app\models\DetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\db\QueryBuilder;

/**
 * DetailController implements the CRUD actions for DetailModel model.
 */

class DetailController extends Controller
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
     * Lists all DetailModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $searchModel = new DetailSearch();
        // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider = new ActiveDataProvider([
            'query' => DetailModel::getDetailShow(),
            'sort' => [
                'defaultOrder' => [
                    'tgl' => SORT_DESC,
                ],
                'attributes' =>['tgl','jumlah']
            ],
        ]);

        $model = new DetailModel();

        return $this->render('index', [
            // 'searchModel' => $searchModel,
            'dataProvider' => $dataProvider, 'model' => $model
        ]);
    }

    /**
     * Displays a single DetailModel model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Displays a single DetailModel model.
     * @param integer $id
     * @return mixed
     */
    public function actionDetil($tgl)
    {
         $dataProvider = new ActiveDataProvider([
            'query' => DetailModel::find()->where("tgl = '$tgl' AND hidden = 1"),
            'sort' => [
                'defaultOrder' => [
                    'tgl' => SORT_DESC,
                ],
            ],
        ]);
         $data['tgl'] = $tgl;
        return $this->render('detil', [
            'dataProvider' =>$dataProvider , 'data'=> $data
        ]);
    }


    /**
     * Creates a new DetailModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DetailModel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Creates a new DetailModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionAdd()
    {
        $input = Yii::$app->request->post('DetailModel');
        $model = new DetailModel();
        
        $model->tgl = $input['tgl'];
        
        if(!empty($input['jenis'])){
            foreach($input['jenis'] as $index=>$item){
                // $data[$index]['jenis'] = $item;
                // $data[$index]['jml'] = $input['jml'][$index]; 
                // $data[$index]['tgl'] = $input['tgl'];
                $data[$index][0] = $item;
                $data[$index][1] = $input['jml'][$index]; 
                $data[$index][2] = $input['tgl'];
            }
            
            $insert =  Yii::$app->db->createCommand()->batchInsert('detail', ['jenis','jml','tgl'],$data)->execute();

            
        }
        
        // foreach($input['jml'] as $index=>$item){
        //     $data[$index]['jml'] = $item; 
        // }

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // } else {
        //     return $this->render('create', [
        //         'model' => $model,
        //     ]);
        // }
        // var_dump($data);
    }

    /**
     * Updates an existing DetailModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing DetailModel model.
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
     * Finds the DetailModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DetailModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DetailModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
