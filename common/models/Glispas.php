<?php

namespace common\models;

use Yii;
use yii\base\Exception;
use yii\data\ActiveDataProvider;
use yii\db\Query;

/**
 * This is the model class for table "glispas".
 *
 * @property integer $glispaID
 * @property string $name
 * @property string $category
 * @property string $countries
 * @property string $summary
 * @property string $acquisition
 * @property string $target
 * @property string $rules
 * @property string $payout
 * @property string $tracking
 * @property string $creativeURL
 * @property string $created_at
 * @property string $updated_at
 */
class Glispas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'glispas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['glispaID'], 'required'],
            [['glispaID'], 'integer'],
            [['summary', 'target', 'rules', 'tracking', 'creativeURL'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'category', 'countries', 'acquisition', 'payout'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'glispaID' => 'Glispa ID',
            'name' => 'Name',
            'category' => 'Category',
            'countries' => 'Countries',
            'summary' => 'Summary',
            'acquisition' => 'Acquisition',
            'target' => 'Target',
            'rules' => 'Rules',
            'payout' => 'Payout',
            'tracking' => 'Tracking',
            'creativeURL' => 'Creative Url',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function getListGlispas($sort){
        $query = Glispas::find();
        $provider = new ActiveDataProvider([
            'query' =>$query,
            'sort'=>[
                'defaultOrder' => [
                    $sort=>SORT_DESC
                ]
            ],
//            'pagination' => false
            'pagination' => [
            'defaultPageSize' => 30,
        ],
        ]);
        return $provider;
    }

    public static function getListGlispasExport($array){
        $query = "select * from glispas where glispaID in (".$array.")";
        try{
            $command = Yii::$app->db->createCommand($query);
            $rowCount = $command->execute();
            $row = $command->queryAll();
            return $row;
        }catch(Exception $e){
            return $e;
        }
    }
    public static function getDetailById($id = 0){
        $detail = \api\models\Glispas::findOne(['glispaID'=>$id]);
        return $detail;
    }
}
