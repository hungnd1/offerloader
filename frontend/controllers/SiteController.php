<?php
namespace frontend\controllers;

use arturoliveira\ExcelView;
use common\models\Hasoffers;
use frontend\helpers\ApiHelper;
use frontend\models\ListArt;
use frontend\models\ListClickSmobs;
use frontend\models\ListGlispas;
use frontend\models\ListHasOffer;
use frontend\models\ListKeyHasOffer;
use frontend\models\ListMatomies;
use frontend\models\ListOfferSeven;
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
        $sort = $this->getParameter('id', 'id');
        $page = \Yii::$app->request->get('page', 1);
        $per_page = \Yii::$app->request->get('per_page', 20);
        $response_offer = ApiHelper::apiQuery([ApiHelper::API_GET_LIST_ARTOFCLICK, 'page' => $page, 'per_page' => $per_page, 'sort' => $sort], null, false);
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

    public function getParameterPost($param_name, $default = null)
    {
        return \Yii::$app->request->post($param_name, $default);
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
        } else {
            return $this->render('error');
        }
    }

    public function actionMatomies()
    {
        $sort = $this->getParameter('id', 'id');
        $page = \Yii::$app->request->get('page', 1);
        $per_page = \Yii::$app->request->get('per_page', 20);
        $response_matomies = ApiHelper::apiQuery([ApiHelper::API_GET_LIST_MATOMIES, 'page' => $page, 'per_page' => $per_page, 'sort' => $sort]);
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

    public function actionClicksmobs()
    {
        $sort = $this->getParameter('id');
        $page = \Yii::$app->request->get('page', 1);
        $per_page = \Yii::$app->request->get('per_page', 50);
        $response_click = ApiHelper::apiQuery([ApiHelper::API_GET_LIST_CLICK_SMOBS, 'page' => $page, 'rows_per_page' => $per_page, 'sort' => $sort]);
        if (ApiHelper::isResultSuccess($response_click)) {
            $clicksmobs = $response_click['data']['items'];
            $listClick = new ListClickSmobs();
            $listClick->setAttribute($clicksmobs);
            $pagination = new \yii\data\Pagination(['totalCount' => $response_click['data']['totalCount'], 'pageSize' => 50]);
            return $this->render('clicksmobs', ['listClick' => $listClick, 'pagination' => $pagination]);
        } else {
            return $this->render('error');
        }
    }

    public function actionGetDetailClicksmobs()
    {
        $id = $this->getParameter('id', 0);
        $payout = $this->getParameter('payout', 0);
        $response_detail = ApiHelper::apiQuery([ApiHelper::API_GET_DETAIL_CLICL_SMOBS, 'id' => $id, 'payout' => $payout]);
        if (ApiHelper::isResultSuccess($response_detail)) {
            $detail = $response_detail['data']['items'];
            $link = $response_detail['data']['general'];
            return Json::encode(['success' => $response_detail['success'], 'detail' => $detail, 'link' => $link]);
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

    public function actionGetListHasOffer()
    {
        $sort = $this->getParameter('id');
        $page = \Yii::$app->request->get('page', 1);
        $per_page = \Yii::$app->request->get('per_page', 50);
        $response_offer = ApiHelper::apiQuery([ApiHelper::API_OFFER_HASH, 'sort' => $sort, 'page' => $page, 'rows_per_page' => $per_page]);
        if (ApiHelper::isResultSuccess($response_offer)) {
            $detail = $response_offer['data']['items'];
            $listOffer = new ListHasOffer();
            $listOffer->setAttribute($detail);
            $pagination = new \yii\data\Pagination(['totalCount' => $response_offer['data']['_meta']['totalCount'], 'pageSize' => $response_offer['data']['_meta']['perPage']]);
            return $this->render('hasoffer', ['listOffer' => $listOffer, 'pagination' => $pagination]);
        }
    }

    public function actionGetHasofferExport()
    {
        $id = $this->getParameter('id');
        $result = Hasoffers::getListOfferExport($id);
        $objPHPExcel = new \PHPExcel();
        $objPHPExcel->getProperties()->setCreator("Runnable.com");
        $objPHPExcel->getProperties()->setLastModifiedBy("Runnable.com");
        $objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
        $objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
        $objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX,generated using PHP classes.");
        $objPHPExcel->setActiveSheetIndex(0);
        $rowCount = 1;
        $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, 'ID');
        $objPHPExcel->getActiveSheet()->getStyle('A1:K1')->applyFromArray(
            array(
                'fill' => array(
                    'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => '00BCD4')
                )
            )

        );
        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, 'Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, 'Description');
        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, 'Preview_url');
        $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, 'Currency');
        $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, 'Default_payout');
        $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, 'Status');
        $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, 'Expiration_date');
        $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, 'Payout_type');
        $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, 'url');
        $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, 'click_url');
        foreach ($result as $row) {
            $rowCount++;
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $row['id']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $row['name']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $row['description']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $row['preview_url']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $row['currency']);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $row['default_payout']);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $row['status']);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $row['expiration_date']);
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $row['payout_type']);
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $row['url']);
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $row['click_url']);

        }
        $objPHPExcel->getActiveSheet()->setTitle('Simple');

