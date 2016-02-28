<?php
namespace api\helpers\authentications;

use common\helpers\VNPHelper;
use common\models\ServiceProvider;
use common\models\Subscriber;
use common\models\User;
use yii\web\BadRequestHttpException;

/**
 * Created by PhpStorm.
 * User: linhpv
 * Date: 4/23/15
 * Time: 2:39 PM
 */
class IdentifyMsisdn extends \yii\filters\auth\AuthMethod
{

    /**
     * Authenticates the current user.
     * @param \yii\web\Request $request
     * @param \yii\web\Response $response
     * @return \yii\web\IdentityInterface the authenticated user identity. If authentication information is not provided, null will be returned.
     * @throws \yii\web\UnauthorizedHttpException if authentication information is provided but is invalid.
     */
    public function authenticate($user, $request, $response)
    {
        \Yii::info("tét");
        // nhan dien/dang nhap
        $msisdn = VNPHelper::getMsisdn(false, true);

        $controller = \Yii::$app->requestedAction->controller;
        /**
         * @var ServiceProvider $sp
         */
        $sp = (isset($controller->serviceProvider)) ? $controller->serviceProvider : null;
        \Yii::info($sp);
        if ($msisdn && $sp) {
            $identity = Subscriber::findByMsisdn($msisdn, $sp->id);
            if ($identity === null) {
                $this->handleFailure($response);
            }
            $user->login($identity);
            return $identity;
        }
        return null;
    }
}