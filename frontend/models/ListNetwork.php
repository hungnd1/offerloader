<?php
/**
 * Created by PhpStorm.
 * User: HungChelsea
 * Date: 05-Mar-16
 * Time: 3:28 AM
 */

namespace frontend\models;


use yii\base\Model;

class ListNetwork extends Model
{
    public $items = [];
    public function setAttribute($data) {
        //parent::setAttributes($data, false);
        if(!empty($data)) {
            $this->items = array();
            foreach($data as $it) {
                $network = new network();
                $network->setAttributes($it, false);
                array_push($this->items, $network);
            }
        }
    }
}