<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "creative_glispas".
 *
 * @property string $id
 * @property string $link
 * @property string $description
 * @property string $adcopy
 * @property integer $glispa_id
 * @property string $created_at
 * @property string $updated_at
 */
class CreativeGlispas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'creative_glispas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['link', 'description', 'adcopy'], 'string'],
            [['glispa_id'], 'required'],
            [['glispa_id'], 'integer'],
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
            'link' => 'Link',
            'description' => 'Description',
            'adcopy' => 'Adcopy',
            'glispa_id' => 'Glispa ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public static function getDetail($glispasId){
        $query = CreativeGlispas::findAll(['glispa_id'=>$glispasId]);
        return $query;
    }
}
