<?php
/**
 * Created by PhpStorm.
 * User: thuc
 * Date: 10/17/14
 * Time: 2:47 PM
 */

namespace frontend\helpers;

use Yii;
use yii\base\InvalidParamException;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\ServerErrorHttpException;
use yii\web\UrlManager;

class ApiHelper
{

    /********************************************************
     * API
     */

    const API_OFFER_HASH = "offer/get-list-has-offer";




    /**
     * @param $apiResults - array (json decoded from api result)
     * @return bool
     */
    public static function isResultSuccess($apiResults) {
        /* @var $urlManager UrlManager */
        if($apiResults['success'] == false){
            header(\frontend\helpers\CConstant::host_name."site/index.php");
        }else {
            return ($apiResults != null) && ($apiResults['success'] == true);
        }
    }

    public static function getResultMessage($apiResults) {
        $message = "";
        if (isset($apiResults['message'])) {
            $message = $apiResults['message'];
        }
        else if (isset($apiResults['data']) && isset($apiResults['data']['message'])) {
            $message = $apiResults['data']['message'];
        }

        return $message;
    }

    /**
     * @return bool
     * @throws ServerErrorHttpException
     */
    public static function logout() {
        Yii::error("logout");
        UserHelper::logout();
        $res = ApiHelper::apiQuery([ApiHelper::API_LOGOUT], null, false);
        return true;
    }


    public static function apiQuery($params, $postParams = null, $throwExceptionOnFailure = false) {
        /* @var $urlManager UrlManager */
        $urlManager = Yii::$app->urlManagerApi;
//        var_dump(Yii::$app);exit;
      $url = $urlManager->createAbsoluteUrl($params);
//        var_dump($url);exit;
        //$url= 'http://192.168.1.97:8088/public/hasoffers/listAll?function=artofclick';
        Yii::info("API Url: " . $url);
        Yii::info("Post param: ");
        Yii::info($postParams);

        $ch = new MyCurl();
//        $ch->headers['VIVAS-CHANNEL'] = 6;
        $ch->headers['Accept'] = 'application/json';




        //msisdn
        $results = null;
        if ($postParams === null) {
            $response = $ch->get($url);
        }
        else {
            $response = $ch->post($url, $postParams);
        }
        if(!empty($response)) {
            try {
                $results = Json::decode($response->body);
            }
            catch (InvalidParamException $ex) {
                return['success'=>false,'data'=> ['message' => 'Xảy ra lỗi hệ thống, vui lòng thử lại sau: ']];
                //throw new ServerErrorHttpException("Xảy ra lỗi hệ thống, vui lòng thử lại sau: ");
            }
            if ($throwExceptionOnFailure && !ApiHelper::isResultSuccess($results)) {
                return['success'=>false,'data'=> ['message' => 'Xảy ra lỗi khi gọi API']];
                //throw new ServerErrorHttpException("Xảy ra lỗi khi gọi API: ");
            }
        }
        else {
            return['success'=>false,'data'=> ['message' => 'Xảy ra lỗi hệ thống, vui lòng thử lại sau: ']];
            //throw new ServerErrorHttpException("Xảy ra lỗi hệ thống, vui lòng thử lại sau");
        }

        return $results;
    }

    /**
     * @param int $default
     * @return int
     */
    public static function getChannel($default = ApiHelper::CHANNEL_TYPE_WAP )
    {
        if(isset(Yii::$app->params['channel'])){
            return Yii::$app->params['channel'];
        }else{
            self::setChannel($default);
            return $default;
        }
    }

    /**
     * @param $channel
     */
    public static function setChannel($channel)
    {
        Yii::$app->params['channel'] = $channel;
    }
}