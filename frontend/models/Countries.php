<?php
/**
 * Created by PhpStorm.
 * User: HungChelsea
 * Date: 03-Mar-16
 * Time: 10:28 PM
 */

namespace frontend\models;


use yii\base\Model;

class Countries extends Model
{
    public $id;
    public $code;
    public $name;
    public $regions;
    public $created_at;
    public $updated_at;
}