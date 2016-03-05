<?php include("header.php"); ?>
<?php $this->title = "Setting" ?>
    <div class="page-container" style="background-color:rgb(250, 250, 250);" data-reactid=".0.6">
    <div class="header" data-reactid=".0.6.0">
        <div class="pull-left full-height visible-sm visible-xs" data-reactid=".0.6.0.0">
            <div class="sm-action-bar" data-reactid=".0.6.0.0.0"><a style="cursor:pointer;"
                                                                    class="btn-link toggle-sidebar"
                                                                    data-toggle="sidebar"
                                                                    data-reactid=".0.6.0.0.0.0"><span
                        class="icon-set menu-hambuger" data-reactid=".0.6.0.0.0.0.0"></span></a></div>
        </div>
        <div class="pull-right full-height visible-sm visible-xs" data-reactid=".0.6.0.1">
            <div class="sm-action-bar" data-reactid=".0.6.0.1.0"><a style="cursor:pointer;" class="btn-link"
                                                                    data-toggle="quickview"
                                                                    data-toggle-element="#quickview"
                                                                    data-reactid=".0.6.0.1.0.0"><span
                        class="fa fa-search" data-reactid=".0.6.0.1.0.0.0"></span></a></div>
        </div>
        <div class="pull-left sm-table" data-reactid=".0.6.0.2">
            <div class="header-inner" data-reactid=".0.6.0.2.0">
                <div class="brand inline" data-reactid=".0.6.0.2.0.0"><img src="static/images/mm-on-transparent-bg.png"
                                                                           style="max-width:140px;"
                                                                           class="img-responsive"
                                                                           data-reactid=".0.6.0.2.0.0.0"></div>
                <div style="display:inline-block;" id="search-container" data-reactid=".0.6.0.2.0.2">
                    <!--<div class="visible-lg visible-md" style="margin-left:30px;display:inline-block;width:400px;"-->
                    <!--data-reactid=".0.6.0.2.0.2.0">-->
                    <!--<form class="typeahead" data-reactid=".0.6.0.2.0.2.0.0"><span-->
                    <!--class="typeahead-icon fa fa-search" data-reactid=".0.6.0.2.0.2.0.0.0"></span><input-->
                    <!--style="background-color:transparent;" class="typeahead-input" type="text"-->
                    <!--placeholder="Search for offers and advertisers... " data-reactid=".0.6.0.2.0.2.0.0.1">-->
                    <!--<ul style="position:absolute;" class="typeahead-selector"-->
                    <!--data-reactid=".0.6.0.2.0.2.0.0.2"></ul>-->
                    <!--</form>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
        <div class="pull-right" data-reactid=".0.6.0.3">
            <div class="visible-lg visible-md" data-reactid=".0.6.0.3.0"></div>
        </div>
    </div>
    <div class="page-content-wrapper" data-reactid=".0.6.1">
        <div class="content" data-reactid=".0.6.1.0">
            <div data-reactid=".0.6.1.0.0">
                <div data-reactid=".0.6.1.0.0.0">
                    <div class="container-fluid  sm-p-l-20 sm-p-r-20" data-reactid=".0.6.1.0.0.0.0">

                    </div>
                </div>
                <div class="container-fluid" data-reactid=".0.6.1.0.0.0.1">
                    <div class="panel panel-transparent" data-reactid=".0.6.1.0.0.0.1.0">
                        <div class="panel-body" data-reactid=".0.6.1.0.0.0.1.0.1">
                            <div><h2>HasOffer</h2></div>

                                API Key: <input type="text" style="width: 400px;" title="API KEY" id="api">
                                Network ID:<input type="text" title="Network ID" id="network">
                                <input type="button" onclick="submit();"  class="btn btn-primary" value="Add">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>API Key</th>
                                    <th>NetWork ID</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (!empty($listhas) && null != $listhas) {
                                    $i = 1;
                                    foreach ($listhas->items as $hasOffer) {
                                        ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $hasOffer->api_key ?></td>
                                            <td><?= $hasOffer->network_id ?></td>
                                            <td>
                                                <a href="<?php echo \frontend\helpers\CUtils::createAbsoluteUrl(['site/delete', 'id' => $hasOffer->id]) ?>">Delete</a>
                                            </td>
                                        </tr>
                                    <?php }
                                } ?>
                                </tbody>
                            </table>
                            <div><h2>ArtOfClick</h2></div>
                            API Key : <input type="text" id="art" style="width: 600px;" value="<?= $art['0']['api_key']?>">
                            <input type="button" onclick="updateArt(<?= $art['0']['id']?>);"  class="btn btn-primary" value="Update">
                            <div><h2>ClickSmobs</h2></div>
                            User ID : <input type="text" id="clickId" style="width: 120px;" value="<?= $click['0']['user_id']?>">
                            User Token: <input type="text" id="clickToken" style="width: 400px;" value="<?= $click['0']['user_token']?>">
                            <input type="button" onclick="updateClick(<?= $click['0']['id']?>);"  class="btn btn-primary" value="Update">
                            <div><h2>Glispas</h2></div>
                            CD Number : <input type="text" id="glispasCD" style="width: 100px;" value="<?= $glispas['0']['cd_number']?>">
                            API Token : <input type="text" id="glispasToken" style="width: 400px;" value="<?= $glispas['0']['api_token']?>">
                            <input type="button" onclick="updateGlispas(<?= $glispas['0']['id']?>);"  class="btn btn-primary" value="Update">
                            <div><h2>OfferSeven</h2></div>
                            Token : <input type="text" id="seven" style="width: 600px;" value="<?= $seven['0']['token']?>">
                            <input type="button" onclick="updateSeven(<?= $seven['0']['id']?>);"  class="btn btn-primary" value="Update">
                            <div><h2>Matomy</h2></div>
                            Key : <input type="text" id="matomiesKey" value="<?= $matomies['0']['key']?>">
                            Account : <input type="text" id="matomiesAccount" value="<?= $matomies['0']['account']?>">
                            <input type="button" onclick="updateMatomies(<?= $matomies['0']['id']?>);"  class="btn btn-primary" value="Update">
                            <div class="clearfix" data-reactid=".0.6.1.0.0.0.1.0.1.1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script >
    function submit(){
        var api = document.getElementById('api').value;
        var network = document.getElementById('network').value;
        window.location.assign('http://45.32.54.195/frontend/web/?r=site/add-key&api='+api+"&network="+network);
    }
    function updateArt(id){
        var api = document.getElementById('art').value;
        window.location.assign('http://45.32.54.195/frontend/web/?r=site/update-art&api='+api+"&id="+id);
    }
    function updateClick(id){
        var api = document.getElementById('clickId').value;
        var network = document.getElementById('clickToken').value;
        window.location.assign('http://45.32.54.195/frontend/web/?r=site/update-click&userid='+api+"&id="+id+"&usertoken="+network);
    }
    function updateGlispas(id){
        var api = document.getElementById('glispasToken').value;
        var network = document.getElementById('glispasCD').value;
            window.location.assign('http://45.32.54.195/frontend/web/?r=site/update-glispas&api='+api+"&id="+id+"&cd="+network);
    }
    function updateSeven(id){
        var api = document.getElementById('seven').value;
        window.location.assign('http://45.32.54.195/frontend/web/?r=site/update-seven&token='+api+"&id="+id);
    }
    function updateMatomies(id){
        var api = document.getElementById('matomiesKey').value;
        var network = document.getElementById('matomiesAccount').value;
        window.location.assign('http://45.32.54.195/frontend/web/?r=site/update-matomy&key='+api+"&id="+id+"&account="+network);
    }
</script>
<!--    <script type="text/javascript">-->
<!--        function displayActive1(){-->
<!--            $('.m-t-10').removeClass("deactive");-->
<!--            $('.m-t-11').addClass("active");-->
<!--            $('.m-t-12').removeClass("deactive");-->
<!--        }-->
<!--    </script>-->
<?php include("footer.php"); ?>