<?php
/**
 * Created by PhpStorm.
 * User: HungChelsea
 * Date: 03-Mar-16
 * Time: 2:28 AM
 */

namespace frontend\models;


use yii\base\Model;

class ListHasOffer extends Model
{
    public $items = [];
    public function setAttribute($data) {
        //parent::setAttributes($data, false);
        if(!empty($data)) {
            $this->items = array();
            foreach($data as $it) {
                $hasoffer = new Hasoffer();
                $hasoffer->setAttributes($it, false);
                array_push($this->items, $hasoffer);
            }
        }
    }
}