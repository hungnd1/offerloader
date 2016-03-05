<?php
/**
 * Created by PhpStorm.
 * User: HungChelsea
 * Date: 05-Mar-16
 * Time: 10:33 AM
 */

namespace api\models;


class Offers extends \common\models\Offers
{
    public function fields()
    {
        $fields = parent::fields();
        $fields['countries'] = function ($model) {
            /* @var $model Offers */
            if (strpos($model->countries, ' ') !== false) {
                $countries = explode(' ', $model->countries);
                if (count($countries) >= 8) {
                    return count($countries) . " Countries";
                } else {
                    return $model->countries;
                }
            }else if (strpos($model->countries, ',') !== false){
                $countries = explode(',', $model->countries);
                if (count($countries) >= 8) {
                    return count($countries) . " Countries";
                } else {
                    return $model->countries;
                }
            }else{
                return $model->countries;
            }
        };
        return $fields;
    }
}