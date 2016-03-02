<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "android_clicksmobs".
 *
 * @property string $id
 * @property string $androidMinimalVersion
 * @property string $androidMaximalVersion
 * @property integer $isAPK
 * @property integer $offer_id
 * @property string $created_at
 * @property string $updated_at
 */
class AndroidClicksmobs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'android_clicksmobs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['isAPK', 'offer_id'], 'integer'],
            [['offer_id'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['androidMinimalVersion', 'androidMaximalVersion'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'androidMinimalVersion' => 'Android Minimal Version',
            'androidMaximalVersion' => 'Android Maximal Version',
            'isAPK' => 'Is Apk',
            'offer_id' => 'Offer ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
