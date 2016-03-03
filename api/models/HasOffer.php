<?php
/**
 * Created by PhpStorm.
 * User: HungChelsea
 * Date: 03-Mar-16
 * Time: 11:30 AM
 */

namespace api\models;


use common\models\Countryhasoffers;
use common\models\Hasoffers;

class HasOffer extends Hasoffers
{
    public function fields()
    {
        $fields = parent::fields();
        $fields['country'] = function ($model) {
            /*@var $model HasOffer */
            $country = Countryhasoffers::getCountryCode($model->id);
            $i = 0;
            $code = '';
            foreach ($country as $val) {
                $code .= $val['code'] . ',';
            }
            return trim($code,",");
        };
        $fields['date_add'] = function ($model) {
            /*@var $model HasOffer */
            $country = Countryhasoffers::getCountryCode($model->id);
            $i = 0;
            $code = '';
           return $country[0]['updated_at'];
        };
        return $fields;
    }
}