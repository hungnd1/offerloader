<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "key_offersevens".
 *
 * @property string $id
 * @property string $token
 * @property string $created_at
 * @property string $updated_at
 */
class KeyOffersevens extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'key_offersevens';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['token'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['token'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'token' => 'Token',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public static function getkey(){
        return KeyOffersevens::find()->asArray()->all();;
    }

    public static function updateSeven($id,$token){
        $seven = KeyOffersevens::findOne($id);
        $seven->token = $token;
        if($seven->update()){
            return true;
        }else{
            return false;
        }
    }
}
