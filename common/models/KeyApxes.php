<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "key_apxes".
 *
 * @property string $id
 * @property string $username
 * @property string $password
 * @property string $devicetype
 * @property string $trafficsourceid
 * @property string $created_at
 * @property string $updated_at
 */
class KeyApxes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'key_apxes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'devicetype', 'trafficsourceid'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['username', 'password', 'devicetype', 'trafficsourceid'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'devicetype' => 'Devicetype',
            'trafficsourceid' => 'Trafficsourceid',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function getkey(){
        return KeyApxes::find()->asArray()->all();
    }
    public static function updateApxes($id,$username,$password,$devicetype,$trafficsourceid){
        $apxes = KeyApxes::findOne($id);
        $apxes->username = $username;
        $apxes->password = $password;
        $apxes->devicetype = $devicetype;
        $apxes->trafficsourceid = $trafficsourceid;
        if($apxes->update()){
            return true;
        }else{
            return false;
        }

    }
}
