<?php
/**
 * Created by PhpStorm.
 * User: HungChelsea
 * Date: 02-Mar-16
 * Time: 9:28 AM
 */

namespace frontend\models;


use yii\base\Model;

class ListMatomies extends Model
{
    public $items = [];

    public function setAttribute($data) {
        //parent::setAttributes($data, false);
        if(!empty($data)) {
            $this->items = array();
            foreach($data as $it) {
                $matomies = new Matomies();
                $matomies->setAttributes($it, false);
                array_push($this->items, $matomies);
            }
        }
    }
}