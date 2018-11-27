<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "test".
 *
 * @property int $id 自增ID
 * @property string $username 用户名
 * @property string $auth_key 自动登录key
 * @property string $password_hash 加密密码
 * @property string $password_reset_token 重置密码token
 * @property string $email_validate_token 邮箱验证token
 * @property string $email 邮箱
 * @property int $role 角色等级
 * @property int $status 状态
 * @property string $avatar 头像
 * @property int $vip_lv vip等级
 * @property int $created_at 创建时间
 * @property int $updated_at
 */
class Test extends \common\BaseActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role', 'status', 'vip_lv', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email_validate_token', 'email', 'avatar'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '用户名',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email_validate_token' => 'Email Validate Token',
            'email' => 'Email',
            'role' => 'Role',
            'status' => 'Status',
            'avatar' => 'Avatar',
            'vip_lv' => 'Vip Lv',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