//        return $this->redirect('index.xlsx');
        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save('download.xlsx');
        return $this->redirect("download.xlsx");
    }

    public function actionGetDetailHasoffer()
    {
        $id = $this->getParameter('id', 0);
        $response_detail = ApiHelper::apiQuery([ApiHelper::API_GET_DETAIL_HASOFFER, 'id' => $id]);
        if (ApiHelper::isResultSuccess($response_detail)) {
            $detail = $response_detail['data'];
            return Json::encode(['success' => $response_detail['success'], 'detail' => $detail]);
        } else {
            return $this->render('error');
        }
    }

    public function actionGetDetailArtofclick()
    {
        $id = $this->getParameter('id', 0);
        $response_detail = ApiHelper::apiQuery([ApiHelper::API_GET_DETAIL_ART, 'id' => $id]);
        if (ApiHelper::isResultSuccess($response_detail)) {
            $detail = $response_detail['data'];
            return Json::encode(['success' => $response_detail['success'], 'detail' => $detail]);
        } else {
            return $this->render('error');
        }
    }

    public function actionOfferSeven()
    {
        $page = \Yii::$app->request->get('page', 1);
        $per_page = \Yii::$app->request->get('per_page', 20);
        $sort = Yii::$app->request->get('id', 'ID');

        $response_seven = ApiHelper::apiQuery([ApiHelper::API_GET_LIST_SEVEN, 'page' => $page, 'per_page' => $per_page, 'sort' => $sort], null, false);
        if (ApiHelper::isResultSuccess($response_seven)) {
            $seven = $response_seven['data']['items'];
            $listSeven = new ListOfferSeven();
            $listSeven->setAttribute($seven);
            $pagination = new \yii\data\Pagination(['totalCount' => $response_seven['data']['_meta']['totalCount'], 'pageSize' => $response_seven['data']['_meta']['perPage']]);
            return $this->render('offerseven', ['listSeven' => $listSeven, 'pagination' => $pagination]);
        } else {
            return $this->render('error');
        }
    }

    public function actionGetDetailOfferseven()
    {
        $id = $this->getParameter('id', 0);
        $response_detail = ApiHelper::apiQuery([ApiHelper::API_GET_DETAIL_SEVEN, 'id' => $id]);
        if (ApiHelper::isResultSuccess($response_detail)) {
            $detail = $response_detail['data'];
            $link = $response_detail['data']['link'];
            return Json::encode(['success' => $response_detail['success'], 'detail' => $detail]);
        } else {
            return $this->render('error');
        }
    }

    public function actionGetSevenExport()
    {
        $id = $this->getParameter('id');
        $response_export = ApiHelper::apiQuery([ApiHelper::API_GET_LIST_SEVEN_EXPORT, 'id' => $id]);
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
        } else {
            return $this->render('error');
        }
    }

    public function actionSetting()
    {
        $response_key = ApiHelper::apiQuery([ApiHelper::API_GET_KEY]);
        if (ApiHelper::isResultSuccess($response_key)) {
            $hasoffer = $response_key['data']['hasoffer'];
            $listhas = new ListKeyHasOffer();
            $listhas->setAttribute($hasoffer);
            $art = $response_key['data']['art'];
            $click = $response_key['data']['click'];
            $glispas = $response_key['data']['glispa'];
            $matomies = $response_key['data']['matomies'];
            $seven = $response_key['data']['seven'];
        }
        return $this->render('setting', ['listhas' => $listhas, 'art' => $art,
                'click' => $click, 'glispas' => $glispas, 'matomies' => $matomies, 'seven' => $seven]
        );
    }

    public function actionDelete()
    {
        $id = $this->getParameter('id', 0);
        $response = ApiHelper::apiQuery([ApiHelper::API_DEL_HASOFFER, 'id' => $id]);
        if (ApiHelper::isResultSuccess($response)) {
            return $this->redirect('?r=site/setting');
        } else {
            return $this->render('error');
        }
    }

    public function actionForm()
    {
        $this->render('form');
    }

    public function actionAddKey()
    {
        $api = $this->getParameter('api', '');
        $network = $this->getParameter('network', '');
        $response = ApiHelper::apiQuery([ApiHelper::API_ADD_HASOFFER, 'api' => $api, 'network' => $network]);
        if (ApiHelper::isResultSuccess($response)) {
            return $this->redirect('?r=site/setting');
        } else {
            return $this->render('error');
        }
    }

    public function actionUpdateArt()
    {
        $api = $this->getParameter('api', '');
        $id = $this->getParameter('id', 0);
        $response = ApiHelper::apiQuery([ApiHelper::API_UDPATE_ART, 'api' => $api, 'id' => $id]);
        if (ApiHelper::isResultSuccess($response)) {
            return $this->redirect('?r=site/setting');
        } else {
            return $this->render('error');
        }
    }

    public function actionUpdateClick()
    {
        $api = $this->getParameter('userid', '');
        $id = $this->getParameter('id', 0);
        $userToken = $this->getParameter('usertoken', '');
        $response = ApiHelper::apiQuery([ApiHelper::API_UDPATE_CLICK, 'userid' => $api, 'id' => $id, 'usertoken' => $userToken]);
        if (ApiHelper::isResultSuccess($response)) {
            return $this->redirect('?r=site/setting');
        } else {
            return $this->render('error');
        }
    }

    public function actionUpdateGlispas()
    {
        $api = $this->getParameter('api', '');
        $id = $this->getParameter('id', 0);
        $cd = $this->getParameter('cd', '');
        $response = ApiHelper::apiQuery([ApiHelper::API_UDPATE_GLISPAS, 'api' => $api, 'id' => $id, 'cd' => $cd]);
        if (ApiHelper::isResultSuccess($response)) {
            return $this->redirect('?r=site/setting');
        } else {
            return $this->render('error');
        }
    }

    public function actionUpdateMatomy()
    {
        $api = $this->getParameter('key', '');
        $id = $this->getParameter('id', 0);
        $utoken = $this->getParameter('account', '');
        $response = ApiHelper::apiQuery([ApiHelper::API_UDPATE_MATOMY, 'key' => $api, 'id' => $id, 'account' => $utoken]);
        if (ApiHelper::isResultSuccess($response)) {
            return $this->redirect('?r=site/setting');
        } else {
            return $this->render('error');
        }
    }

    public function actionUpdateSeven()
    {
        $api = $this->getParameter('token', '');
        $id = $this->getParameter('id', 0);
        $response = ApiHelper::apiQuery([ApiHelper::API_UDPATE_SEVEN, 'token' => $api, 'id' => $id]);
        if (ApiHelper::isResultSuccess($response)) {
            return $this->redirect('?r=site/setting');
        } else {
            return $this->render('error');
        }
    }

    public function actionExportDemo()
    {
        $result = Hasoffers::getListOfferExportDemo();
        $objPHPExcel = new \PHPExcel();
        $objPHPExcel->getProperties()->setCreator("Runnable.com");
        $objPHPExcel->getProperties()->setLastModifiedBy("Runnable.com");
        $objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
        $objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
        $objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX,
generated using PHP classes.");
        $objPHPExcel->setActiveSheetIndex(0);
        $rowCount = 1;

        $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, 'Firstname');
        $objPHPExcel->getActiveSheet()->getStyle('A1:F1')->applyFromArray(
            array(
                'fill' => array(
                    'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => '00BCD4')
                )
            )

        );
        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, 'Lastname');
        $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, 'Branch');
        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, 'Gender');
        $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, 'Mobileno');
        $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, 'Email');
        foreach ($result as $row) {
            $rowCount++;
//            var_dump($row);exit;
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $row['id']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $row['name']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $row['description']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $row['preview_url']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $row['default_payout']);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $row['expiration_date']);

        }
        $objPHPExcel->getActiveSheet()->setTitle('Simple');

//        return $this->redirect('index.xlsx');
        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save('index.xlsx');
    }


}
