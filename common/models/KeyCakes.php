<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "key_cakes".
 *
 * @property string $id
 * @property string $api_key
 * @property integer $affiliate_id
 * @property string $created_at
 * @property string $updated_at
 */
class KeyCakes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'key_cakes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['api_key', 'affiliate_id'], 'required'],
            [['affiliate_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['api_key'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'api_key' => 'Api Key',
            'affiliate_id' => 'Affiliate ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public static function getkey(){
        return KeyCakes::find()->asArray()->all();
    }
    public static function updateCakes($id,$apikey,$affiliate_id){
        $apxes = KeyCakes::findOne($id);
        $apxes->api_key = $apikey;
        $apxes->affiliate_id = $affiliate_id;
        if($apxes->update()){
            return true;
        }else{
            return false;
        }

    }
}
