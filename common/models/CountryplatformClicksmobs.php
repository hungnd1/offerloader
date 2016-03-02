<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "countryplatform_clicksmobs".
 *
 * @property string $id
 * @property string $countries
 * @property string $platforms
 * @property integer $dailyCap
 * @property integer $offercap_id
 * @property string $created_at
 * @property string $updated_at
 */
class CountryplatformClicksmobs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'countryplatform_clicksmobs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dailyCap', 'offercap_id'], 'integer'],
            [['offercap_id'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['countries', 'platforms'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'countries' => 'Countries',
            'platforms' => 'Platforms',
            'dailyCap' => 'Daily Cap',
            'offercap_id' => 'Offercap ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
