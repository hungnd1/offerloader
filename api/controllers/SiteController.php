<?php
namespace api\controllers;

use Yii;
use yii\base\Exception;
use yii\base\UserException;
use yii\web\HttpException;


/**
 * Site controller
 */
class SiteController extends ApiController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['except'] = ['error', 'index'];
        return $behaviors;
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [

        ];
    }
    public function actionError()
    {
//        return "ERROR";
        Yii::$app->response->statusCode = 404;

        $res = [
            'name' => "Not Found",
            'message' => "Path not found!",
            'code' => 0,
            'status' => 404,
            'type' => "yii\base\Exception"
        ];

        if (($exception = Yii::$app->getErrorHandler()->exception) === null) {
            return [];
        }

        if ($exception instanceof HttpException) {
            $code = $exception->statusCode;
            $res['status'] = $code;
        } else {
            $code = $exception->getCode();
        }
        $res['code'] = 0;

        if ($exception instanceof Exception) {
            $name = $exception->getName();
        } else {
            $name = isset($this->defaultName) ?: Yii::t('yii', 'Error');
        }
        if ($code) {
            $name .= " (#$code)";
        }

        $res['name'] = $name;

        if ($exception instanceof UserException) {
            $message = $exception->getMessage();
        } else {
            $message = isset($this->defaultMessage) ?: Yii::t('yii', 'An internal server error occurred.');
        }

        $res['message'] = $message;

        return $res;
    }

    public function actionIndex()
    {
        $res = ["message" => "This is API application"];
        return $res;
    }

}
