<?php
/**
 * Created by PhpStorm.
 * User: HungChelsea
 * Date: 28-Feb-16
 * Time: 5:46 PM
 */
namespace frontend\models;
use yii\base\Model;

class HasOffer extends Model{
    public $id = 0;
    public $name = "";
    public $incent = 0;
    public $previewUrl = "";
    public $description = "";
    public $payoutType = "";
    public $payout = 0;
    public $currency = "";
    public $storeId = "";
    public $noticePeriod = "";
    public $creatives = "";
    public $browser = "";
    public $device = "";
    public $os = "";
    public $osVersionMinimum = "";
    public $countries = "";
    public $trackingUrl = "";
    public $approved = "";
    public $downloadType = "";
    public $monthlyCap = "";
    public $dailyCap = "";
    public $dailyCapsRemaining = "";
    public $created_at = "";
    public $updated_at = "";


}