<?php

namespace common\models;

use api\models\HasOffer;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "hasoffers".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $require_approval
 * @property string $require_terms_and_conditions
 * @property string $terms_and_conditions
 * @property string $preview_url
 * @property string $currency
 * @property double $default_payout
 * @property string $status
 * @property string $expiration_date
 * @property string $payout_type
 * @property string $percent_payout
 * @property string $featured
 * @property integer $conversion_cap
 * @property integer $monthly_conversion_cap
 * @property double $payout_cap
 * @property double $monthly_payout_cap
 * @property integer $allow_website_links
 * @property integer $allow_direct_links
 * @property integer $show_custom_variables
 * @property integer $show_mail_list
 * @property integer $dne_list_id
 * @property integer $email_instructions
 * @property string $email_instructions_from
 * @property string $email_instructions_subject
 * @property integer $has_goals_enabled
 * @property string $default_goal_name
 * @property integer $use_target_rules
 * @property integer $is_expired
 * @property string $dne_download_url
 * @property string $dne_unsubscribe_url
 * @property integer $dne_third_party_list
 * @property string $created_at
 * @property string $updated_at
 */
class Hasoffers extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hasoffers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'require_approval', 'conversion_cap', 'monthly_conversion_cap', 'allow_website_links', 'allow_direct_links', 'show_custom_variables', 'show_mail_list', 'dne_list_id', 'email_instructions', 'has_goals_enabled', 'use_target_rules', 'is_expired', 'dne_third_party_list'], 'integer'],
            [['description', 'terms_and_conditions', 'preview_url'], 'string'],
            [['default_payout', 'payout_cap', 'monthly_payout_cap'], 'number'],
            [['expiration_date', 'created_at', 'updated_at'], 'safe'],
            [['name', 'require_terms_and_conditions', 'currency', 'status', 'payout_type', 'percent_payout', 'featured', 'email_instructions_from', 'email_instructions_subject', 'default_goal_name', 'dne_download_url', 'dne_unsubscribe_url'], 'string', 'max' => 255]
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
            'description' => 'Description',
            'require_approval' => 'Require Approval',
            'require_terms_and_conditions' => 'Require Terms And Conditions',
            'terms_and_conditions' => 'Terms And Conditions',
            'preview_url' => 'Preview Url',
            'currency' => 'Currency',
            'default_payout' => 'Default Payout',
            'status' => 'Status',
            'expiration_date' => 'Expiration Date',
            'payout_type' => 'Payout Type',
            'percent_payout' => 'Percent Payout',
            'featured' => 'Featured',
            'conversion_cap' => 'Conversion Cap',
            'monthly_conversion_cap' => 'Monthly Conversion Cap',
            'payout_cap' => 'Payout Cap',
            'monthly_payout_cap' => 'Monthly Payout Cap',
            'allow_website_links' => 'Allow Website Links',
            'allow_direct_links' => 'Allow Direct Links',
            'show_custom_variables' => 'Show Custom Variables',
            'show_mail_list' => 'Show Mail List',
            'dne_list_id' => 'Dne List ID',
            'email_instructions' => 'Email Instructions',
            'email_instructions_from' => 'Email Instructions From',
            'email_instructions_subject' => 'Email Instructions Subject',
            'has_goals_enabled' => 'Has Goals Enabled',
            'default_goal_name' => 'Default Goal Name',
            'use_target_rules' => 'Use Target Rules',
            'is_expired' => 'Is Expired',
            'dne_download_url' => 'Dne Download Url',
            'dne_unsubscribe_url' => 'Dne Unsubscribe Url',
            'dne_third_party_list' => 'Dne Third Party List',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function getListHasOffer($sort,$countries,$device)
    {
        $query = HasOffer::find();
        if (!empty($countries)) {
            $query->select('h.id,h.name,h.default_payout,h.payout_type,h.currency,h.description')->from('hasoffers h');
            $query->innerJoin('countryhasoffers',' countryhasoffers.offer_id = h.id');
            $query->andWhere("countryhasoffers.country_id = " . $countries);
        }
        if ($sort != '') {
            $provider = new ActiveDataProvider([
                'query' => $query,
                'sort' => ['defaultOrder' => ['default_payout' => SORT_DESC]],
                'pagination' => [
                    'defaultPageSize' => 30,
                ],
            ]);
        } else {
            $provider = new ActiveDataProvider([
                'query' => $query,
                'sort' => ['defaultOrder' => ['default_payout' => SORT_ASC]],
                'pagination' => [
                    'defaultPageSize' => 30,
                ],
            ]);
        }
        return $provider;
    }

    public static function getListOfferExport($id)
    {
        $query = "SELECT hf.id,hf.name,hf.description,hf.preview_url,hf.currency,hf.default_payout,hf.status,
            hf.expiration_date,hf.payout_type,fh.url,lh.click_url,lh.affiliate_id
             FROM hasoffers hf
             inner join file_hasoffers fh on fh.offer_id = hf.id
             inner join link_hasoffers lh on lh.offer_id = hf.id and hf.id in (" . $id . ")";
        try {
            $command = Yii::$app->db->createCommand($query);
            $rowCount = $command->execute();
            $row = $command->queryAll();
            return $row;
        } catch (Exception $e) {
            return $e;
        }
    }

    public static function getListOfferExportDemo()
    {
        $query = "SELECT hf.id,hf.name,hf.description,hf.preview_url,hf.currency,hf.default_payout,hf.status,
            hf.expiration_date,hf.payout_type,fh.url,lh.click_url,lh.affiliate_id
             FROM hasoffers hf
             inner join file_hasoffers fh on fh.offer_id = hf.id
             inner join link_hasoffers lh on lh.offer_id = hf.id and hf.id in (50621,51167) ";
        try {
            $command = Yii::$app->db->createCommand($query);
            $rowCount = $command->execute();
            $row = $command->queryAll();
            return $row;
        } catch (Exception $e) {
            return $e;
        }
    }

    public static function getDetailHasoffer($id)
    {
        return Hasoffers::findOne(['id' => $id]);
    }

    /**
     * Finds an identity by the given ID.
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id)
    {
        // TODO: Implement findIdentity() method.
    }

    /**
     * Finds an identity by the given token.
     * @param mixed $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     * @return IdentityInterface the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|integer an ID that uniquely identifies a user identity.
     */
    public function getId()
    {
        // TODO: Implement getId() method.
    }

    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @return string a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
     */
    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    /**
     * Validates the given auth key.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @param string $authKey the given auth key
     * @return boolean whether the given auth key is valid.
     * @see getAuthKey()
     */
    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }
}
