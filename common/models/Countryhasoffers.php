<?php

namespace common\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "countryhasoffers".
 *
 * @property string $id
 * @property integer $offer_id
 * @property integer $country_id
 * @property string $created_at
 * @property string $updated_at
 */
class Countryhasoffers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'countryhasoffers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['offer_id', 'country_id'], 'required'],
            [['offer_id', 'country_id'], 'integer'],
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
            'offer_id' => 'Offer ID',
            'country_id' => 'Country ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function getCountryCode($offer_id)
    {
        $query = Countries::find()
            ->select('c.code,chf.updated_at')
            ->from('countries c')
            ->innerJoin('countryhasoffers chf', 'c.id = chf.country_id')
            ->where('chf.offer_id = :offer', [':offer' => $offer_id])
            ->asArray()->all();
        return $query;
    }
}
