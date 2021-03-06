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

    public static function getListArtOfClick($sort, $countries, $device)
    {
        $query = ArtOfClickModels::find();
        if (!empty($countries)) {
            $query->andWhere("countries like '%" . $countries . "%'");
        }
        if (!empty($device)) {
            $query->andWhere("device like '%" . $device . "%'");
        }
        if ($sort != '') {
            $provider = new ActiveDataProvider([
                'query' => $query,
                'sort' => ['defaultOrder' => ['payout' => 'DESC']],
                'pagination' => [
                    'defaultPageSize' => 30,
                ],
            ]);
        } else {
            $provider = new ActiveDataProvider([
                'query' => $query,
                'sort' => ['defaultOrder' => ['payout' => 'ASC']],
                'pagination' => [
                    'defaultPageSize' => 30,
                ],
            ]);
        }

        return $provider;
    }

    public static function getDetailArtOfClick($id)
    {
        return ArtOfClickModels::findOne(['id' => $id]);
    }

    public static function getListArtofclickExport($id){
        $query = "SELECT * FROM art_of_click_models where id in (".$id.")";
        try{
            $command = Yii::$app->db->createCommand($query);
            $rowCount = $command->execute();
            $row = $command->queryAll();
            return $row;
        }catch(Exception $e){
            return $e;
        }
    }
}
