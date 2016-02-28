<?php
namespace api\controllers;
use common\models\Application;
use common\models\ArtOfClickModels;

/**
 * Created by PhpStorm.
 * User: HungChelsea
 * Date: 10/9/2015
 * Time: 4:12 PM
 */


class OfferController extends \api\controllers\ApiController{
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['except'] = [
            //'list-comment',
            'get-list-has-offer',
            'test'

        ];

        return $behaviors;
    }
    protected function verbs()
    {
        return [
            'get-list-has-offer'=>['GET'],
            'test'=>['GET']
        ];
    }
    public function  actionGetListHasOffer(){
        return ArtOfClickModels::getListHasOffer();
    }
}