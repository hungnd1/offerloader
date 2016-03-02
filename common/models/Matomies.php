<?php

namespace common\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "matomies".
 *
 * @property integer $id
 * @property string $name
 * @property integer $program_id
 * @property string $program_name
 * @property string $type
 * @property string $date_created
 * @property string $date_updated
 * @property string $description
 * @property string $country
 * @property string $language
 * @property string $association_status
 * @property integer $category_ids
 * @property string $media_types
 * @property string $budget
 * @property string $budget_type
 * @property integer $Suppression_file_indication
 * @property string $mobile_tags
 * @property string $Package_Name
 * @property string $Unsubscribe_link
 * @property string $payout_type
 * @property string $payout_currency
 * @property string $commission_approval
 * @property string $payout
 * @property string $created_at
 * @property string $updated_at
 */
class Matomies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'matomies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'program_id', 'program_name', 'type', 'date_created', 'date_updated', 'description', 'country', 'language', 'association_status', 'category_ids', 'media_types', 'budget', 'budget_type', 'Suppression_file_indication', 'mobile_tags', 'Package_Name', 'Unsubscribe_link', 'payout_type', 'payout_currency', 'commission_approval', 'payout'], 'required'],
            [['id', 'program_id', 'category_ids', 'Suppression_file_indication'], 'integer'],
            [['date_created', 'date_updated', 'created_at', 'updated_at'], 'safe'],
            [['name', 'program_name', 'type', 'description', 'country', 'language', 'association_status', 'media_types', 'budget', 'budget_type', 'mobile_tags', 'Package_Name', 'Unsubscribe_link', 'payout_type', 'payout_currency', 'commission_approval', 'payout'], 'string', 'max' => 255]
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
            'program_id' => 'Program ID',
            'program_name' => 'Program Name',
            'type' => 'Type',
            'date_created' => 'Date Created',
            'date_updated' => 'Date Updated',
            'description' => 'Description',
            'country' => 'Country',
            'language' => 'Language',
            'association_status' => 'Association Status',
            'category_ids' => 'Category Ids',
            'media_types' => 'Media Types',
            'budget' => 'Budget',
            'budget_type' => 'Budget Type',
            'Suppression_file_indication' => 'Suppression File Indication',
            'mobile_tags' => 'Mobile Tags',
            'Package_Name' => 'Package  Name',
            'Unsubscribe_link' => 'Unsubscribe Link',
            'payout_type' => 'Payout Type',
            'payout_currency' => 'Payout Currency',
            'commission_approval' => 'Commission Approval',
            'payout' => 'Payout',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public static function getListMatomies(){
        $query = Matomies::find();
        $provider = new ActiveDataProvider([
            'query' =>$query,
            'sort'=>[
                'defaultOrder' => [
                ]
            ],
            'pagination' => [
                'defaultPageSize' => 30,
            ],
        ]);
        return $provider;
    }

    public static function getDetailMatomies($id){
        return Matomies::findOne(['id'=>$id]);
    }
}
