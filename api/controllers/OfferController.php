<?php
namespace api\controllers;
use common\models\Application;
use common\models\ArtOfClickModels;
use common\models\Clicksmobs;
use common\models\Countries;
use common\models\Glispas;
use common\models\Hasoffers;
use common\models\Matomies;
use common\models\OfferpayoutsClicksmobs;

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
            'get-list-artofclick',
            'get-list-has-offer',
            'test',
            'get-list-glispas',
            'get-detail-glispas',
            'get-country-name',
            'get-list-glispas-export',
            'get-list-matomies',
            'get-detail-matomies',
            'get-list-click-smobs',
            'get-detail-clicksmobs',
            'get-list-clicksmobs-export',
            'get-list-hasoffer-export'
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
    public function  actionGetListArtofclick(){
        $check  = ArtOfClickModels::getListArtOfClick();
        if(!empty($check)){
            return $check;
        }else{
            $this->setStatusCode(404);
            return ['message'=>"Page not found"];
        }

    }
    public function actionGetListGlispas(){
        $sort = $this->getParameter('sort', 'name');
        $status = Glispas::getListGlispas($sort);
        if(!empty($status)){
            return $status;
        }else{
            $this->setStatusCode(404);
            return ['message'=>"Page not found"];
        }

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

    public function actionGetListGlispasExport(){
        $id = $this->getParameter('id');
        $export = Glispas::getListGlispasExport($id);
        return $export;
    }

    public function actionGetListMatomies(){
        $sort = $this->getParameter('sort','id');
        $matomies = Matomies::getListMatomies($sort);
        if(!empty($matomies)){
            return $matomies;
        }else{
            $this->setStatusCode(404);
            return ['message'=>"Page not found"];
        }
    }

    public function actionGetDetailMatomies(){
        $id = $this->getParameter('id', 0);
        $matomies = Matomies::getDetailMatomies($id);
        if(!empty($matomies)){
            return $matomies;
        }else{
            $this->setStatusCode(404);
            return ['message' => "Not found value"];
        }
    }
    public function actionGetListClickSmobs(){
        $sort = $this->getParameter('sort','offer_id');
        $page = $this->getParameter('page',1);
        $rows_per_page = $this->getParameter('rows_per_page',50);
        $list = OfferpayoutsClicksmobs::getListClickSmobs($page,$rows_per_page,$sort);
        if(!empty($list)){
            return ['items'=>$list,'totalCount'=>OfferpayoutsClicksmobs::getCount()];
        }else{
            $this->setStatusCode(404);
            return ['message' => "Not found value"];
        }
    }
    public function actionGetDetailClicksmobs(){
        $id = $this->getParameter('id', 0);
        $payout = $this->getParameter('payout',0);
        $clickSmobs = OfferpayoutsClicksmobs::getDetailClickSmobs($id,$payout);
        if(!empty($clickSmobs)){
            return ['items'=>$clickSmobs,'general'=>OfferpayoutsClicksmobs::getDetailClick($id,$payout)];
        }else{
            $this->setStatusCode(404);
            return ['message' => "Not found value"];
        }

    }

    public function actionGetListClicksmobsExport(){
        $id = $this->getParameter('id');
        $export = OfferpayoutsClicksmobs::getClickSmobsExport($id);
        return $export;
    }
    public function actionGetListHasOffer(){
        $sort = $this->getParameter('sort','id');
        $check = Hasoffers::getListHasOffer($sort);
        if(!empty($check)){
            return $check;
        }else{
            $this->setStatusCode(404);
            return ['message' => "Not found value"];
        }
    }
    public function actionGetListHasofferExport(){
        $id = $this->getParameter('id');
        $export = Hasoffers::getListOfferExport($id);
        return $export;
    }
}