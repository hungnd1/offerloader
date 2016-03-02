<?php
/**
 * Created by PhpStorm.
 * User: HungChelsea
 * Date: 03-Mar-16
 * Time: 5:29 AM
 */

namespace frontend\models;


use yii\base\Model;

class ListOfferSeven extends  Model
{
    public $items = [];
    public function setAttribute($data) {
        //parent::setAttributes($data, false);
        if(!empty($data)) {
            $this->items = array();
            foreach($data as $it) {
                $glispas = new OfferSeven();
                $glispas->setAttributes($it, false);
                array_push($this->items, $glispas);
            }
        }
    }
}