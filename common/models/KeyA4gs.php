<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "key_a4gs".
 *
 * @property string $id
 * @property string $apiKey
 * @property integer $affiliateId
 * @property integer $zoneId
 * @property string $created_at
 * @property string $updated_at
 */
class KeyA4gs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'key_a4gs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['apiKey', 'affiliateId', 'zoneId'], 'required'],
            [['apiKey'], 'string'],
            [['affiliateId', 'zoneId'], 'integer'],
            [['created_at', 'updated_at'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'apiKey' => 'Api Key',
            'affiliateId' => 'Affiliate ID',
            'zoneId' => 'Zone ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function getkey(){
        return KeyA4gs::find()->asArray()->all();
    }

    public static function updateKeya4gs($id,$api,$affi,$zone){
        $keya4gs = KeyA4gs::findOne($id);
        $keya4gs->apiKey = $api;
        $keya4gs->affiliateId = $affi;
        $keya4gs->zoneId = $zone;
        if($keya4gs->update()){
            return true;
        }else{
            return false;
        }

    }
}
