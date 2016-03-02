<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "offerpreviews_clicksmobs".
 *
 * @property string $id
 * @property string $language
 * @property string $androidPreviewURL
 * @property string $otherPreviewURL
 * @property string $ipadPreviewURL
 * @property string $iphonePreviewURL
 * @property string $ipodPreviewURL
 * @property integer $offer_id
 * @property string $created_at
 * @property string $updated_at
 */
class OfferpreviewsClicksmobs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'offerpreviews_clicksmobs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['androidPreviewURL', 'otherPreviewURL', 'ipadPreviewURL', 'iphonePreviewURL', 'ipodPreviewURL'], 'string'],
            [['offer_id'], 'required'],
            [['offer_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['language'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'language' => 'Language',
            'androidPreviewURL' => 'Android Preview Url',
            'otherPreviewURL' => 'Other Preview Url',
            'ipadPreviewURL' => 'Ipad Preview Url',
            'iphonePreviewURL' => 'Iphone Preview Url',
            'ipodPreviewURL' => 'Ipod Preview Url',
            'offer_id' => 'Offer ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
