<?php
/**
 * Created by PhpStorm.
 * User: HungChelsea
 * Date: 03-Mar-16
 * Time: 2:27 AM
 */

namespace frontend\models;


use yii\base\Model;

class Hasoffer extends Model
{
    public $id;
    public $name;
    public $description;
    public $require_approval;
    public $require_terms_and_conditions;
    public $terms_and_conditions;
    public $preview_url;
    public $currency;
    public $default_payout;
    public $status;
    public $expiration_date;
    public $payout_type;
    public $percent_payout;
    public $payout_cap;
    public $country;
    public $date_add;
}