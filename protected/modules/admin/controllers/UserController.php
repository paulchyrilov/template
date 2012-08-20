<?php

class UserController extends Controller
{

    /**
     * @var CActiveRecord the currently loaded data model instance.
     */
    public $layout = '//layouts/column2';
    private $_model;

    /**
     * @return array action filters
     */
    public function filters()
    {
        return CMap::mergeArray(parent::filters(), array(
                'accessControl', // perform access control for CRUD operations
            ));
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',
                'actions' => array('index', 'manage', 'delete', 'create', 'update', 'view'),
                'roles' => array(User::ROLE_ADMIN),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     */
    public function actionView()
    {
        $model = $this->loadModel();
        $this->render('view', array(
            'model' => $model,
        ));
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('User', array(
                'criteria' => array(
                    'condition' => 'status>' . User::STATUS_BANNED,
                ),
                'pagination' => array(
                    'pageSize' => Yii::app()->controller->module->user_page_size,
                ),
            ));

        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }
    
    /**
     * Manages all models.
     */
    public function actionManage()
    {
        $model = new User('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['User']))
            $model->attributes = $_GET['User'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new User;
        $profile = new Profile;
        $this->performAjaxValidation(array($model, $profile));
        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            $model->activkey = Yii::app()->getModule('user')->encrypting(microtime() . $model->password);
            $profile->attributes = $_POST['Profile'];
            $profile->user_id = 0;
            if ($model->validate() && $profile->validate()) {
                $model->password = Yii::app()->getModule('user')->encrypting($model->password);
                if ($model->save()) {
                    $profile->user_id = $model->id;
                    $profile->save();
                }
                $this->redirect(array('view', 'id' => $model->id));
            } else
                $profile->validate();
        }

        $this->render('create', array(
            'model'   => $model,
            'profile' => $profile,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     */
    public function actionUpdate()
    {
        $model = $this->loadModel();
        $profile = $model->profile;
        $this->performAjaxValidation(array($model, $profile));
        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            $profile->attributes = $_POST['Profile'];

            if ($model->validate() && $profile->validate()) {
                $old_password = User::model()->notsafe()->findByPk($model->id);
                if ($old_password->password != $model->password) {
                    $model->password = Yii::app()->getModule('user')->encrypting($model->password);
                    $model->activkey = Yii::app()->getModule('user')->encrypting(microtime() . $model->password);
                }
                $model->save();
                $profile->save();
                $this->redirect(array('view', 'id' => $model->id));
            } else
                $profile->validate();
        }

        $this->render('update', array(
            'model'   => $model,
            'profile' => $profile,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     */
    public function actionDelete()
    {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $model = $this->loadModel();
            $profile = Profile::model()->findByPk($model->id);
            $profile->delete();
            $model->delete();
            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_POST['ajax']))
                $this->redirect(array('/user/admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($validate)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') {
            echo CActiveForm::validate($validate);
            Yii::app()->end();
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     */
    public function loadModel()
    {
        if ($this->_model === null) {
            if (isset($_GET['id']))
                $this->_model = User::model()->findbyPk($_GET['id']);
            if ($this->_model === null)
                throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $this->_model;
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the primary key value. Defaults to null, meaning using the 'id' GET variable
     */
    public function loadUser($id = null)
    {
        if ($this->_model === null) {
            if ($id !== null || isset($_GET['id']))
                $this->_model = User::model()->findbyPk($id !== null ? $id : $_GET['id']);
            if ($this->_model === null)
                throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $this->_model;
    }

}
