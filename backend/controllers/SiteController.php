<?php
namespace backend\controllers;

use common\models\SignupForm;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{


    // public $defaultAction = 'login';
     //public $layout='/main_1';
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        // 获取 redis 组件
  /*      $redis = Yii::$app->redis;

// 判断 key 为 username 的是否有值，有则打印，没有则赋值
        $key = 'username';
        if ($val = $redis->get($key)) {
         var_dump($val);
        } else {
            $redis->set($key, 'marko');
            var_dump($redis->get($key));
          //  $redis->expire($key, 5);
        }*/
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
       /* if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }*/

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     *  create new user
     */
    public function actionSignup ()
    {
        $model = new SignupForm();

        // 如果是post提交且有对提交的数据校验成功（我们在SignupForm的signup方法进行了实现）
        // $model->load() 方法，实质是把post过来的数据赋值给model
        // $model->signup() 方法, 是我们要实现的具体的添加用户操作
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            return $this->redirect(['index']);
        }

        // 渲染添加新用户的表单
        return $this->render('signup', [
            'model' => $model,
        ]);
    }
}
