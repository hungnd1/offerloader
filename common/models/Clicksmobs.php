<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "clicksmobs".
 *
 * @property integer $id
 * @property string $offerName
 * @property string $subHeadline
 * @property string $description
 * @property string $categories
 * @property string $conversionMode
 * @property string $conversionUserFlow
 * @property string $restrictions
 * @property string $notes
 * @property string $androidPackageName
 * @property integer $adultTraffic
 * @property integer $incentiveAllowed
 * @property integer $mediabuyerAllowed
 * @property integer $keyworderAllowed
 * @property integer $pushAllowed
 * @property integer $applicationTrafficAllowed
 * @property integer $publisherValidationAutomatic
 * @property integer $allowedUseOwnCreative
 * @property integer $allowedCustomizeBannerTarget
 * @property integer $eachCreativeMustHaveDifferentLink
 * @property integer $approvalRequired
 * @property integer $needAcceptTerms
 * @property integer $allowedWiFi
 * @property integer $allowed3G
 * @property integer $minimalAge
 * @property integer $rebrokerAllowed
 * @property integer $discoveryAllowed
 * @property integer $emailingAllowed
 * @property string $bannersURL
 * @property string $targetURL
 * @property string $thumbnailURL
 * @property string $s2S
 * @property string $iosbundleID
 * @property integer $smsallowed
 * @property string $created_at
 * @property string $updated_at
 */
class Clicksmobs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clicksmobs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'adultTraffic', 'incentiveAllowed', 'mediabuyerAllowed', 'keyworderAllowed', 'pushAllowed', 'applicationTrafficAllowed', 'publisherValidationAutomatic', 'allowedUseOwnCreative', 'allowedCustomizeBannerTarget', 'eachCreativeMustHaveDifferentLink', 'approvalRequired', 'needAcceptTerms', 'allowedWiFi', 'allowed3G', 'minimalAge', 'rebrokerAllowed', 'discoveryAllowed', 'emailingAllowed', 'smsallowed'], 'integer'],
            [['subHeadline', 'description', 'conversionUserFlow', 'restrictions', 'bannersURL', 'targetURL', 'thumbnailURL'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['offerName', 'categories', 'conversionMode', 'notes', 'androidPackageName', 's2S', 'iosbundleID'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'offerName' => 'Offer Name',
            'subHeadline' => 'Sub Headline',
            'description' => 'Description',
            'categories' => 'Categories',
            'conversionMode' => 'Conversion Mode',
            'conversionUserFlow' => 'Conversion User Flow',
            'restrictions' => 'Restrictions',
            'notes' => 'Notes',
            'androidPackageName' => 'Android Package Name',
            'adultTraffic' => 'Adult Traffic',
            'incentiveAllowed' => 'Incentive Allowed',
            'mediabuyerAllowed' => 'Mediabuyer Allowed',
            'keyworderAllowed' => 'Keyworder Allowed',
            'pushAllowed' => 'Push Allowed',
            'applicationTrafficAllowed' => 'Application Traffic Allowed',
            'publisherValidationAutomatic' => 'Publisher Validation Automatic',
            'allowedUseOwnCreative' => 'Allowed Use Own Creative',
            'allowedCustomizeBannerTarget' => 'Allowed Customize Banner Target',
            'eachCreativeMustHaveDifferentLink' => 'Each Creative Must Have Different Link',
            'approvalRequired' => 'Approval Required',
            'needAcceptTerms' => 'Need Accept Terms',
            'allowedWiFi' => 'Allowed Wi Fi',
            'allowed3G' => 'Allowed3 G',
            'minimalAge' => 'Minimal Age',
            'rebrokerAllowed' => 'Rebroker Allowed',
            'discoveryAllowed' => 'Discovery Allowed',
            'emailingAllowed' => 'Emailing Allowed',
            'bannersURL' => 'Banners Url',
            'targetURL' => 'Target Url',
            'thumbnailURL' => 'Thumbnail Url',
            's2S' => 'S2 S',
            'iosbundleID' => 'Iosbundle ID',
            'smsallowed' => 'Smsallowed',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
