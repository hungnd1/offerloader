<?php

namespace common\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "art_of_click_models".
 *
 * @property integer $id
 * @property string $name
 * @property integer $incent
 * @property string $previewUrl
 * @property string $description
 * @property string $payoutType
 * @property double $payout
 * @property string $currency
 * @property string $storeId
 * @property string $noticePeriod
 * @property string $creatives
 * @property string $browser
 * @property string $device
 * @property string $os
 * @property string $osVersionMinimum
 * @property string $countries
 * @property string $trackingUrl
 * @property integer $approved
 * @property string $downloadType
 * @property string $monthlyCap
 * @property integer $dailyCap
 * @property integer $dailyCapsRemaining
 * @property string $created_at
 * @property string $updated_at
 */
class ArtOfClickModels extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'art_of_click_models';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'incent', 'approved', 'dailyCap', 'dailyCapsRemaining'], 'integer'],
            [['previewUrl', 'description'], 'string'],
            [['payout'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'payoutType', 'currency', 'storeId', 'noticePeriod', 'creatives', 'browser', 'device', 'os', 'osVersionMinimum', 'countries', 'trackingUrl', 'downloadType', 'monthlyCap'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'incent' => 'Incent',
            'previewUrl' => 'Preview Url',
            'description' => 'Description',
            'payoutType' => 'Payout Type',
            'payout' => 'Payout',
            'currency' => 'Currency',
            'storeId' => 'Store ID',
            'noticePeriod' => 'Notice Period',
            'creatives' => 'Creatives',
            'browser' => 'Browser',
            'device' => 'Device',
            'os' => 'Os',
            'osVersionMinimum' => 'Os Version Minimum',
            'countries' => 'Countries',
            'trackingUrl' => 'Tracking Url',
            'approved' => 'Approved',
            'downloadType' => 'Download Type',
            'monthlyCap' => 'Monthly Cap',
            'dailyCap' => 'Daily Cap',
            'dailyCapsRemaining' => 'Daily Caps Remaining',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function getListHasOffer(){
        $query = ArtOfClickModels::find();
        $provider = new ActiveDataProvider([
           'query' =>$query,
            'sort'=>[
                'defaultOrder' => [
                ]
            ],
            'pagination' => [
                'defaultPageSize' => 10,
            ],
        ]);
        return $provider;
    }

}
