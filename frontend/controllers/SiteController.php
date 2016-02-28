<?php
namespace frontend\controllers;

use frontend\helpers\ApiHelper;
use frontend\models\ListHasOffer;
use Yii;
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
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
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
            return $this->render('index',['listHasOffer'=>$listHasOffer,'pagination'=>$pagination]);
        }

    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */

}
