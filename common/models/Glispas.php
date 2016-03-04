<?php

namespace common\models;

use Yii;
use yii\data\ActiveDataProvider;


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

    public static function getListGlispas($sort, $countries, $device){
        $query = Glispas::find();
        if(!empty($countries)) {
            $query->andWhere("countries like '%" . $countries . "%'");
        }
        if(!empty($device)) {
            $query->andWhere("device Like '%" . $countries . "%'");
        }
        if($sort == '') {
            $provider = new ActiveDataProvider(
                [
                    'query'      => $query,
                    'sort'       => ['defaultOrder' => ['payout' => 'DESC']],
                    'pagination' => [
                        'defaultPageSize' => 30,
                    ],
                ]
            );
        } else {
            $provider = new ActiveDataProvider(
                [
                    'query'      => $query,
                    'sort'       => ['defaultOrder' => ['payout' => 'ASC']],
                    'pagination' => [
                        'defaultPageSize' => 30,
                    ],
                ]
            );
        }
        return $provider;
    }

    public static function getListGlispasExport($id){
        $query = "select * from glispas where glispaID in (".$id.")";
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
