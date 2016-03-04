<?php
namespace frontend\controllers;

use arturoliveira\ExcelView;
use common\models\ArtOfClickModels;
use common\models\Hasoffers;
use common\models\Glispas;
use common\models\Offersevens;
use frontend\helpers\ApiHelper;
use frontend\models\ListArt;
use frontend\models\ListClickSmobs;
use frontend\models\ListCountries;
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
            $listHasOffer = new ListHasOffer();
            $listHasOffer->setAttribute($listHasOffer_);
            $pagination = new \yii\data\Pagination(['totalCount' => $response_offer['data']['_meta']['totalCount'], 'pageSize' => $response_offer['data']['_meta']['perPage']]);
            $response_countries = ApiHelper::apiQuery([ApiHelper::API_GET_ALL_COUNTRY]);
            $countries = $response_countries['data']['items'];
            $listCountries = new ListCountries();
            $listCountries->setAttribute($countries);
            return $this->render('hasoffer', ['listOffer' => $listHasOffer, 'pagination' => $pagination, 'listCountries' => $listCountries]);
        } else {
            return $this->render('error');
        }
    }

    public function actionArtOfClick()
    {
        $sort = $this->getParameter('id', '');
        $page = \Yii::$app->request->get('page', 1);
        $filterCountries = $this->getParameter('countries', '');
        $filterDevice = $this->getParameter('device', '');
        $per_page = \Yii::$app->request->get('per_page', 20);
        $response_offer = ApiHelper::apiQuery([ApiHelper::API_GET_LIST_ARTOFCLICK, 'page' => $page, 'per_page' => $per_page, 'sort' => $sort, 'countries' => $filterCountries, 'device' => $filterDevice], null, false);
        if (ApiHelper::isResultSuccess($response_offer)) {
            $listHasOffer_ = $response_offer['data']['items'];
            $listHasOffer = new ListArt();
            $listHasOffer->setAttribute($listHasOffer_);
            $pagination = new \yii\data\Pagination(['totalCount' => $response_offer['data']['_meta']['totalCount'], 'pageSize' => $response_offer['data']['_meta']['perPage']]);
//            var_dump($response_offer['data']['_meta']['perPage']);exit;
            $response_countries = ApiHelper::apiQuery([ApiHelper::API_GET_ALL_COUNTRY]);
            $countries = $response_countries['data']['items'];
            $listCountries = new ListCountries();
            $listCountries->setAttribute($countries);
            return $this->render('artofclick', ['listHasOffer' => $listHasOffer, 'pagination_' => $pagination, 'listCountries' => $listCountries]);
        } else {

            return $this->render('error');
        }
    }

    public function actionGetListHasOffer()
    {
        $sort = $this->getParameter('id', '');
        $page = \Yii::$app->request->get('page', 1);
        $filterCountries = $this->getParameter('countries', '');
        $filterDevice = $this->getParameter('device', '');
        $per_page = \Yii::$app->request->get('per_page', 50);
        $response_offer = ApiHelper::apiQuery([ApiHelper::API_OFFER_HASH, 'sort' => $sort, 'page' => $page, 'rows_per_page' => $per_page, 'countries' => $filterCountries, 'device' => $filterDevice]);
        if (ApiHelper::isResultSuccess($response_offer)) {
            $detail = $response_offer['data']['items'];
            $listOffer = new ListHasOffer();
            $listOffer->setAttribute($detail);
            $pagination = new \yii\data\Pagination(['totalCount' => $response_offer['data']['_meta']['totalCount'], 'pageSize' => $response_offer['data']['_meta']['perPage']]);
            $response_countries = ApiHelper::apiQuery([ApiHelper::API_GET_ALL_COUNTRY]);
            $countries = $response_countries['data']['items'];
            $listCountries = new ListCountries();
            $listCountries->setAttribute($countries);
            return $this->render('hasoffer', ['listOffer' => $listOffer, 'pagination' => $pagination, 'listCountries' => $listCountries]);
        }
    }

    public function actionGlispas()
    {
        $sort = $this->getParameter('id', '');
        $page = \Yii::$app->request->get('page', 1);
        $filterCountries = $this->getParameter('countries', '');
        $filterDevice = $this->getParameter('device', '');
        $per_page = \Yii::$app->request->get('per_page', 20);
        $response_glispas = ApiHelper::apiQuery([ApiHelper::API_GET_LIST_GLISPAS, 'page' => $page, 'per_page' => $per_page, 'sort' => $sort, 'countries' => $filterCountries, 'device' => $filterDevice], null, false);

        if (ApiHelper::isResultSuccess($response_glispas)) {
            $glispas = $response_glispas['data']['items'];
            $listGlispas = new ListGlispas();
            $listGlispas->setAttribute($glispas);
            $pagination = new \yii\data\Pagination(['totalCount' => $response_glispas['data']['_meta']['totalCount'], 'pageSize' => $response_glispas['data']['_meta']['perPage']]);
            $response_countries = ApiHelper::apiQuery([ApiHelper::API_GET_ALL_COUNTRY]);
            $countries = $response_countries['data']['items'];
            $listCountries = new ListCountries();
            $listCountries->setAttribute($countries);
            return $this->render('glispas', ['listGlispas' => $listGlispas, 'pagination' => $pagination, 'listCountries' => $listCountries]);
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
        $id = $this->getParameter('id', 0);
        $result = Glispas::getListGlispasExport($id);
        $objPHPExcel = new \PHPExcel();
        $objPHPExcel->getProperties()->setCreator("Runnable.com");
        $objPHPExcel->getProperties()->setLastModifiedBy("Runnable.com");
        $objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
        $objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
        $objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX,
generated using PHP classes.");
        $objPHPExcel->setActiveSheetIndex(0);
        $rowCount = 1;
        $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, 'id');
        $objPHPExcel->getActiveSheet()->getStyle('A1:J1')->applyFromArray(
            array(
                'fill' => array(
                    'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => '00BCD4')
                )
            )

        );
        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, 'name');
        $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, 'category');
        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, 'acquisition');
        $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, 'payout');
        $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, 'summary');
        $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, 'target');
        $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, 'rules');
        $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, 'tracking');
        $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, 'countries');
        foreach ($result as $row) {
            $rowCount++;
//            var_dump($row);exit;
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $row['glispaID']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $row['name']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $row['category']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $row['acquisition']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $row['payout']);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $row['summary']);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $row['target']);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $row['rules']);
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $row['tracking']);
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $row['countries']);

        }
        $objPHPExcel->getActiveSheet()->setTitle('Simple');

