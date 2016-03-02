<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "restriction_offersevens".
 *
 * @property integer $id
 * @property string $name
 * @property string $allow
 * @property integer $offerseven_id
 * @property string $created_at
 * @property string $updated_at
 */
class RestrictionOffersevens extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'restriction_offersevens';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'offerseven_id'], 'required'],
            [['id', 'offerseven_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'allow'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'allow' => 'Allow',
            'offerseven_id' => 'Offerseven ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function getDetail($id){
        $query = RestrictionOffersevens::findAll(['offerseven_id'=>$id]);
        return $query;
    }
}
