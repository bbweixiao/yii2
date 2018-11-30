<?php

namespace backend\controllers;
use Yii;
use backend\models\Admin;
use yii\web\Controller;
use backend\models\Menu;
use yii\data\ActiveDataProvider;
use rbac\components\Configs;
use yii\helpers\Url;

/**
 * 身份授权控制器
 * @author longfei <phphome@qq.com>
 */
class AuthController extends Controller
{
    /**
     * @var \common\core\rbac\DbManager
     */
    public $authManager;

    /**
     * @var bool 这里很多自定义的表单，就没有添加验证
     */
    public $enableCsrfValidation = false;

    /**
     * ---------------------------------------
     * 构造方法
     * ---------------------------------------
     */
    public function init()
    {
        parent::init();
        $this->authManager = Yii::$app->authManager;
    }

    /**
     * ---------------------------------------
     * “角色”列表
     * ---------------------------------------
     */
    public function actionIndex()
    {
        /* 添加当前位置到cookie供后续跳转调用 */
     //   $this->setForward();

        /* 获取角色列表 */
        $roles = Configs::authManager()->getRoles();

        return $this->render('index', [
            'roles' => $roles,
        ]);
    }

    /**
     * ---------------------------------------
     * 添加“角色”
     * 注意：角色表的“rule_name”字段必须为“NULL”，不然会出错。
     *      详情见“yii\rbac\BaseManager”的203行if($item->ruleName === null){return true;}
     * ---------------------------------------
     */
    public function actionAdd()
    {

        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post('param');
            /* 创建角色 */
            $role = Yii::$app->authManager->createRole($data['name']);
            $role->type = 1;
            $role->description = $data['description'];
            if (Yii::$app->authManager->add($role)) {
                $this->success('更新成功', $this->getForward());
            }
            $this->error('更新失败');
        }

        return $this->render('add');
    }

    /**
     * ---------------------------------------
     * 编辑“角色”
     * 注意：角色表的“rule_name”字段必须为“NULL”，不然会出错。
     *      详情见“yii\rbac\BaseManager”的203行if($item->ruleName === null){return true;}
     * ---------------------------------------
     */
    public function actionEdit()
    {

        /* 获取角色信息 */
        $item_name = Yii::$app->request->get('role');
        $role = Yii::$app->authManager->getRole($item_name);

        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post('param');
            $role->name = $data['name'];
            $role->description = $data['description'];
            if (Yii::$app->authManager->update($item_name, $role)) {
                $this->success('更新成功', $this->getForward());
            }
            $this->error('更新失败');
        }

        return $this->render('edit', [
            'role' => $role,
        ]);
    }

    /**
     * ---------------------------------------
     * 删除“角色”
     * 同时会删除auth_assignment、auth_item_child、auth_item中关于$role的内容
     * @param string $role 角色名称
     * ---------------------------------------
     */
    public function actionDelete($role)
    {
        $role = Yii::$app->authManager->getRole($role);
        if (Yii::$app->authManager->remove($role)) {
            $this->success('删除成功', $this->getForward());
        }
        $this->error('删除失败');
    }

    /**
     * ---------------------------------------
     * 角色授权
     * ---------------------------------------
     */
    public function actionAuth($role)
    {

        /* 提交后 */
        if (Yii::$app->request->isPost) {
            $rules = Yii::$app->request->post('rules');
            /* 判断角色是否存在 */
            if (!$parent = Yii::$app->authManager->getRole($role)) {
                $this->error('角色不存在');
            }
            /* 删除角色所有child */
            Yii::$app->authManager->removeChildren($parent);

            if (is_array($rules)) {
                foreach ($rules as $rule) {
                    /* 更新auth_rule表 与 auth_item表 */
                    Yii::$app->authManager->saveRule($rule);
                    /* 更新auth_item_child表 */
                    Yii::$app->authManager->saveChild($parent->name, $rule);
                }
            }
            $this->success('更新权限成功', $this->getForward());
        }

        /* 获取栏目节点 */
        $node_list = Menu::returnNodes();
        $auth_rules = Yii::$app->authManager->getChildren($role);
        $auth_rules = array_keys($auth_rules);//var_dump($auth_rules);exit;

        return $this->render('auth', [
            'node_list' => $node_list,
            'auth_rules' => $auth_rules,
            'role' => $role,
        ]);
    }
    protected function success($message = '', $jumpUrl = '', $ajax = false)
    {
        $this->dispatchJump($message, 1, $jumpUrl, $ajax);
    }
    /**
     * ----------------------------------------------
     * 默认跳转操作 支持错误导向和正确跳转
     * 调用模板显示 默认为public目录下面的success页面
     * 提示页面为可配置 支持模板标签
     * @param string $message 提示信息
     * @param int $status 状态
     * @param string $jumpUrl 页面跳转地址
     * @param mixed $ajax 是否为Ajax方式 当数字时指定跳转时间
     * @access private
     * @return void
     * ----------------------------------------------
     */
    private function dispatchJump($message, $status = 1, $jumpUrl = '', $ajax = false)
    {
        $jumpUrl = !empty($jumpUrl) ? (is_array($jumpUrl) ? Url::toRoute($jumpUrl) : $jumpUrl) : '';
        if (true === $ajax || Yii::$app->request->isAjax) {// AJAX提交
            $data = is_array($ajax) ? $ajax : array();
            $data['info'] = $message;
            $data['status'] = $status;
            $data['url'] = $jumpUrl;
            $this->ajaxReturn($data);
        }
        // 成功操作后默认停留1秒
        $waitSecond = 0;

        if ($status) { //发送成功信息
            $message = $message ? $message : '提交成功';// 提示信息
            // 默认操作成功自动返回操作前页面
            echo $this->renderFile(Yii::$app->params['action_success'], [
                'message' => $message,
                'waitSecond' => $waitSecond,
                'jumpUrl' => $jumpUrl,
            ]);
        } else {
            $message = $message ? $message : '发生错误了';// 提示信息
            // 默认发生错误的话自动返回上页
            $jumpUrl = "javascript:history.back(-1);";
            echo $this->renderFile(Yii::$app->params['action_error'], [
                'message' => $message,
                'waitSecond' => $waitSecond,
                'jumpUrl' => $jumpUrl,
            ]);
        }
        //Yii::$app->end();
        exit;
    }
    public function getForward($default = '')
    {
        $default = $default ? $default : Url::toRoute([Yii::$app->controller->id . '/index']);
        if (Yii::$app->getSession()->hasFlash('__forward__')) {
            return Yii::$app->getSession()->getFlash('__forward__');
        } else {
            return $default;
        }
    }
    /**
     * ---------------------------------------
     * 授权用户列表
     * ---------------------------------------
     */
    public function actionUser($role)
    {
        /* 添加当前位置到cookie供后续跳转调用 */


        $uids = Yii::$app->authManager->getUserIdsByRole($role);
        $uids = implode(',', array_unique($uids));

        /*更新uids 为空的情况*/
        if ($uids) {
            $_where = 'id in(' . $uids . ')';
        } else {
            $_where = '1 != 1';
        }

        return $this->render('user', [
            'dataProvider' => $this->lists1(new Admin(), $_where),
        ]);
    }

    public function lists1($model, $where = [], $order = '')
    {
        $query = $model::find()->where($where)->orderBy($order)->asArray();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $dataProvider;
    }

}
