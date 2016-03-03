<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "key_click_smobs".
 *
 * @property string $id
 * @property integer $user_id
 * @property string $user_token
 * @property string $created_at
 * @property string $updated_at
 */
class KeyClickSmobs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'key_click_smobs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'user_token'], 'required'],
            [['user_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['user_token'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'user_token' => 'User Token',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public static function getkey(){
        return KeyClickSmobs::find()->asArray()->all();;
    }
}