//        return $this->redirect('index.xlsx');
        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save('glispas_download.xlsx');
        return $this->redirect("glispas_download.xlsx");

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
        } else {
            return $this->render('error');
        }
    }

    public function actionGetHasofferExport()
    {
        $id = $this->getParameter('id');
        $response = ApiHelper::apiQuery([ApiHelper::API_GET_LIST_HASOFFER_EXPORT, 'id' => $id]);
        if (ApiHelper::isResultSuccess($response)) {
            $result = $response['data'];
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
            $objWriter->save('hasoffer.xlsx');
        }
        return $this->redirect("hasoffer.xlsx");
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
        $sort = $this->getParameter('id', 'desc');
        $filterCountries = $this->getParameter('countries', '');
        $filterDevice = $this->getParameter('device', '');
        $per_page = \Yii::$app->request->get('per_page', 20);

        $response_seven = ApiHelper::apiQuery([ApiHelper::API_GET_LIST_SEVEN, 'page' => $page, 'per_page' => $per_page, 'sort' => $sort, 'countries' => $filterCountries, 'device' => $filterDevice], null, false);
        if (ApiHelper::isResultSuccess($response_seven)) {
            $seven = $response_seven['data']['items'];
            $listSeven = new ListOfferSeven();
            $listSeven->setAttribute($seven);
            $pagination = new \yii\data\Pagination(['totalCount' => $response_seven['data']['_meta']['totalCount'], 'pageSize' => $response_seven['data']['_meta']['perPage']]);
            $response_countries = ApiHelper::apiQuery([ApiHelper::API_GET_ALL_COUNTRY]);
            $countries = $response_countries['data']['items'];
            $listCountries = new ListCountries();
            $listCountries->setAttribute($countries);
            return $this->render('offerseven', ['listSeven' => $listSeven, 'pagination' => $pagination, 'listCountries' => $listCountries]);
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
        $id = $this->getParameter('id', 0);
        $result = Offersevens::getListSevenExport($id);
        $objPHPExcel = new \PHPExcel();
        $objPHPExcel->getProperties()->setCreator("Runnable.com");
        $objPHPExcel->getProperties()->setLastModifiedBy("Runnable.com");
        $objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
        $objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
        $objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX,
generated using PHP classes.");
        $objPHPExcel->setActiveSheetIndex(0);
        $rowCount = 1;

        $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, 'id');
        $objPHPExcel->getActiveSheet()->getStyle('A1:J1')->applyFromArray(
            array(
                'fill' => array(
                    'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                    'color' => array('rgb' => '00BCD4')
                )
            )

        );
        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, 'name');
        $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, 'previewUrl');
        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, 'description');
        $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, 'payout');
        $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, 'currency');
        $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, 'Platforms');
        $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, 'Tags');
        $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, 'APP_ID');
        $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, 'countries');
        foreach ($result as $row) {
            $rowCount++;
//            var_dump($row);exit;
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $row['ID']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $row['Name']);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $row['Preview_url']);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $row['Description']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $row['Payout']);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $row['Currency']);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $row['Platforms']);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $row['Tags']);
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $row['APP_ID']);
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $row['Countries']);

        }
        $objPHPExcel->getActiveSheet()->setTitle('Simple');

