<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "windowsphone_clicksmobs".
 *
 * @property string $id
 * @property string $windowsPhoneMinimalVersion
 * @property string $windowsPhoneMaximalVersion
 * @property integer $offer_id
 * @property string $created_at
 * @property string $updated_at
 */
class WindowsphoneClicksmobs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'windowsphone_clicksmobs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['offer_id'], 'required'],
            [['offer_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['windowsPhoneMinimalVersion', 'windowsPhoneMaximalVersion'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'windowsPhoneMinimalVersion' => 'Windows Phone Minimal Version',
            'windowsPhoneMaximalVersion' => 'Windows Phone Maximal Version',
            'offer_id' => 'Offer ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
