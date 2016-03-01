<?php
/**
 * Created by PhpStorm.
 * User: HungChelsea
 * Date: 01-Mar-16
 * Time: 12:01 AM
 */

namespace api\models;


use common\models\CreativeGlispas;

class Glispas extends \common\models\Glispas
{
    public function fields()
    {
        $fields =  parent::fields();
        $fields['link'] = function ($model){
            /* @var $creative CreativeGlispas */
            /* @var $model Glispas */
            $creative = CreativeGlispas::getDetail($model->glispaID);
            return $creative;
        };
        return $fields;
    }
}