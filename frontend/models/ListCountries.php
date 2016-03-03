<?php
/**
 * Created by PhpStorm.
 * User: HungChelsea
 * Date: 03-Mar-16
 * Time: 10:29 PM
 */

namespace frontend\models;


use yii\base\Model;

class ListCountries extends Model
{
    public $items = [];
    public function setAttribute($data) {
        //parent::setAttributes($data, false);
        if(!empty($data)) {
            $this->items = array();
            foreach($data as $it) {
                $countries = new Countries();
                $countries->setAttributes($it, false);
                array_push($this->items, $countries);
            }
        }
    }
}