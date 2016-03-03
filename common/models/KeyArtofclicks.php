<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "key_artofclicks".
 *
 * @property string $id
 * @property string $api_key
 * @property string $created_at
 * @property string $updated_at
 */
class KeyArtofclicks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'key_artofclicks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['api_key'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['api_key'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'api_key' => 'Api Key',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function getkey(){
        return KeyArtofclicks::find()->asArray()->all();;
    }

    public static function updateArt($id,$api){
        $art = KeyArtofclicks::findOne($id);
        $art->api_key = $api;
        $art->update();
    }
}
