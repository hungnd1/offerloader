<?php
/**
 * Created by PhpStorm.
 * User: HungChelsea
 * Date: 05-Mar-16
 * Time: 3:47 AM
 */

namespace frontend\models;


use yii\base\Model;

class Offers extends Model
{
    public $id = 0 ;
    public $network = '' ;
    public $offer_id = 0 ;
    public $offer_name = '' ;
    public $preview_url = '' ;
    public $incent = 0 ;
    public $tracking_url = '' ;
    public $payout = 0 ;
    public $description = '' ;
    public $countries = '' ;
    public $daily_cap = 0 ;
    public $currency = '' ;
    public $os = '' ;
    public $payout_type = '' ;
    public $created_at = '' ;
    public $updated_at = '' ;
}