<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>

    <meta charset="utf-8"/>
    <title><?= Html::encode($this->title ? $this->title : 'Massive')  ?></title>
    <link rel="shortcut icon" href="static/favicon.ico">
    <script src="static/js/jquery-2.1.3.min.js" type="text/javascript"></script>
    <script src="static/js/lazysizes.min.js" async></script>
    <!--    <link rel="stylesheet" href="http://www.formmail-maker.com/var/demo/jquery-popup-form/colorbox.css" />-->
    <!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>-->
    <!--    <script src="static/js/jquery.colorbox.js"></script>-->

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN Vendor CSS-->
    <link rel="stylesheet" href="static/CACHE/css/50faabdc3ce3.css" type="text/css"/>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" type="text/css"/>

    <!--    <script src="static/js/main.js"></script>-->
    <script type="text/javascript">
        window.onload = function () {
            // fix for windows 8
            if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
                document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="pages/css/windows.chrome.fix.css" />'
        }
    </script>

</head>
<body class="fixed-header menu-pin">
<?php $this->beginBody() ?>

<div>
    <div>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
