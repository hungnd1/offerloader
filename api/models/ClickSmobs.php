<?php
/**
 * Created by PhpStorm.
 * User: HungChelsea
 * Date: 02-Mar-16
 * Time: 10:14 PM
 */

namespace api\models;


use common\models\OfferpayoutsClicksmobs;

class ClickSmobs extends \common\models\OfferpayoutsClicksmobs
{
    public function fields()
    {
        $fields =  parent::fields();
        $fields['items'] = function ($model){
            /* @var $clickSmobs OfferpayoutsClicksmobs */
            /* @var $model OfferpayoutsClicksmobs */
            return OfferpayoutsClicksmobs::getDetailClickSmobs($model->offer_id,$model->payout);
        };
        return $fields;
    }
}