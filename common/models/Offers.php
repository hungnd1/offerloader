<?php

namespace common\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "offers".
 *
 * @property string $id
 * @property string $network
 * @property integer $offer_id
 * @property string $offer_name
 * @property string $preview_url
 * @property integer $incent
 * @property string $tracking_url
 * @property double $payout
 * @property string $description
 * @property string $countries
 * @property integer $daily_cap
 * @property string $currency
 * @property string $os
 * @property string $payout_type
 * @property string $created_at
 * @property string $updated_at
 */
class Offers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'offers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['offer_id', 'incent', 'daily_cap'], 'integer'],
            [['offer_name', 'preview_url', 'tracking_url', 'description', 'countries'], 'string'],
            [['payout'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['network', 'currency', 'os', 'payout_type'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'network' => 'Network',
            'offer_id' => 'Offer ID',
            'offer_name' => 'Offer Name',
            'preview_url' => 'Preview Url',
            'incent' => 'Incent',
            'tracking_url' => 'Tracking Url',
            'payout' => 'Payout',
            'description' => 'Description',
            'countries' => 'Countries',
            'daily_cap' => 'Daily Cap',
            'currency' => 'Currency',
            'os' => 'Os',
            'payout_type' => 'Payout Type',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function getAllNetwork()
    {
        $query = Offers::find()
            ->select('distinct(network)')
            ->from('offers')
            ->orderBy('network asc');
        $provider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $provider;
    }

    public static function getListOffers($countries, $device, $network, $sort)
    {
        $query = Offers::find();
        if (!empty($countries)) {
            $query->andWhere("countries like '%" . $countries . "%'");
        }
        if (!empty($device)) {
            $query->andWhere("os like '%" . $device . "%'");
        }
        if (!empty($network)) {
            $query->andWhere("network like '%" . $network . "%'");
        }
        if ($sort == 'desc') {
            $provider = new ActiveDataProvider([
                'query' => $query,
                'sort' => ['defaultOrder' => ['payout' => SORT_DESC]],
                'pagination' => [
                    'defaultPageSize' => 60,
                ],
            ]);
        } else if($sort == 'asc')  {
            $provider = new ActiveDataProvider([
                'query' => $query,
                'sort' => ['defaultOrder' => ['payout' => SORT_ASC]],
                'pagination' => [
                    'defaultPageSize' => 60,
                ],
            ]);
        }else {
            $provider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                    'defaultPageSize' => 60,
                ],
            ]);
        }

        return $provider;
    }

    public static function getListOfferExport($id)
    {
        $query = Offers::find();
        if (!empty($id)) {
            $query->andWhere("id in (" . $id . ")");
        }

        $provider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['payout' => SORT_DESC]],
            'pagination' => [
                'defaultPageSize' => 60,
            ],
        ]);

        return $provider;
    }

    public static function getDetailOffers($id){
        return \api\models\Offers::findOne(['id'=>$id]);
    }
}
