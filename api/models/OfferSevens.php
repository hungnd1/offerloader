<?php
/**
 * Created by PhpStorm.
 * User: HungChelsea
 * Date: 03-Mar-16
 * Time: 5:22 AM
 */

namespace api\models;


use common\models\RestrictionOffersevens;

class OfferSevens extends \common\models\Offersevens
{
    public function fields()
    {
        $fields =  parent::fields();
        $fields['link'] = function ($model){
            /* @var $res RestrictionOffersevens */
            /* @var $model OfferSevens */
            $res = RestrictionOffersevens::getDetail($model->ID);
            return $res;
        };
        return $fields;
    }
}