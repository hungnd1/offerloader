<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "key_glispas".
 *
 * @property string $id
 * @property integer $cd_number
 * @property string $api_token
 * @property string $created_at
 * @property string $updated_at
 */
class KeyGlispas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'key_glispas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cd_number', 'api_token'], 'required'],
            [['cd_number'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['api_token'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cd_number' => 'Cd Number',
            'api_token' => 'Api Token',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public static function getkey(){
        return KeyGlispas::find()->asArray()->all();;
    }
    public static function updateGlispas($api,$id,$cd){
        $glispas = KeyGlispas::findOne($id);
        $glispas->api_token = $api;
        $glispas->cd_number = $cd;
        if($glispas->update()){
            return true;
        }else{
            return false;
        }
    }
}
