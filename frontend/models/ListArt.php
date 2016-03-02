<?php
/**
 * Created by PhpStorm.
 * User: HungChelsea
 * Date: 28-Feb-16
 * Time: 5:43 PM
 */
namespace frontend\models;
use yii\base\Model;
class ListArt extends  Model{
    public $items = [];
    public function setAttribute($data) {
        //parent::setAttributes($data, false);
        if(!empty($data)) {
            $this->items = array();
            foreach($data as $it) {
                $hasoffer = new Art();
                $hasoffer->setAttributes($it, false);
                array_push($this->items, $hasoffer);
            }
        }
    }
}