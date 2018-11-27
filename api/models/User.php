<?php
namespace api\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{

    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    public static function tableName()

    {

        return 'user';

    }

    public function rules()

    {

        return [

            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],

            [['status', 'created_at', 'updated_at'], 'integer'],

            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],

            [['auth_key'], 'string', 'max' => 32],

            [['access_token'], 'string', 'max' => 60],

            [['username'], 'unique'],

            [['email'], 'unique'],

            [['password_reset_token'], 'unique'],

        ];

    }
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * 校验api_token是否有效
     */
    public static function apiTokenIsValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.apiTokenExpire'];
        return $timestamp + $expire >= time();
    }
    public function attributeLabels()

    {

        return [

            'id' => 'ID',

            'username' => 'Username',

            'auth_key' => 'Auth Key',

            'password_hash' => 'Password Hash',

            'password_reset_token' => 'Password Reset Token',

            'email' => 'Email',

            'status' => 'Status',

            'created_at' => 'Created At',

            'updated_at' => 'Updated At',

            'access_token' => 'Access Token',
        ];

    }

    //实现接口里的全部方法

    public static function findIdentity($id)

    {

        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);

    }

    public static function findIdentityByAccessToken($token, $type = null)

    {

        return static::findOne(['access_token' => $token]);       //数据库user表中的字段access_token

    }

    //这个就是我们进行yii\filters\auth\QueryParamAuth调用认证的函数，下面会说到。

    public function loginByAccessToken($accessToken, $type) {

        //查询数据库中有没有存在这个token

        return static::findIdentityByAccessToken($accessToken, $type);

    }

    public static function findByUsername($username)

    {

        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);

    }

    public function getId()

    {

        return $this->getPrimaryKey();

    }

    public function getAuthKey()

    {

        return $this->auth_key;

    }

    public function validateAuthKey($authKey)

    {

        return $this->getAuthKey() === $authKey;

    }

    /**
     * 生成 api_token
     */
    public function generateApiToken()
    {
        $this->access_token = Yii::$app->security->generateRandomString() . '_' . time();
    }
}
