<?php
/**
 * Created by PhpStorm.
 * User: HungChelsea
 * Date: 28-Feb-16
 * Time: 4:40 PM
 */

use yii\helpers\Url;
class BaseController extends \frontend\controllers\SiteController{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => \yii\filters\VerbFilter::className(),
                'actions' => [
                    'logout' => ['post','get'],
                    'login' => ['post','get'],
                ],
            ],
        ];
    }

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

    public function redirect($url, $status = true, $statusCode = 302)
    {
        if ($status) {
            $url = \app\helpers\CUtils::createAbsoluteUrl($url);
            return Yii::$app->getResponse()->redirect(Url::to($url), $statusCode);
        } else {
            return Yii::$app->getResponse()->redirect(Url::to($url), $statusCode);
        }

    }
    //http://192.168.1.97:8088/public/hasoffers/listAll?function=artofclick
    public function actionIndex()
    {
        $index =  \frontend\helpers\ApiHelper::apiQuery(['http://192.168.1.97:8088/public/hasoffers/listAll?function=artofclick'],null,false);
        if( \frontend\helpers\ApiHelper::isResultSuccess($index)){
            var_dump($index);exit;
        }
        return parent::actionIndex(); // TODO: Change the autogenerated stub
    }
    public function init()
    {
        $index =   \frontend\helpers\ApiHelper::apiQuery(['http://192.168.1.97:8088/public/hasoffers/listAll?function=artofclick'],null,false);
        if( \frontend\helpers\ApiHelper::isResultSuccess($index)){
            var_dump($index);exit;
        }
    }

}