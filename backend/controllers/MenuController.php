<?php

namespace backend\controllers;

use Yii;
use backend\models\Menu;
use common\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\Controller;
use backend\models\search\MenuSearch;


/**
 * 后台菜单控制器
 * @author longfei <phphome@qq.com>
 */
class MenuController extends BaseController
{
    /**
     * ---------------------------------------
     * 列表页
     * ---------------------------------------
     */
    public function actionIndex()
    {

        /* 添加当前位置到cookie供后续跳转调用*/

        $searchModel = new MenuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * ---------------------------------------
     * 添加
     * ---------------------------------------
     */
    public function actionAdd()
    {
        $pid = Yii::$app->request->get('pid', 0);
        $model = $this->findModel(0);

        if (Yii::$app->request->isPost) {
            /* 表单验证 */
            $data = Yii::$app->request->post('Menu');
            $data['status'] = 1;

            if ($this->saveRow($model, $data)) {
                $this->success('操作成功', $this->getForward());
            } else {
                $this->error('操作错误');
            }
        }

        /* 设置默认值 */
        $model->loadDefaultValues();
        $model->pid = $pid;
        /* 渲染模板 */
        return $this->render('edit', [
            'model' => $model,
        ]);
    }

    /**
     * ---------------------------------------
     * 编辑
     * ---------------------------------------
     */
    public function actionEdit()
    {
        $id = Yii::$app->request->get('id', 0);
        $model = $this->findModel($id);

        if (Yii::$app->request->isPost) {
            /* 表单验证 */
            $data = Yii::$app->request->post('Menu');

            if ($this->saveRow($model, $data)) {
                $this->success('操作成功', $this->getForward());
            } else {
                $this->error('操作错误');
            }
        }
        /* 渲染模板 */
        return $this->render('edit', [
            'model' => $model,
        ]);
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
     * 修改数据表一条记录的一条值
     * @param \yii\db\ActiveRecord $model 模型名称
     * @param array $data 数据
     * @return \yii\db\ActiveRecord|boolean
     * ---------------------------------------
     */
    public function saveRow($model, $data)
    {
        if (empty($data)) {
            return false;
        }
        if ($model->load($data, '') && $model->validate()) {
            /* 添加到数据库中,save()会自动验证rule */
            if ($model->save()) {
                return $model;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * ---------------------------------------
     * 由表主键删除数据表中的多条记录
     * @param \yii\db\ActiveRecord $model 模型名称,供M函数使用的参数
     * @param string $pk 修改的数据
     * @return boolean
     * ---------------------------------------
     */
    public function delRow($model, $pk = 'id')
    {
        $ids = Yii::$app->request->param($pk, 0);
        $ids = implode(',', array_unique((array)$ids));

        if (empty($ids)) {
            return false;
        }

        $_where = $pk . ' in(' . $ids . ')';
        if ($model::deleteAll($_where)) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * ---------------------------------------
     * 删除或批量删除
     * ---------------------------------------
     */
    public function actionDelete()
    {
        $model = $this->findModel(0);
        if ($this->delRow($model, 'id')) {
            $this->success('删除成功', $this->getForward());
        } else {
            $this->error('删除失败！');
        }
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Menu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if ($id == 0) {
            return new Menu();
        }
        if (($model = Menu::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