//        return $this->redirect('index.xlsx');
        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save('offersevens_download.xlsx');
        return $this->redirect("offersevens_download.xlsx");
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

    public function actionGetArtofclickExport()
    {
        $id = $this->getParameter('id', 0);
        $response = ApiHelper::apiQuery([ApiHelper::API_GET_ARTOFCLICK_EXPORT, 'id' => $id]);
        if (ApiHelper::isResultSuccess($response)) {
            $result = $response['data'];
            $objPHPExcel = new \PHPExcel();
            $objPHPExcel->getProperties()->setCreator("Runnable.com");
            $objPHPExcel->getProperties()->setLastModifiedBy("Runnable.com");
            $objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
            $objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
            $objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX,
generated using PHP classes.");
            $objPHPExcel->setActiveSheetIndex(0);
            $rowCount = 1;

            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, 'id');
            $objPHPExcel->getActiveSheet()->getStyle('A1:J1')->applyFromArray(
                array(
                    'fill' => array(
                        'type' => \PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => '00BCD4')
                    )
                )

            );
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, 'name');
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, 'previewUrl');
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, 'payoutType');
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, 'payout');
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, 'currency');
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, 'device');
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, 'os');
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, 'osVersionMinimum');
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, 'countries');
            foreach ($result as $row) {
                $rowCount++;
//            var_dump($row);exit;
                $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $row['id']);
                $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $row['name']);
                $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $row['previewUrl']);
                $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $row['payoutType']);
                $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $row['payout']);
                $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $row['currency']);
                $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $row['device']);
                $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $row['os']);
                $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $row['osVersionMinimum']);
                $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $row['countries']);

            }
            $objPHPExcel->getActiveSheet()->setTitle('Simple');

//        return $this->redirect('index.xlsx');
            $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
            $objWriter->save('artoflcick_download.xlsx');
        }
//        $result = ArtOfClickModels::getListArtofclickExport($id);

        return $this->redirect("artoflcick_download.xlsx");
    }


}
