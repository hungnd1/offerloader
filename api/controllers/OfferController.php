<?php
namespace api\controllers;

use common\models\Application;
use common\models\ArtOfClickModels;
use common\models\Countries;
use common\models\Glispas;
use common\models\Hasoffers;
use common\models\KeyA4gs;
use common\models\KeyApxes;
use common\models\KeyArtofclicks;
use common\models\KeyCakes;
use common\models\KeyClickSmobs;
use common\models\KeyGlispas;
use common\models\KeyHasoffers;
use common\models\KeyMatomies;
use common\models\KeyOffersevens;
use common\models\Matomies;
use common\models\OfferpayoutsClicksmobs;
use common\models\Offers;
use common\models\Offersevens;

/**
 * Created by PhpStorm.
 * User: HungChelsea
 * Date: 10/9/2015
 * Time: 4:12 PM
 */
class OfferController extends \api\controllers\ApiController
{
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
            'del',
            'get-list-glispas',
            'get-detail-glispas',
            'get-country-name',
            'get-list-glispas-export',
            'get-list-matomies',
            'get-detail-matomies',
            'get-list-click-smobs',
            'get-detail-clicksmobs',
            'get-list-clicksmobs-export',
            'get-list-hasoffer-export',
            'get-detail-hasoffer',
            'get-detail-artofclick',
            'get-list-seven-export',
            'get-list-seven',
            'get-detail-seven',
            'get-key',
            'add-new',
            'update-art',
            'update-glispas',
            'update-click',
            'update-matomy',
            'update-seven',
            'get-all-country',
            'get-list-artofclick-export',
            'get-all-network',
            'get-list-offers',
            'update-keyags',
            'update-apxes',
            'update-cakes'
        ];

        return $behaviors;
    }

    protected function verbs()
    {
        return [
            'get-list-has-offer' => ['GET'],
            'test' => ['GET']
        ];
    }

    public function actionGetListArtofclick()
    {
        $countries = $this->getParameter('countries', '');
        $device = $this->getParameter('device', '');
        $sort = $this->getParameter('sort', '');
        $check = ArtOfClickModels::getListArtOfClick($sort, $countries, $device);
        if (!empty($check)) {
            return $check;
        } else {
            $this->setStatusCode(404);
            return ['message' => "Page not found"];
        }

    }

    public function actionGetListHasOffer()
    {
        $sort = $this->getParameter('sort', '');
        $countries = $this->getParameter('countries', '');
        $device = $this->getParameter('device', '');
        $check = Hasoffers::getListHasOffer($sort, $countries, $device);
        if (!empty($check)) {
            return $check;
        } else {
            $this->setStatusCode(404);
            return ['message' => "Not found value"];
        }
    }

    public function actionGetListGlispas()
    {
        $countries = $this->getParameter('countries', '');
        $device = $this->getParameter('device', '');
        $sort = $this->getParameter('sort', 'name');
        $status = Glispas::getListGlispas($sort, $countries, $device);
        if (!empty($status)) {
            return $status;
        } else {
            $this->setStatusCode(404);
            return ['message' => "Page not found"];
        }

    }

    public function actionGetDetailGlispas()
    {
        $id = $this->getParameter('id', 0);
        $glispas = Glispas::getDetailById($id);
        if (!empty($glispas)) {
            return $glispas;
        } else {
            $this->setStatusCode(404);
            return ['message' => "Not found value"];
        }

    }

    public function actionGetCountryName()
    {
        $code = $this->getParameter('code', 'VN');
        $country_name = Countries::getCountryName($code);
        if (!empty($country_name)) {
            return $country_name;
        } else {
            $this->setStatusCode(404);
            return ['message' => "Not found value"];
        }
    }

    public function actionGetListGlispasExport()
    {
        $id = $this->getParameter('id');
        $export = Glispas::getListGlispasExport($id);
        return $export;
    }

    public function actionGetListArtofclickExport()
    {
        $id = $this->getParameter('id');
        $export = ArtOfClickModels::getListArtofclickExport($id);
        return $export;
    }


    public function actionGetListMatomies()
    {
        $sort = $this->getParameter('sort', 'id');
        $matomies = Matomies::getListMatomies($sort);
        if (!empty($matomies)) {
            return $matomies;
        } else {
            $this->setStatusCode(404);
            return ['message' => "Page not found"];
        }
    }

    public function actionGetDetailMatomies()
    {
        $id = $this->getParameter('id', 0);
        $matomies = Matomies::getDetailMatomies($id);
        if (!empty($matomies)) {
            return $matomies;
        } else {
            $this->setStatusCode(404);
            return ['message' => "Not found value"];
        }
    }

    public function actionGetListClickSmobs()
    {
        $sort = $this->getParameter('sort', 'offer_id');
        $page = $this->getParameter('page', 1);
        $rows_per_page = $this->getParameter('rows_per_page', 50);
        $list = OfferpayoutsClicksmobs::getListClickSmobs($page, $rows_per_page, $sort);
        if (!empty($list)) {
            return ['items' => $list, 'totalCount' => OfferpayoutsClicksmobs::getCount()];
        } else {
            $this->setStatusCode(404);
            return ['message' => "Not found value"];
        }
    }

    public function actionGetDetailClicksmobs()
    {
        $id = $this->getParameter('id', 0);
        $payout = $this->getParameter('payout', 0);
        $clickSmobs = OfferpayoutsClicksmobs::getDetailClickSmobs($id, $payout);
        if (!empty($clickSmobs)) {
            return ['items' => $clickSmobs, 'general' => OfferpayoutsClicksmobs::getDetailClick($id, $payout)];
        } else {
            $this->setStatusCode(404);
            return ['message' => "Not found value"];
        }

    }

    public function actionGetListClicksmobsExport()
    {
        $id = $this->getParameter('id');
        $export = OfferpayoutsClicksmobs::getClickSmobsExport($id);
        return $export;
    }


    public function actionGetDetailArtofclick()
    {
        $id = $this->getParameter('id', 0);
        $art = ArtOfClickModels::getDetailArtOfClick($id);
        if (!empty($art)) {
            return $art;
        } else {
            $this->setStatusCode(404);
            return ['message' => "Not found value"];
        }
    }

    public function actionGetListSeven()
    {
        $sort = $this->getParameter('sort', 'ID');
        $countries = $this->getParameter('countries', '');
        $device = $this->getParameter('device', '');
        $status = Offersevens::getListSevens($sort, $countries, $device);
        if (!empty($status)) {
            return $status;
        } else {
            $this->setStatusCode(404);
            return ['message' => "Page not found"];
        }

    }

    public function actionGetDetailSeven()
    {
        $id = $this->getParameter('id', 0);
        $glispas = Offersevens::getDetailById($id);
        if (!empty($glispas)) {
            return $glispas;
        } else {
            $this->setStatusCode(404);
            return ['message' => "Not found value"];
        }
    }

    public function actionGetListSevenExport()
    {
        $id = $this->getParameter('id');
        $export = Offersevens::getListSevenExport($id);
        return $export;
    }

    public function actionGetKey()
    {
        $keyHasoffer = KeyHasoffers::getKey();
        $keyart = KeyArtofclicks::getkey();
        $keyclick = KeyClickSmobs::getkey();
        $keyglispa = KeyGlispas::getkey();
        $keyseven = KeyOffersevens::getkey();
        $keyA4gs = KeyA4gs::getkey();
        $keyApxes = KeyApxes::getkey();
        $keyCakes = KeyCakes::getkey();
        return ['hasoffer' => $keyHasoffer, 'art' => $keyart,
            'click' => $keyclick, 'glispa' => $keyglispa, 'seven' => $keyseven, 'matomies' => KeyMatomies::getkey(),
            'keyA4gs' => $keyA4gs, 'keyApxes' => $keyApxes
            , 'keyCakes' => $keyCakes
        ];
    }

    public function actionDel()
    {
        $id = $this->getParameter('id', 0);
        $status = KeyHasoffers::deleteAll(['id' => $id]);
        if ($status) {
            return ['success' => 'success'];
        } else {
            $this->setStatusCode(404);
            return ['message' => 'That bai'];
        }
    }

    public function actionAddNew()
    {
        $api = $this->getParameter('api', '');
        $network = $this->getParameter('network', '');
        $check = KeyHasoffers::addnew($api, $network);
        if ($check) {
            return ['success' => 'success'];
        } else {
            $this->setStatusCode(404);
            return ['message' => 'That bai'];
        }
    }

    public function actionUpdateArt()
    {
        $api = $this->getParameter('api', '');
        $id = $this->getParameter('id', 0);
        $check = KeyArtofclicks::updateArt($id, $api);
        if ($check) {
            return ['success' => 'success'];
        } else {
            $this->setStatusCode(404);
            return ['message' => 'That bai'];
        }
    }

    public function actionUpdateGlispas()
    {
        $api = $this->getParameter('api', '');
        $id = $this->getParameter('id', 0);
        $cd = $this->getParameter('cd', '');
        $check = KeyGlispas::updateGlispas($api, $id, $cd);
        if ($check) {
            return ['success' => 'success'];
        } else {
            $this->setStatusCode(404);
            return ['message' => 'That bai'];
        }
    }

    public function actionUpdateClick()
    {
        $userid = $this->getParameter('userid', '');
        $id = $this->getParameter('id', 0);
        $utoken = $this->getParameter('usertoken', '');
        $check = KeyClickSmobs::updateClick($userid, $id, $utoken);
        if ($check) {
            return ['success' => 'success'];
        } else {
            $this->setStatusCode(404);
            return ['message' => 'That bai'];
        }
    }


    public function actionUpdateMatomy()
    {
        $userid = $this->getParameter('key', '');
        $id = $this->getParameter('id', 0);
        $utoken = $this->getParameter('account', '');
        $check = KeyMatomies::updateMatomy($userid, $id, $utoken);
        if ($check) {
            return ['success' => 'success'];
        } else {
            $this->setStatusCode(404);
            return ['message' => 'That bai'];
        }
    }

    public function actionUpdateSeven()
    {
        $id = $this->getParameter('id', 0);
        $token = $this->getParameter('token', '');
        $check = KeyOffersevens::updateSeven($id, $token);
        if ($check) {
            return ['success' => 'success'];
        } else {
            $this->setStatusCode(404);
            return ['message' => 'That bai'];
        }
    }

    public function actionGetAllCountry()
    {
        return Countries::getAllCountry();
    }

    public function actionGetAllNetwork()
    {
        return Offers::getAllNetwork();
    }

    public function actionGetListOffers()
    {
        $countries = $this->getParameter('countries', '');
        $device = $this->getParameter('device', '');
        $network = $this->getParameter('network', '');
        $sort = $this->getParameter('sort', '');
        $offer = Offers::getListOffers($countries, $device, $network, $sort);
        return $offer;
    }

    public function actionGetListHasofferExport()
    {
        $id = $this->getParameter('id');
        $all = $this->getParameter('all');
        $country = $this->getParameter('country', '');
        $device = $this->getParameter('device', '');
        $network = $this->getParameter('network', '');
        $sort = $this->getParameter('payout', '');
        $export = Offers::getListOfferExport($id, $all, $country, $device, $network, $sort);
        return $export;
    }

    public function actionGetDetailHasoffer()
    {
        $id = $this->getParameter('id', 0);
        $hasoffer = Offers::getDetailOffers($id);
        if (!empty($hasoffer)) {
            return $hasoffer;
        } else {
            $this->setStatusCode(404);
            return ['message' => "Not found value"];
        }
    }

    public function actionUpdateKeyags()
    {
        $api = $this->getParameter('apiKey', '');
        $id = $this->getParameter('id', 0);
        $affi = $this->getParameter('affi',0);
        $zone = $this->getParameter('zone',0);
        $check = KeyA4gs::updateKeya4gs($id, $api,$affi,$zone);
        if ($check) {
            return ['success' => 'success'];
        } else {
            $this->setStatusCode(404);
            return ['message' => 'That bai'];
        }
    }
    public function actionUpdateApxes(){
        $id = $this->getParameter('id',0);
        $username = $this->getParameter('username','');
        $password = $this->getParameter('password','');
        $deviceType = $this->getParameter('devicetype');
        $trafficsourceid = $this->getParameter('trafficsourceid',0);
        $check = KeyApxes::updateApxes($id,$username,$password,$deviceType,$trafficsourceid);
        if($check){
            return ['success' => 'success'];
        } else {
            $this->setStatusCode(404);
            return ['message' => 'That bai'];
        }
    }

    public function actionUpdateCakes(){
        $id = $this->getParameter('id',0);
        $apikey = $this->getParameter('apikey','');
        $affiliateid = $this->getParameter('affiliateid','');
        $check = KeyCakes::updateCakes($id,$apikey,$affiliateid);
        if($check){
            return ['success' => 'success'];
        } else {
            $this->setStatusCode(404);
            return ['message' => 'That bai'];
        }
    }

}