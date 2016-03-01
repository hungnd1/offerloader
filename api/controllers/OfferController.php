<?php
namespace api\controllers;
use common\models\Application;
use common\models\ArtOfClickModels;
use common\models\Countries;
use common\models\Glispas;

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
            'test',
            'get-list-glispas',
            'get-detail-glispas',
            'get-country-name'
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
    public function actionGetListGlispas(){
        return Glispas::getListGlispas();
    }
    public function actionGetDetailGlispas(){
        $id = $this->getParameter('id', 0);
        $glispas = Glispas::getDetailById($id);
        if(!empty($glispas)){
            return $glispas;
        }else{
            $this->setStatusCode(404);
            return ['message' => "Not found value"];
        }

    }
    public function actionGetCountryName(){
        $code = $this->getParameter('code','VN');
        $country_name = Countries::getCountryName($code);
        if(!empty($country_name)){
            return $country_name;
        }else{
            $this->setStatusCode(404);
            return ['message' => "Not found value"];
        }
    }
}