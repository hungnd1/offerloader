<?php

namespace common\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "offersevens".
 *
 * @property integer $ID
 * @property string $APP_ID
 * @property string $Name
 * @property string $Original_name
 * @property string $Description
 * @property string $Type
 * @property string $Preview_url
 * @property string $Tracking_url
 * @property string $Icon_url
 * @property string $Currency
 * @property string $Tags
 * @property string $Platforms
 * @property string $Countries
 * @property double $Payout
 * @property string $Status
 * @property string $Expiration_date
 * @property integer $Daily_cap
 * @property integer $Monthly_cap
 * @property integer $Approved
 * @property string $created_at
 * @property string $updated_at
 */
class Offersevens extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'offersevens';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID'], 'required'],
            [['ID', 'Daily_cap', 'Monthly_cap', 'Approved'], 'integer'],
            [['Description', 'Preview_url', 'Tracking_url', 'Icon_url'], 'string'],
            [['Payout'], 'number'],
            [['Expiration_date', 'created_at', 'updated_at'], 'safe'],
            [['APP_ID', 'Name', 'Original_name', 'Type', 'Currency', 'Tags', 'Platforms', 'Countries', 'Status'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'APP_ID' => 'App  ID',
            'Name' => 'Name',
            'Original_name' => 'Original Name',
            'Description' => 'Description',
            'Type' => 'Type',
            'Preview_url' => 'Preview Url',
            'Tracking_url' => 'Tracking Url',
            'Icon_url' => 'Icon Url',
            'Currency' => 'Currency',
            'Tags' => 'Tags',
            'Platforms' => 'Platforms',
            'Countries' => 'Countries',
            'Payout' => 'Payout',
            'Status' => 'Status',
            'Expiration_date' => 'Expiration Date',
            'Daily_cap' => 'Daily Cap',
            'Monthly_cap' => 'Monthly Cap',
            'Approved' => 'Approved',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function getListSevens($sort){
        $query = Offersevens::find();
        $provider = new ActiveDataProvider([
            'query' =>$query,
            'sort'=>[
                'defaultOrder' => [
                    $sort=>SORT_DESC
                ]
            ],
//            'pagination' => false
            'pagination' => [
                'defaultPageSize' => 30,
            ],
        ]);
        return $provider;
    }

    public static function getListSevenExport($array){
        $query = "select * from offersevens where ID in (".$array.")";
        try{
            $command = Yii::$app->db->createCommand($query);
            $rowCount = $command->execute();
            $row = $command->queryAll();
            return $row;
        }catch(Exception $e){
            return $e;
        }
    }
    public static function getDetailById($id = 0){
        $detail = \api\models\OfferSevens::findOne(['ID'=>$id]);
        return $detail;
    }
}
