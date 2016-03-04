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
            if($country) {
                return $country[0]['updated_at'];
            }else{
                return null;
            }
        };
        $fields['countries'] = function ($model) {
            /*@var country Countryhasoffers */
            /*@var $model Hasoffers */
            $country = Countryhasoffers::getCountryCode($model->id);
            if($country){
                return $country[0]['code'];
            }else{
                return null;
            }

        };
        return $fields;
    }
}