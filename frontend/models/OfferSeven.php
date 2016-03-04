<?php
/**
 * Created by PhpStorm.
 * User: HungChelsea
 * Date: 03-Mar-16
 * Time: 5:27 AM
 */

namespace frontend\models;


use yii\base\Model;

class OfferSeven extends Model
{
    public $ID = 0;
    public $APP_ID;
    public $Name;
    public $Original_name;
    public $Description;
    public $Preview_Url;
    public $Tracking_url;
    public $Type;
    public $Currency;
    public $Tags;
    public $Platforms;
    public $Countries;
    public $Payout;
    public $active;
    public $Expiration_date;

}