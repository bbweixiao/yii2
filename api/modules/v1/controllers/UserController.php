<?php/** * Created by PhpStorm. * User: Administrator * Date: 2018/10/29 * Time: 16:33 */namespace api\modules\v1\controllers;use yii;use yii\rest\ActiveController;use yii\helpers\ArrayHelper;use yii\filters\auth\QueryParamAuth;use api\models\LoginForm;use yii\data\ActiveDataProvider;use yii\web\Response;class UserController extends ActiveController{    public $modelClass = 'api\models\User';    public function behaviors() {        $behaviors = parent::behaviors();        $behaviors['authenticator'] = [            'class' => QueryParamAuth::className(),            'optional' => [                'login',                'signup',                'signup-test',                'showdata',            ],        ];        $behaviors['contentNegotiator']['formats']  =  [            'application/json'=> Response::FORMAT_JSON        ];        return $behaviors;/*        return ArrayHelper::merge (parent::behaviors(), [            'authenticator' => [                'class' => QueryParamAuth::className(),                'optional' => [                    'login',                    'signup',                    'showdata',                    'signup-test'                ],            ]        ] );*/    }    public $serializer = [        'class' => 'yii\rest\Serializer',        'collectionEnvelope' => 'items',    ];    public function actionLogin ()    {        $model = new LoginForm;        $aa = Yii::$app->request->post();        $model->setAttributes(Yii::$app->request->post());        if ($user = $model->login()) {            if ($user instanceof IdentityInterface) {                return $user->access_token;            } else {                return $user->access_token;            }        } else {            return $model->errors;        }    }    public function actions()    {        $actions = parent::actions();        // 注销系统自带的实现方法        unset($actions['index'], $actions['update'], $actions['create'], $actions['delete'], $actions['view']);        return $actions;    }    public function actionIndex()    {        $modelClass = $this->modelClass;        $query = $modelClass::find();        return new ActiveDataProvider([            'query' => $query        ]);    }    public function actionVersion()    {        $modelClass = $this->modelClass;       $query_post = Yii::$app->request->getQueryParams();        $aa = Yii::$app->request->post();        $query = $modelClass::find();        return new ActiveDataProvider([            'query' => $query        ]);        $model =  new ActiveDataProvider([            'query' => $query        ]);        $data = $model->getModels();        return [            'data' => $data,            'message' => "返回成功",            'status' => 200        ];    }    public function actionSingup()    {        //注册方法        $modelClass = $this->modelClass;        $query_post = Yii::$app->request->getQueryParams();        $aa = Yii::$app->request->post();        $query = $modelClass::find();        return new ActiveDataProvider([            'query' => $query        ]);        $model =  new ActiveDataProvider([            'query' => $query        ]);        $data = $model->getModels();        return [            'data' => $data,            'message' => "返回成功",            'status' => 200        ];    }    public function actionShowdata()    {        $modelClass = $this->modelClass;        $query = $modelClass::find();        return new ActiveDataProvider([            'query' => $query        ]);        $model =  new ActiveDataProvider([            'query' => $query        ]);        $data = $model->getModels();        return [            'data' => $data,            'message' => "返回成功",            'status' => 200        ];    }    public function actionCreate()    {        $model = new $this->modelClass();        // $model->load(Yii::$app->getRequest()        // ->getBodyParams(), '');        $model->attributes = Yii::$app->request->post();        if (! $model->save()) {            return array_values($model->getFirstErrors())[0];        }        return $model;    }    public function actionUpdate($id)    {        $model = $this->findModel($id);        $model->attributes = Yii::$app->request->post();        if (! $model->save()) {            return array_values($model->getFirstErrors())[0];        }        return $model;    }    public function actionDelete($id)    {        return $this->findModel($id)->delete();    }    public function actionView($id)    {        return $this->findModel($id);    }    public function actionView1($id)    {        return $this->findModel($id);    }    protected function findModel($id)    {        $modelClass = new $this->modelClass();        if (($model = $modelClass::findIdentity($id)) !== null) {            return $model;        } else {            throw new NotFoundHttpException('The requested page does not exist.');        }    }}