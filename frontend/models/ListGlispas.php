<?php
/**
 * Created by PhpStorm.
 * User: HungChelsea
 * Date: 29-Feb-16
 * Time: 3:25 PM
 */

namespace frontend\models;


use yii\base\Model;

class ListGlispas extends Model
{
    public $items = [];
    public function setAttribute($data) {
        //parent::setAttributes($data, false);
        if(!empty($data)) {
            $this->items = array();
            foreach($data as $it) {
                $glispas = new Glispas();
                $glispas->setAttributes($it, false);
                array_push($this->items, $glispas);
            }
        }
    }
}