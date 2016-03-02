<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ios_clicksmobs".
 *
 * @property string $id
 * @property string $iosminimalVersion
 * @property string $iosmaximalVersion
 * @property integer $offer_id
 * @property string $created_at
 * @property string $updated_at
 */
class IosClicksmobs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ios_clicksmobs';
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
            [['iosminimalVersion', 'iosmaximalVersion'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'iosminimalVersion' => 'Iosminimal Version',
            'iosmaximalVersion' => 'Iosmaximal Version',
            'offer_id' => 'Offer ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
