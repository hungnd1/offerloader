<?php
namespace frontend\controllers;

use frontend\helpers\ApiHelper;
use frontend\models\ListGlispas;
use frontend\models\ListHasOffer;
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
                'only' => ['logout', 'signup','art-of-click'],
                'rules' => [
                    [
                        'actions' => ['signup','art-of-click'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout','art-of-click'],
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
        $response_offer =   \frontend\helpers\ApiHelper::apiQuery(ApiHelper::API_OFFER_HASH,null,false);
        if( \frontend\helpers\ApiHelper::isResultSuccess($response_offer)){
            $listHasOffer_ = $response_offer['data']['items'];
            $listHasOffer = new ListHasOffer();
            $listHasOffer->setAttribute($listHasOffer_);
            $pagination = new \yii\data\Pagination(['totalCount' =>$response_offer['data']['_meta']['totalCount'], 'pageSize'=>$response_offer['data']['_meta']['perPage']]);
            return $this->render('ArtOfClick',['listHasOffer'=>$listHasOffer,'pagination'=>$pagination]);
        }


    }

  public function actionArtOfClick(){
      $response_offer =  ApiHelper::apiQuery(ApiHelper::API_OFFER_HASH,null,false);
      if( ApiHelper::isResultSuccess($response_offer)){
          $listHasOffer_ = $response_offer['data']['items'];
          $listHasOffer = new ListHasOffer();
          $listHasOffer->setAttribute($listHasOffer_);
          $pagination = new \yii\data\Pagination(['totalCount' =>$response_offer['data']['_meta']['totalCount'], 'pageSize'=>$response_offer['data']['_meta']['perPage']]);
          return $this->render('artofclick',['listHasOffer'=>$listHasOffer,'pagination'=>$pagination]);
      }
  }

    public function actionGlispas(){
        $response_glispas = ApiHelper::apiQuery(ApiHelper::API_GET_LIST_GLISPAS,null,false);
        if(ApiHelper::isResultSuccess($response_glispas)){
            $glispas = $response_glispas['data']['items'];
            $listGlispas = new ListGlispas();
            $listGlispas->setAttribute($glispas);
            $pagination = new \yii\data\Pagination(['totalCount' =>$response_glispas['data']['_meta']['totalCount'], 'pageSize'=>$response_glispas['data']['_meta']['perPage']]);
            return $this->render('glispas',['listGlispas'=>$listGlispas,'pagination'=>$pagination]);
        }
    }
    public function actionGetDetail(){
        $id = $this->getParameter('id', 0);
        $response_detail = ApiHelper::apiQuery([ApiHelper::API_GET_DETAIL_GLISPAS,'id'=>$id]);
        if(ApiHelper::isResultSuccess($response_detail)){
            $detail = $response_detail['data'];
            return Json::encode(['success'=>$response_detail['success'],'detail'=>$detail]);
        }
    }
    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function getParameter($param_name, $default = null) {
        return \Yii::$app->request->get($param_name, $default);
    }

}
