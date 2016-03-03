<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "key_matomies".
 *
 * @property string $id
 * @property string $key
 * @property integer $account
 * @property string $created_at
 * @property string $updated_at
 */
class KeyMatomies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'key_matomies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key', 'account'], 'required'],
            [['account'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['key'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'account' => 'Account',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public static function getkey(){
        return KeyMatomies::find()->asArray()->all();;
    }

    public static function updateMatomy($key,$id,$account){
        $click = KeyMatomies::findOne($id);
        $click->key = $key;
        $click->account = $account;
        if($click->update(false)){
            return true;
        }else{
            return false;
        }
    }
}
