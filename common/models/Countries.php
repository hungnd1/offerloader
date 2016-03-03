<?php

namespace common\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "countries".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 */
class Countries extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'countries';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'code', 'name'], 'required'],
            [['id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['code', 'name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'name' => 'Name',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public static function getCountryName($code){
        return $country = Countries::findOne(['upper(code)'=>$code]);
    }
    public static function getAllCountry(){
        $query = Countries::find();
        $provider = new ActiveDataProvider([
            'query' =>$query,
            'sort'=>[
                'defaultOrder' => [
                    'name'=>SORT_DESC
                ]
            ],
            'pagination' => false
        ]);
        return $provider;
    }
}
