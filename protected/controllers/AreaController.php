<?php

class AreaController extends Controller
{
    public $layout='//layouts/column2';

    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index','view', 'clientlocation', 'areacontainclient'),
                'users'=>array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('create','update'),
                'users'=>array('*'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('admin','delete'),
                'users'=>array('*'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function actionView($id)
    {
        $this->render('view',array(
            'model'=>$this->loadModel($id),
        ));
    }

    public function actionCreate()
    {
        $model=new Area;
        
        if(isset($_POST['Area']) && isset($_POST['points']))
        {
            $words = $_POST['points'];
            $words = str_replace(", "," ", $words);
            $words = str_replace("(","", $words);
            $words = str_replace(")","", $words);
            $name = $_POST['Area']['area_name'];
            $client_id = $_POST['Area']['client_id'];
            

            $sql = "INSERT INTO tbl_area (area_name, geo , client_id) VALUES ('$name', ST_GEOMFROMTEXT('POLYGON((".$words."))'),$client_id);";
            $connection=Yii::app()->db;

            $command=$connection->createCommand($sql);
            $command->execute();
        }

        $this->render('create',array(
                'model'=>$model,
        ));
    }

    public function actionUpdate($id)
    {
        $model=$this->loadModel($id);

        if(isset($_POST['Area']) && isset($_POST['points']))
        {
            $words = $_POST['points'];
            $words = str_replace(", "," ", $words);
            $words = str_replace("(","", $words);
            $words = str_replace(")","", $words);
            $name = $_POST['Area']['area_name'];
            $client_id = $_POST['Area']['client_id'];
            
            $sql= "UPDATE tbl_area SET area_name = '$name', geo = ST_GEOMFROMTEXT('POLYGON((".$words."))'), client_id='$client_id' where id = '$model->id';";
            $connection=Yii::app()->db;

            $command=$connection->createCommand($sql);
            $command->execute();
        }

        $this->render('update',array(
            'model'=>$model,
        ));
    }

    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    public function actionIndex()
    {
        $dataProvider=new CActiveDataProvider('Area');
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
    }

    public function actionAdmin()
    {
        $model=new Area('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Area']))
            $model->attributes=$_GET['Area'];

        $this->render('admin',array(
            'model'=>$model,
        ));
    }

    public function loadModel($id)
    {
        $model=Area::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='area-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionClientLocation()
    {
        if(isset($_GET['client_id']))
        {
            header('Content-type: application/json');
            $location = str_replace("POINT(", "", Client::model()->getClientPosition($_GET['client_id']));
            echo CJSON::encode(explode(" ", str_replace(")", "", $location)));
        }
    }

    public function actionAreaContainClient()
    {
        if(isset($_GET['client_id']) && isset($_GET['area_id']))
        {
            header('Content-type: application/json');
            $res = (array_values(Area::areaContainsPoint($_GET['client_id'], $_GET['area_id'])[0])[0] != '1') ? true : false;
            echo CJSON::encode([$res, $_GET['area_id']]);
        }
    }
}
