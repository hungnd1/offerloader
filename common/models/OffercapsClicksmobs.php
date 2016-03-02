<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "offercaps_clicksmobs".
 *
 * @property string $id
 * @property integer $noDailyCap
 * @property integer $totalCapLimit
 * @property integer $offer_id
 * @property string $created_at
 * @property string $updated_at
 */
class OffercapsClicksmobs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'offercaps_clicksmobs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['noDailyCap', 'totalCapLimit', 'offer_id'], 'integer'],
            [['offer_id'], 'required'],
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
            'noDailyCap' => 'No Daily Cap',
            'totalCapLimit' => 'Total Cap Limit',
            'offer_id' => 'Offer ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
