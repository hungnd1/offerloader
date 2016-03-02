<?php
namespace frontend\controllers;

use arturoliveira\ExcelView;
use frontend\helpers\ApiHelper;
use frontend\models\ListArt;
use frontend\models\ListClickSmobs;
use frontend\models\ListGlispas;
use frontend\models\ListHasOffer;
use frontend\models\ListMatomies;
use Yii;
use yii\helpers\Json;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup', 'art-of-click'],
                'rules' => [
                    [
                        'actions' => ['signup', 'art-of-click'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'art-of-click'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $response_offer = \frontend\helpers\ApiHelper::apiQuery(ApiHelper::API_OFFER_HASH, null, false);
        if (\frontend\helpers\ApiHelper::isResultSuccess($response_offer)) {
            $listHasOffer_ = $response_offer['data']['items'];
            $listHasOffer = new ListArt();
            $listHasOffer->setAttribute($listHasOffer_);
            $pagination = new \yii\data\Pagination(['totalCount' => $response_offer['data']['_meta']['totalCount'], 'pageSize' => $response_offer['data']['_meta']['perPage']]);
            return $this->render('ArtOfClick', ['listHasOffer' => $listHasOffer, 'pagination' => $pagination]);
        } else {
            return $this->render('error');
        }
    }

    public function actionArtOfClick()
    {
        $page = \Yii::$app->request->get('page', 1);
        $per_page = \Yii::$app->request->get('per_page', 20);
        $response_offer = ApiHelper::apiQuery([ApiHelper::API_OFFER_HASH, 'page' => $page, '$per_page' => $per_page], null, false);
        if (ApiHelper::isResultSuccess($response_offer)) {
            $listHasOffer_ = $response_offer['data']['items'];
            $listHasOffer = new ListArt();
            $listHasOffer->setAttribute($listHasOffer_);
            $pagination = new \yii\data\Pagination(['totalCount' => $response_offer['data']['_meta']['totalCount'], 'pageSize' => $response_offer['data']['_meta']['perPage']]);
            return $this->render('artofclick', ['listHasOffer' => $listHasOffer, 'pagination' => $pagination]);
        } else {
            return $this->render('error');
        }
    }

    public function actionGlispas()
    {
        $page = \Yii::$app->request->get('page', 1);
        $per_page = \Yii::$app->request->get('per_page', 20);
        $sort = Yii::$app->request->get('id', 'name');

        $response_glispas = ApiHelper::apiQuery([ApiHelper::API_GET_LIST_GLISPAS, 'page' => $page, 'per_page' => $per_page, 'sort' => $sort], null, false);
        if (ApiHelper::isResultSuccess($response_glispas)) {
            $glispas = $response_glispas['data']['items'];
            $listGlispas = new ListGlispas();
            $listGlispas->setAttribute($glispas);
            $pagination = new \yii\data\Pagination(['totalCount' => $response_glispas['data']['_meta']['totalCount'], 'pageSize' => $response_glispas['data']['_meta']['perPage']]);
            return $this->render('glispas', ['listGlispas' => $listGlispas, 'pagination' => $pagination]);
        } else {
            return $this->render('error');
        }
    }

    public function actionGetDetail()
    {
        $id = $this->getParameter('id', 0);
        $response_detail = ApiHelper::apiQuery([ApiHelper::API_GET_DETAIL_GLISPAS, 'id' => $id]);
        if (ApiHelper::isResultSuccess($response_detail)) {
            $detail = $response_detail['data'];
            $link = $response_detail['data']['link'];
            return Json::encode(['success' => $response_detail['success'], 'detail' => $detail]);
        } else {
            return $this->render('error');
        }
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function getParameter($param_name, $default = null)
    {
        return \Yii::$app->request->get($param_name, $default);
    }

    public function actionGetGlispasExport()
    {
        $id = $this->getParameter('id');
        $response_export = ApiHelper::apiQuery([ApiHelper::API_GET_LIST_GLISPAS_EXPORT, 'id' => $id]);
        if (ApiHelper::isResultSuccess($response_export)) {
            $detail = $response_export['data'];
            $filename = "website_data_" . date('Ymd') . ".xls";

            header("Content-Disposition: attachment; filename=\"$filename\"");
            header("Content-Type: application/vnd.ms-excel");
            header("Pragma: no-cache");
            header("Expires: 0");
            $de = $detail;
            $flag = false;
            $out = fopen("php://output", 'w');
            foreach ($de as $data) {
                fputcsv($out, $data, "\t");
            }
            fclose($out);
//            $this->redirect("http://localhost:8080/offerloader/frontend/web/?r=site%2Fget-glispas-export&id=88007");
//            return Json::encode(['success' => $response_export['success'], 'detail' => $detail]);
        } else {
            return $this->render('error');
        }
    }

    public function actionMatomies()
    {
        $page = \Yii::$app->request->get('page', 1);
        $per_page = \Yii::$app->request->get('per_page', 20);
        $response_matomies = ApiHelper::apiQuery([ApiHelper::API_GET_LIST_MATOMIES, 'page' => $page, 'per_page' => $per_page]);
        if (ApiHelper::isResultSuccess($response_matomies)) {
            $matomies = $response_matomies['data']['items'];
            $listMatomies = new ListMatomies();
            $listMatomies->setAttribute($matomies);
            $pagination = new \yii\data\Pagination(['totalCount' => $response_matomies['data']['_meta']['totalCount'], 'pageSize' => $response_matomies['data']['_meta']['perPage']]);
            return $this->render('matomies', ['listMatomies' => $listMatomies, 'pagination' => $pagination]);
        } else {
            return $this->render('error');
        }
    }

    public function actionGetDetailMatomies()
    {
        $id = $this->getParameter('id', 0);
        $response_detail = ApiHelper::apiQuery([ApiHelper::API_GET_DETAIL_MATOMIES, 'id' => $id]);
        if (ApiHelper::isResultSuccess($response_detail)) {
            $detail = $response_detail['data'];
            return Json::encode(['success' => $response_detail['success'], 'detail' => $detail]);
        } else {
            return $this->render('error');
        }
    }

    public function actionClicksmobs(){

        $page = \Yii::$app->request->get('page', 1);
        $per_page = \Yii::$app->request->get('per_page', 50);
        $response_click = ApiHelper::apiQuery([ApiHelper::API_GET_LIST_CLICK_SMOBS, 'page' => $page, 'rows_per_page' => $per_page]);
        if (ApiHelper::isResultSuccess($response_click)) {
            $clicksmobs = $response_click['data']['items'];
            $listClick = new ListClickSmobs();
            $listClick->setAttribute($clicksmobs);
            $pagination = new \yii\data\Pagination(['totalCount' => $response_click['data']['totalCount'],'pageSize'=>50]);
            return $this->render('clicksmobs', ['listClick' => $listClick, 'pagination' => $pagination]);
        } else {
            return $this->render('error');
        }
    }

    public function actionGetDetailClicksmobs()
    {
        $id = $this->getParameter('id', 0);
        $payout = $this->getParameter('payout',0);
        $response_detail = ApiHelper::apiQuery([ApiHelper::API_GET_DETAIL_CLICL_SMOBS, 'id' => $id,'payout'=>$payout]);
        if (ApiHelper::isResultSuccess($response_detail)) {
            $detail = $response_detail['data']['items'];
            $link = $response_detail['data']['general'];
            return Json::encode(['success' => $response_detail['success'], 'detail' => $detail,'link'=>$link]);
        } else {
            return $this->render('error');
        }
    }

    public function actionGetClickExport()
    {
        $id = $this->getParameter('id');
        $response_export = ApiHelper::apiQuery([ApiHelper::API_GET_LIST_CLICK_EXPORT, 'id' => $id]);
        if (ApiHelper::isResultSuccess($response_export)) {
            $detail = $response_export['data'];
            $filename = "website_data_" . date('Ymd') . ".xls";

            header("Content-Disposition: attachment; filename=\"$filename\"");
            header("Content-Type: application/vnd.ms-excel");
            header("Pragma: no-cache");
            header("Expires: 0");
            $de = $detail;
            $flag = false;
            $out = fopen("php://output", 'w');
            foreach ($de as $data) {
                fputcsv($out, $data, "\t");
            }
            fclose($out);
//            $this->redirect("http://localhost:8080/offerloader/frontend/web/?r=site%2Fget-glispas-export&id=88007");
//            return Json::encode(['success' => $response_export['success'], 'detail' => $detail]);
        } else {
            return $this->render('error');
        }
    }
}
