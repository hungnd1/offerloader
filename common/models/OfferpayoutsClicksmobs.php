<?php

namespace common\models;

use Yii;
use yii\base\Exception;

/**
 * This is the model class for table "offerpayouts_clicksmobs".
 *
 * @property string $id
 * @property double $payout
 * @property string $countries
 * @property string $platforms
 * @property integer $offer_id
 * @property string $created_at
 * @property string $updated_at
 */
class OfferpayoutsClicksmobs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'offerpayouts_clicksmobs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'offer_id'], 'required'],
            [['payout'], 'number'],
            [['offer_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['id', 'countries', 'platforms'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'payout' => 'Payout',
            'countries' => 'Countries',
            'platforms' => 'Platforms',
            'offer_id' => 'Offer ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function getListClickSmobs($page, $rows_per_page,$sort)
    {
        $page_start = ($page - 1) * $rows_per_page;
        $page_end = $rows_per_page;

        $query = "SELECT * FROM clicksmobs
        inner join offerpayouts_clicksmobs on offerpayouts_clicksmobs.offer_id = clicksmobs.id ";
        $query .= " order by ".$sort." desc";
        $query .= " limit " . $page_start . "," . $page_end;
        try {
            $command = Yii::$app->db->createCommand($query);
            $rowCount = $command->execute();
            $row = $command->queryAll();
            return $row;
        } catch (Exception $e) {
            return $e;
        }
    }

    public static function getCount()
    {
        $query = "SELECT count(*) as co
            FROM clicksmobs
            inner join offerpayouts_clicksmobs on offerpayouts_clicksmobs.offer_id = clicksmobs.id ";
        try {
            $command = Yii::$app->db->createCommand($query);
            $rowCount = $command->execute();
            $row = $command->queryAll();
            foreach ($row as $val) {
                return $val['co'];
            }
        } catch (Exception $e) {
            return $e;
        }
    }

    public static function getDetail($id)
    {
        return OfferpayoutsClicksmobs::findOne(['offer_id' => $id]);
    }

    public static function getDetailClickSmobs($id, $payout)
    {
        $query = " SELECT distinct ocs.payout,acs.androidMinimalVersion,
                  ics.iosminimalVersion,wcs.windowsPhoneMinimalVersion,
                    opcs.androidPreviewURL,opcs.otherPreviewURL,opcs.ipadPreviewURL,opcs.iphonePreviewURL,opcs.ipodPreviewURL
                    FROM offerpayouts_clicksmobs ocs
                    inner join clicksmobs cs on cs.id = ocs.offer_id
                    inner join android_clicksmobs acs on acs.offer_id = ocs.offer_id
                    inner join ios_clicksmobs ics on ics.offer_id = ocs.offer_id
                    inner join windowsphone_clicksmobs wcs on wcs.offer_id = ocs.offer_id
                    inner join offerpreviews_clicksmobs opcs on opcs.offer_id = ocs.offer_id and ocs.offer_id=" . $id . "
                    and ocs.payout =  " . $payout;
        try {
            $command = Yii::$app->db->createCommand($query);
            $rowCount = $command->execute();
            $row = $command->queryAll();
            return $row;
        } catch (Exception $e) {
            return $e;
        }
    }

    public static function getDetailClick($id, $payout)
    {
        $query = Clicksmobs::findOne(['id' => $id]);
        return $query;
    }

    public static function getClickSmobsExport($id)
    {
        $query = " SELECT distinct ocs.offer_id,ocs.payout,ocs.countries,ocs.platforms,
                    cs.offerName,cs.subHeadline,cs.conversionMode,
                    acs.androidMinimalVersion,
                    ics.iosminimalVersion,wcs.windowsPhoneMinimalVersion,
                    opcs.androidPreviewURL,opcs.otherPreviewURL,opcs.ipadPreviewURL,opcs.iphonePreviewURL,opcs.ipodPreviewURL
                    FROM offerpayouts_clicksmobs ocs
                    inner join clicksmobs cs on cs.id = ocs.offer_id
                    inner join android_clicksmobs acs on acs.offer_id = ocs.offer_id
                    inner join ios_clicksmobs ics on ics.offer_id = ocs.offer_id
                    inner join windowsphone_clicksmobs wcs on wcs.offer_id = ocs.offer_id
                    inner join offerpreviews_clicksmobs opcs on opcs.offer_id = ocs.offer_id and ocs.offer_id in (" . $id . ")";
        try {
            $command = Yii::$app->db->createCommand($query);
            $rowCount = $command->execute();
            $row = $command->queryAll();
            return $row;
        } catch (Exception $e) {
            return $e;
        }
    }
}
