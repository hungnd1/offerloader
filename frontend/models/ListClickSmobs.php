<?php
/**
 * Created by PhpStorm.
 * User: HungChelsea
 * Date: 02-Mar-16
 * Time: 9:31 PM
 */

namespace frontend\models;


use yii\base\Model;

class ListClickSmobs extends Model
{
    public $items = [];
    public function setAttribute($data) {
        //parent::setAttributes($data, false);
        if(!empty($data)) {
            $this->items = array();
            foreach($data as $it) {
                $glispas = new ClickSmobs();
                $glispas->setAttributes($it, false);
                array_push($this->items, $glispas);
            }
        }
    }
}