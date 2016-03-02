<?php
/**
 * Created by PhpStorm.
 * User: HungChelsea
 * Date: 02-Mar-16
 * Time: 9:29 PM
 */

namespace frontend\models;


use yii\base\Model;

class ClickSmobs extends Model
{
    public $offer_id;
    public $payout;
    public $countries;
    public $platforms;
    public $offerName;
    public $subHeadline;
    public $conversionMode;
    public $androidMinimalVersion;
    public $iosminimalVersion;
    public $windowsPhoneMinimalVersion;
    public $androidPreviewURL;
    public $otherPreviewURL;
    public $ipadPreviewURL;
    public $iphonePreviewURL;
    public $ipodPreviewURL;
}