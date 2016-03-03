<?php

namespace common\models;

use frontend\models\KeyHasOffer;
use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "key_hasoffers".
 *
 * @property string $id
 * @property string $api_key
 * @property string $network_id
 * @property string $created_at
 * @property string $updated_at
 */
class KeyHasoffers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'key_hasoffers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['api_key', 'network_id'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['api_key', 'network_id'], 'string', 'max' => 255]
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
            'network_id' => 'Network ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function getKey(){
        $query = KeyHasoffers::find()->asArray()->all();
        return $query;
    }

    public static function addnew($api,$network){
        $keyhasoffer = new KeyHasoffers();
        $keyhasoffer->api_key = $api;
        $keyhasoffer->network_id = $network;
        $keyhasoffer->created_at = time();
        $keyhasoffer->updated_at = time();
        if($keyhasoffer->save()){
            return true;
        }else{
            return false;
        }

    }
}
