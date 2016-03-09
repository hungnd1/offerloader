<?php include("header.php"); ?>
<?php $this->title = "OffersLoader" ?>
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
                <input type="hidden" id="count" value="">
                <div class="container-fluid" data-reactid=".0.6.1.0.0.0.1">
                    <div class="panel panel-transparent" data-reactid=".0.6.1.0.0.0.1.0">
                        <div class="panel-heading" data-reactid=".0.6.1.0.0.0.1.0.0">
                            <div class="panel-title" data-reactid=".0.6.1.0.0.0.1.0.0.0"><h2>OffersLoader</h2></div>
                        </div>
                        <div class="panel-body" data-reactid=".0.6.1.0.0.0.1.0.1">
                            <div class="row" data-reactid=".0.6.1.0.0.0.1.0.1.0:0">
                                <div class="col-md-3" data-reactid=".0.6.1.0.0.0.1.0.1.0:0.0"><h5
                                        data-reactid=".0.6.1.0.0.0.1.0.1.0:0.0.0">Filter by country</h5>
                                    <div id="country-selector" data-reactid=".0.6.1.0.0.0.1.0.1.0:0.0.1">
                                        <div class="input-group" data-reactid=".0.6.1.0.0.0.1.0.1.0:0.0.1.0">
                                            <select id="mySelect" onchange="Myfunction();"
                                                    class="form-control" data-reactid=".0.6.1.0.0.0.1.0.1.0:0.0.1.0.0">
                                                <option value="" data-reactid=".0.6.1.0.0.0.1.0.1.0:0.0.1.0.0.0">Select
                                                    Country
                                                </option>
                                                <?php foreach ($listCountries->items as $countries) { ?>
                                                    <option value="<?= $countries->code ?>"><?= $countries->name ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                            <span class="input-group-btn"
                                                  data-reactid=".0.6.1.0.0.0.1.0.1.0:0.0.1.0.1"><button
                                                    class="btn btn-default" type="submit" onclick="reset();"
                                                    data-reactid=".0.6.1.0.0.0.1.0.1.0:0.3.1.0.1.0">Reset
                                                </button>
                                                </span></div>
                                    </div>
                                </div>
                                <div class="col-md-3" data-reactid=".0.6.1.0.0.0.1.0.1.0:0.1"><h5
                                        data-reactid=".0.6.1.0.0.0.1.0.1.0:0.1.0">Filter by platform</h5>
                                    <div data-reactid=".0.6.1.0.0.0.1.0.1.0:0.1.1">
                                        <div class="input-group" data-reactid=".0.6.1.0.0.0.1.0.1.0:0.1.1.0">
                                            <select id="Deviceselect" onchange="Myfunction1();"
                                                    class="form-control" data-reactid=".0.6.1.0.0.0.1.0.1.0:0.1.1.0.0">
                                                <option value="" data-reactid=".0.6.1.0.0.0.1.0.1.0:0.1.1.0.0.0">Select
                                                    Device
                                                </option>
                                                <option value="iPad" data-reactid=".0.6.1.0.0.0.1.0.1.0:0.1.1.0.0.1:$0">
                                                    iPad
                                                </option>
                                                <option value="Mobile"
                                                        data-reactid=".0.6.1.0.0.0.1.0.1.0:0.1.1.0.0.1:$1">Mobile
                                                </option>
                                                <option value="iOS" data-reactid=".0.6.1.0.0.0.1.0.1.0:0.1.1.0.0.1:$2">
                                                    iOS
                                                </option>
                                                <option value="Desktop"
                                                        data-reactid=".0.6.1.0.0.0.1.0.1.0:0.1.1.0.0.1:$3">Desktop
                                                </option>
                                                <option value="iPhone"
                                                        data-reactid=".0.6.1.0.0.0.1.0.1.0:0.1.1.0.0.1:$4">iPhone
                                                </option>
                                                <option value="Android"
                                                        data-reactid=".0.6.1.0.0.0.1.0.1.0:0.1.1.0.0.1:$5">Android
                                                </option>
                                            </select><span class="input-group-btn"
                                                           data-reactid=".0.6.1.0.0.0.1.0.1.0:0.1.1.0.1"><button
                                                    class="btn btn-default" type="submit" onclick="reset();"
                                                    data-reactid=".0.6.1.0.0.0.1.0.1.0:0.3.1.0.1.0">Reset
                                                </button>
                                                </span></div>
                                    </div>
                                </div>
                                <div class="col-md-3" data-reactid=".0.6.1.0.0.0.1.0.1.0:0.1"><h5
                                        data-reactid=".0.6.1.0.0.0.1.0.1.0:0.1.0">Filter by Network</h5>
                                    <div data-reactid=".0.6.1.0.0.0.1.0.1.0:0.1.1">
                                        <div class="input-group" data-reactid=".0.6.1.0.0.0.1.0.1.0:0.1.1.0">
                                            <select id="network" onchange="Myfunction2();"
                                                    class="form-control" data-reactid=".0.6.1.0.0.0.1.0.1.0:0.1.1.0.0">
                                                <option value="" data-reactid=".0.6.1.0.0.0.1.0.1.0:0.1.1.0.0.0">Select
                                                    Device
                                                </option>
                                                <?php foreach ($listNetwork->items as $network) {
                                                    ?>
                                                    <option value="<?= $network->network ?>"
                                                            data-reactid=".0.6.1.0.0.0.1.0.1.0:0.1.1.0.0.1:$0">
                                                        <?= $network->network ?>
                                                    </option>
                                                <?php } ?>
                                            </select><span class="input-group-btn"
                                                           data-reactid=".0.6.1.0.0.0.1.0.1.0:0.1.1.0.1"><button
                                                    class="btn btn-default" type="submit" onclick="reset();"
                                                    data-reactid=".0.6.1.0.0.0.1.0.1.0:0.3.1.0.1.0">Reset
                                                </button>
                                                </span></div>
                                    </div>
                                </div>
                                <div class="col-md-3" data-reactid=".0.6.1.0.0.0.1.0.1.0:0.3">
                                    <h5 data-reactid=".0.6.1.0.0.0.1.0.1.0:0.3.0">Sort</h5>
                                    <div data-reactid=".0.6.1.0.0.0.1.0.1.0:0.3.1">
                                        <div class="input-group" data-reactid=".0.6.1.0.0.0.1.0.1.0:0.3.1.0">
                                            <select
                                                id="sortPayout" onchange="Myfunction3();"
                                                class="form-control" data-reactid=".0.6.1.0.0.0.1.0.1.0:0.3.1.0.0">
                                                <option value=""
                                                        data-reactid=".0.6.1.0.0.0.1.0.1.0:0.3.1.0.0.$2">Sort By Payout
                                                </option>
                                                <option value="desc"
                                                        data-reactid=".0.6.1.0.0.0.1.0.1.0:0.3.1.0.0.$1">Payout: High to
                                                    low
                                                </option>
                                                <option value="asc"
                                                        data-reactid=".0.6.1.0.0.0.1.0.1.0:0.3.1.0.0.$2">Payout: Low to
                                                    high
                                                </option>
                                            </select><span class="input-group-btn"
                                                           data-reactid=".0.6.1.0.0.0.1.0.1.0:0.3.1.0.1"><button
                                                    class="btn btn-default" type="submit" onclick="reset();"
                                                    data-reactid=".0.6.1.0.0.0.1.0.1.0:0.3.1.0.1.0">Reset
                                                </button></span></div>

                                    </div>
                                </div>
                            </div>
                            <div class="m-b-20 row" data-reactid=".0.6.1.0.0.0.1.0.1.0:1">
                                <div class="col-xs-12 col-md-3 p-t-10" data-reactid=".0.6.1.0.0.0.1.0.1.0:1.0">
                                    <div style="display:inline-block;vertical-align:top;"
                                         data-reactid=".0.6.1.0.0.0.1.0.1.0:1.0.1">
                                        <div data-reactid=".0.6.1.0.0.0.1.0.1.0:1.0.1.1">
                                            <!--                                            <a href="#" onclick="Myfunction();" class="btn btn-primary">Filter</a>-->
                                            <a href="#" onclick="fnExcelReport1();" class="btn btn-primary">Export</a>
                                            <a href="#" onclick="exportpattern();" class="btn btn-primary">Export For
                                                Pattern</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group"><span class="input-group-addon">Filter</span>

                                <input id="filter" type="text" class="form-control" placeholder="Type here...">
                            </div>
                            <input type="hidden" id="vals" value="">
                            <table id="datatable" class="table table-striped">
                                <thead>
                                <tr>
                                    <th><input type="checkbox" id="checkAll" style="margin-left: -10px;"></th>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Network</th>
                                    <th>Payout</th>
                                    <th>Currency</th>
                                    <th>Country</th>
                                    <th>Type</th>
                                    <th>Daily Cap</th>
                                    <th>Os</th>

                                </tr>
                                </thead>
                                <tbody class="searchable">
                                <?php if (!empty($listOffer) && null != $listOffer) {
                                    foreach ($listOffer->items as $offer) {
                                        ?>
                                        <tr>
                                            <td><input type="checkbox" class="chk" name="glispas[]"
                                                       value="<?= $offer->id ?>"/></td>
                                            <td><?= $offer->offer_id ?></td>
                                            <td>
                                                <a onclick="getDetail(<?= $offer->id ?>);"><?= $offer->offer_name ?></a>
                                            </td>
                                            <td><?= $offer->network ?></td>
                                            <td>$<?= $offer->payout ?></td>
                                            <td><?= $offer->currency ?></td>
                                            <?php if (strpos($offer->countries, ' ') !== false) {
                                                $countries = explode(' ', $offer->countries);
                                                if (count($countries) >= 8) {
                                                    ?>
                                                    <td><?php echo count($countries) . " " . "Countries" ?></td>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <td><?php echo $offer->countries ?></td>
                                                    <?php
                                                }
                                            } else if (strpos($offer->countries, ',') !== false) {
                                                $countries = explode(',', $offer->countries);
                                                if (count($countries) >= 8) {
                                                    ?>
                                                    <td><?php echo count($countries) . " " . "Countries" ?></td>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <td><?php echo $offer->countries ?></td>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <td><?php echo $offer->countries ?></td>
                                                <?php
                                            } ?>
                                            <td><?= $offer->payout_type ?></td>
                                            <td><?= $offer->daily_cap ?></td>
                                            <td><?= $offer->os ?></td>

                                        </tr>
                                    <?php }
                                } ?>
                                </tbody>
                            </table>
                            <?php
                            if (isset($pagination) && !empty($pagination)) { ?>
                                <div>
                                    <?=
                                    \yii\widgets\LinkPager::widget([
                                        'pagination' => $pagination,
                                    ]);
                                    ?>
                                </div>
                            <?php } ?>
                            <div class="clearfix" data-reactid=".0.6.1.0.0.0.1.0.1.1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="width: 800px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Imformation Detail <h3 id="msg"></h3></h4>
                </div>
                <div class="modal-body" style="width: 100%">
                    <table class="table table-bordered" style="">
                        <tbody>
                        <tr>
                            <td><b>Offer ID</b></td>
                            <td id="msg1"></td>
                            <td><b>Network</b></td>
                            <td id="msg2"></td>
                        </tr>
                        <tr>
                            <td><b>Offer Name</b></td>
                            <td id="msg3"></td>
                            <td><b>preview_url</b></td>
                            <td id="msg4"></td>
                        </tr>
                        <tr>
                            <td><b>incent</b></td>
                            <td id="msg5"></td>
                            <td><b>tracking_url</b></td>
                            <td id="msg6"></td>
                        </tr>
                        <tr>
                            <td><b>payout</b></td>
                            <td id="msg7"></td>
                            <td><b>payout_type</b></td>
                            <td id="msg8"></td>
                        </tr>
                        <tr>
                            <td><b>countries</b></td>
                            <td id="msg9"></td>
                            <td><b>daily_cap</b></td>
                            <td id="msg10"></td>
                        </tr>
                        <tr>
                            <td><b>currency</b></td>
                            <td id="msg11"></td>
                            <td><b>os</b></td>
                            <td id="msg12"></td>
                        </tr>
                        <tr>
                            <td><b>payout_type</b></td>
                            <td colspan="3" id="msg13"></td>
                        </tr>
                        </tbody>
                    </table>
                    <div id="test"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!--  end modal-->

    <!-- Modal -->
    <div class="modal fade" id="myModal1" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="width: 800px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3>Export</h3>
                </div>
                <div class="modal-body" style="width: 100%">
                    <label class="checkbox-inline"><input type="checkbox" value="exportall" id="exportall">Export All</label><br>
                    <table class="table table-bordered" style="">
                        <tr>
                            <td><label for="sel1">Filter By Country:</label>
                                <select style="width: 70%" class="form-control" id="sel">
                                    <option value="">Select Country</option>
                                    <?php foreach ($listCountries->items as $countries) { ?>
                                        <option value="<?= $countries->code ?>"><?= $countries->name ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td><label for="sel1">Filter By Platform:</label>
                                <select style="width: 70%" class="form-control" id="sel1">
                                    <option value="">Select Platform</option>
                                    <option value="iPad">iPad</option>
                                    <option value="Mobile">Mobile</option>
                                    <option value="iOS">iOS</option>
                                    <option value="Desktop">Desktop</option>
                                    <option value="iPhone">iPhone</option>
                                    <option value="Android">Android</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="sel1">Filter By Network:</label>
                                <select style="width: 70%" class="form-control" id="sel2">
                                    <option value="">Select Network</option>
                                    <?php foreach ($listNetwork->items as $network) {
                                        ?>
                                        <option value="<?= $network->network ?>">
                                            <?= $network->network ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td><label for="sel1">Filter By Payout:</label>
                                <select style="width: 70%" class="form-control" id="sel3">
                                    <option value="">Select Payout</option>
                                    <option value="desc">Payout: High to low</option>
                                    <option value="asc">Payout: Low to high</option>
                                </select></td>
                        </tr>
                    </table>
                    <div id="test"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" onclick="exportExcel();" class="btn btn-primary" data-dismiss="modal">Export</button>
                </div>
            </div>

        </div>
    </div>
    <script>
        function getDetail(id) {
            var id = id
            var url = '<?= frontend\helpers\CUtils::createAbsoluteUrl(["site/get-detail-hasoffer"]) ?>';
            $.ajax({
                url: url,
                type: "GET",
                data: {id: id},
                crossDomain: true,
                dataType: "text",
                success: function (result) {
                    var data = JSON.parse(result);
//                    alert(data.detail.link[0].link);
                    if (null != result && data['success']) {
                        //alert(data.detail.name);
                        $('#msg').html(data.detail.offer_name);
                        $('#msg1').html(data.detail.offer_id);
                        $('#msg2').html(data.detail.network);
                        $('#msg3').html(data.detail.offer_name);
                        $('#msg4').html(data.detail.preview_url);
                        $('#msg5').html(data.detail.incent);
                        $('#msg6').html(data.detail.tracking_url);
                        $('#msg7').html(data.detail.payout);
                        $('#msg8').html(data.detail.payout_type);
                        $('#msg9').html(data.detail.countries);
                        $('#msg10').html(data.detail.daily_cap);
                        $('#msg11').html(data.detail.currency);
                        $('#msg12').html(data.detail.os);
                        $('#msg13').html(data.detail.description);
//                        $('#test').html(getTable(data.detail.link));

                    }
                    return;
                },
                error: function (result) {
                    $('#msg2').html('Không thành công. Quý khách vui lòng thử lại sau ít phút.');
                }
            });//end jQuery.ajax
            jQuery.noConflict();
            $('#myModal').modal('show');
        }
        function getTable(data) {

            var html = "";
            html += "<table class='table table-bordered'><caption><h3>Creative Glispas<h3></caption><thead><tr><td><h4>Link</h4></td><td><h4>Description</h4></td></tr></thead><tbody>";
            for (var i = 0; i < data.length; i++) {
                html += "<tr>";
                html += "<td>" + data[i].link + "</td>";
                html += "<td>" + data[i].description + "</td></tr>";
            }
            html += "</tbody></table>";
            return html;
        }

    </script>
    <script type="text/javascript">
        function sortGlispas() {
            var sort = document.getElementById("sort");
            var strUser = sort.options[sort.selectedIndex].value;
            if (strUser == 'desc') {
                window.location.assign('<?= frontend\helpers\CUtils::createAbsoluteUrl(["site/get-list-has-offer", 'id' => 'payout']) ?>');
            } else {
                window.location.assign('<?= frontend\helpers\CUtils::createAbsoluteUrl(["site/get-list-has-offer"]) ?>');
            }

        }
        function fnExcelReport() {
            var tab_text = "<table border='2px'><tr bgcolor='#87AFC6'>";
            var textRange;
            var j = 0;
            tab = document.getElementById('datatable'); // id of table
            for (j = 0; j < tab.rows.length; j++) {
                tab_text = tab_text + tab.rows[j].innerHTML + "</tr>";
                //tab_text=tab_text+"</tr>";
            }
            tab_text = tab_text + "</table>";
            tab_text = tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
            tab_text = tab_text.replace(/<img[^>]*>/gi, ""); // remove if u want images in your table
            tab_text = tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

            var ua = window.navigator.userAgent;
            var msie = ua.indexOf("MSIE ");

            if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
            {
                txtArea1.document.open("txt/html", "replace");
                txtArea1.document.write(tab_text);
                txtArea1.document.close();
                txtArea1.focus();
                sa = txtArea1.document.execCommand("SaveAs", true, "Say Thanks to Sumit.xls");
            }
            else                 //other browser not tested on IE 11
                sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));

            return (sa);
        }
        function fnExcelReport1() {
            var checkboxes = document.getElementsByName('glispas[]');
            var checkbox = document.getElementsByName('glispas[]');

            var vals = "";
            for (var i = 0, n = checkboxes.length; i < n; i++) {
                if (checkboxes[i].checked) {
                    vals += "," + checkboxes[i].value;
                }
            }
            if (vals) vals = vals.substring(1);
            if (vals == '') {
                alert('You must choose checkbox to export');
            } else {
                window.location.href = 'https://offers.nlo.vn/offerloader/frontend/web/?r=site/get-hasoffer-export&id=' + vals;
            }

        }

        //        var x = "", y = "";
        function onLoad() {
            var check = getUrlVars()['countries'];
            var device = getUrlVars()['device'];
            var network = getUrlVars()['network'];
            var sort = getUrlVars()['sortPayout'];
//            alert(network);
            if (typeof check != 'undefined') {
                document.getElementById("mySelect").value = check;
            }
            if (typeof device != 'undefined') {
                document.getElementById("Deviceselect").value = device;
            }
            if (typeof network != 'undefined') {
                document.getElementById("network").value = network;
            }
            if (typeof sort != 'undefined') {
                document.getElementById("sortPayout").value = sort;
            }
//            alert(sort);

        }
        function Myfunction() {
            var check = getUrlVars()['countries'];
            var device = getUrlVars()['device'];
            var network = getUrlVars()['network'];
            var sort = getUrlVars()['sortPayout'];
            url = window.location.href;
            x = document.getElementById("mySelect").value;
            y = document.getElementById("Deviceselect").value;
            var z = document.getElementById("network").value;
            var s = document.getElementById("sortPayout").value;
            if ((typeof  check == 'undefined' && typeof  device == 'undefined' && typeof network == 'undefined' && typeof sort == 'undefined') || (typeof  check != 'undefined' && typeof  device == 'undefined' && typeof network == 'undefined' && typeof sort == 'undefined')) {
                window.location.href = 'https://offers.nlo.vn/offerloader/frontend/web/?r=site/get-list-offers&countries=' + x;
            } else if ((typeof  check == 'undefined' && typeof  device != 'undefined' && typeof  network == 'undefined' && typeof sort == 'undefined' ) || (typeof  check != 'undefined' && typeof  device != 'undefined' && typeof  network == 'undefined' && typeof sort == 'undefined')) {
                window.location.href = 'https://offers.nlo.vn/offerloader/frontend/web/?r=site/get-list-offers&countries=' + x + '&device=' + device;
            } else if ((typeof  check == 'undefined' && typeof  device == 'undefined' && typeof  network != 'undefined' && typeof sort == 'undefined' ) || (typeof  check != 'undefined' && typeof  device == 'undefined' && typeof  network != 'undefined' && typeof sort == 'undefined')) {
                window.location.href = 'https://offers.nlo.vn/offerloader/frontend/web/?r=site/get-list-offers&countries=' + x + '&network=' + network;
            } else if ((typeof  check == 'undefined' && typeof  device == 'undefined' && typeof  network == 'undefined' && typeof sort != 'undefined' ) || (typeof  check != 'undefined' && typeof  device == 'undefined' && typeof  network == 'undefined' && typeof sort != 'undefined')) {
                window.location.href = 'https://offers.nlo.vn/offerloader/frontend/web/?r=site/get-list-offers&countries=' + x + '&sortPayout=' + sort;
            } else if ((typeof  check != 'undefined' && typeof  device != 'undefined' && typeof  network != 'undefined' && typeof  sort != 'undefined') || (typeof  check == 'undefined' && typeof  sort != 'undefined' && typeof  device != 'undefined' && typeof  network != 'undefined')) {
                window.location.href = 'https://offers.nlo.vn/offerloader/frontend/web/?r=site/get-list-offers&countries=' + x + '&device=' + device + '&network=' + network + '&sortPayout=' + s;
            } else if ((typeof  check != 'undefined' && typeof  device != 'undefined' && typeof  network == 'undefined' && typeof  sort != 'undefined') || (typeof  check == 'undefined' && typeof  sort != 'undefined' && typeof  device != 'undefined' && typeof  network == 'undefined')) {
                window.location.href = 'https://offers.nlo.vn/offerloader/frontend/web/?r=site/get-list-offers&countries=' + x + '&device=' + device + '&sortPayout=' + sort;
            } else if ((typeof  check != 'undefined' && typeof  device == 'undefined' && typeof  network != 'undefined' && typeof  sort != 'undefined') || (typeof  check == 'undefined' && typeof  sort != 'undefined' && typeof  device == 'undefined' && typeof  network != 'undefined')) {
                window.location.href = 'https://offers.nlo.vn/offerloader/frontend/web/?r=site/get-list-offers&countries=' + x + '&network=' + network + '&sortPayout=' + sort;
            } else if ((typeof  check != 'undefined' && typeof  device != 'undefined' && typeof  network != 'undefined' && typeof  sort == 'undefined') || (typeof  check == 'undefined' && typeof  sort !== 'undefined' && typeof  device != 'undefined' && typeof  network != 'undefined')) {
                window.location.href = 'https://offers.nlo.vn/offerloader/frontend/web/?r=site/get-list-offers&countries=' + x + '&device=' + device + '&sortPayout=' + sort;
            }
        }

        function Myfunction1() {
            var check = getUrlVars()['countries'];
            var device = getUrlVars()['device'];
            var network = getUrlVars()['network'];
            var sort = getUrlVars()['sortPayout'];
            var s = document.getElementById("sortPayout").value;
            url = window.location.href;
            x = document.getElementById("mySelect").value;
            y = document.getElementById("Deviceselect").value;
            var z = document.getElementById("network").value;
            if ((typeof  device == 'undefined' && typeof check == 'undefined' && typeof network == 'undefined' && typeof sort == 'undefined') || (typeof  device != 'undefined' && typeof check == 'undefined' && typeof network == 'undefined' && typeof sort == 'undefined')) {
                window.location.href = 'https://offers.nlo.vn/offerloader/frontend/web/?r=site/get-list-offers&device=' + y;
            } else if ((typeof  device == 'undefined' && typeof check != 'undefined' && typeof network == 'undefined' && typeof sort == 'undefined') || (typeof  check != 'undefined' && typeof  device != 'undefined' && typeof network == 'undefined' && typeof sort == 'undefined')) {
                window.location.href = 'https://offers.nlo.vn/offerloader/frontend/web/?r=site/get-list-offers&countries=' + check + '&device=' + y;
            } else if ((typeof  device == 'undefined' && typeof  check != 'undefined' && typeof  network != 'undefined' && typeof sort != 'undefined') || (typeof  check != 'undefined' && typeof  device != 'undefined' && typeof network != 'undefined' && typeof sort != 'undefined')) {
                window.location.href = 'https://offers.nlo.vn/offerloader/frontend/web/?r=site/get-list-offers&countries=' + check + '&device=' + y + '&network=' + network + '&sortPayout=' + sort;
            } else if ((typeof  check == 'undefined' && typeof  device == 'undefined' && typeof network != 'undefined' && typeof sort == 'undefined') || (typeof  check == 'undefined' && typeof  device != 'undefined' && typeof network != 'undefined' && typeof sort == 'undefined')) {
                window.location.href = 'https://offers.nlo.vn/offerloader/frontend/web/?r=site/get-list-offers&device=' + y + '&network=' + network;
            } else if ((typeof  check == 'undefined' && typeof  device == 'undefined' && typeof network == 'undefined' && typeof sort != 'undefined') || (typeof  check == 'undefined' && typeof  device != 'undefined' && typeof network == 'undefined' && typeof sort != 'undefined')) {
                window.location.href = 'https://offers.nlo.vn/offerloader/frontend/web/?r=site/get-list-offers&device=' + y + '&sortPayout=' + sort;
            } else if ((typeof  check != 'undefined' && typeof  device == 'undefined' && typeof network != 'undefined' && typeof sort == 'undefined') || (typeof  check != 'undefined' && typeof  device != 'undefined' && typeof network != 'undefined' && typeof sort == 'undefined')) {
                window.location.href = 'https://offers.nlo.vn/offerloader/frontend/web/?r=site/get-list-offers&device=' + y + '&countries=' + check + '&network=' + network;
            } else if ((typeof  check == 'undefined' && typeof  device == 'undefined' && typeof network != 'undefined' && typeof sort != 'undefined') || (typeof  check == 'undefined' && typeof  device != 'undefined' && typeof network != 'undefined' && typeof sort != 'undefined')) {
                window.location.href = 'https://offers.nlo.vn/offerloader/frontend/web/?r=site/get-list-offers&device=' + y + '&sortPayout=' + sort + '&network=' + network;
            } else if ((typeof  check != 'undefined' && typeof  device == 'undefined' && typeof network == 'undefined' && typeof sort != 'undefined') || (typeof  check != 'undefined' && typeof  device != 'undefined' && typeof network == 'undefined' && typeof sort != 'undefined')) {
                window.location.href = 'https://offers.nlo.vn/offerloader/frontend/web/?r=site/get-list-offers&device=' + y + '&countries=' + check + '&sortPayout=' + sort;
            }
        }
        function Myfunction2() {
            var check = getUrlVars()['countries'];
            var device = getUrlVars()['device'];
            var network = getUrlVars()['network'];
            var sort = getUrlVars()['sortPayout'];
            url = window.location.href;
            x = document.getElementById("mySelect").value;
            y = document.getElementById("Deviceselect").value;
            var z = document.getElementById("network").value;
            var s = document.getElementById("sortPayout").value;
            if ((typeof  network == 'undefined' && typeof check == 'undefined' && typeof device == 'undefined' && typeof sort == 'undefined') || (typeof  network != 'undefined' && typeof check == 'undefined' && typeof device == 'undefined' && typeof sort == 'undefined')) {
                window.location.href = 'https://offers.nlo.vn/offerloader/frontend/web/?r=site/get-list-offers&network=' + z;
            } else if ((typeof  network == 'undefined' && typeof  device == 'undefined' && typeof check != 'undefined' && typeof sort == 'undefined') || (typeof  network != 'undefined' && typeof  device == 'undefined' && typeof check != 'undefined' && typeof sort == 'undefined')) {
                window.location.href = 'https://offers.nlo.vn/offerloader/frontend/web/?r=site/get-list-offers&countries=' + check + '&network=' + z;
            } else if ((typeof  network == 'undefined' && typeof  device != 'undefined' && typeof check == 'undefined' && typeof sort == 'undefined') || (typeof  network != 'undefined' && typeof sort == 'undefined' && typeof  check == 'undefined' && typeof  device != 'undefined')) {
                window.location.href = 'https://offers.nlo.vn/offerloader/frontend/web/?r=site/get-list-offers&device=' + device + '&network=' + z;
            } else if ((typeof  network == 'undefined' && typeof  device == 'undefined' && typeof check == 'undefined' && typeof sort != 'undefined') || (typeof  network != 'undefined' && typeof sort != 'undefined' && typeof  check == 'undefined' && typeof  device == 'undefined')) {
                window.location.href = 'https://offers.nlo.vn/offerloader/frontend/web/?r=site/get-list-offers&network=' + z + '&sortPayout=' + sort;
            } else if ((typeof  network != 'undefined' && typeof  device != 'undefined' && typeof check != 'undefined' && typeof sort != 'undefined') || (typeof  network == 'undefined' && typeof  device != 'undefined' && typeof check != 'undefined' && typeof sort != 'undefined')) {
                window.location.href = 'https://offers.nlo.vn/offerloader/frontend/web/?r=site/get-list-offers&device=' + device + '&countries=' + check + '&network=' + z + '&sortPayout=' + sort;
            } else if ((typeof  network != 'undefined' && typeof  device != 'undefined' && typeof check != 'undefined' && typeof sort == 'undefined') || (typeof  network == 'undefined' && typeof  device != 'undefined' && typeof check != 'undefined' && typeof sort == 'undefined')) {
                window.location.href = 'https://offers.nlo.vn/offerloader/frontend/web/?r=site/get-list-offers&device=' + device + '&countries=' + check + '&network=' + z;
            } else if ((typeof  network != 'undefined' && typeof  device == 'undefined' && typeof check != 'undefined' && typeof sort != 'undefined') || (typeof  network == 'undefined' && typeof  device == 'undefined' && typeof check != 'undefined' && typeof sort != 'undefined')) {
                window.location.href = 'https://offers.nlo.vn/offerloader/frontend/web/?r=site/get-list-offers&countries=' + check + '&network=' + z + '&sortPayout=' + sort;
            } else if ((typeof  network != 'undefined' && typeof  device != 'undefined' && typeof check == 'undefined' && typeof sort != 'undefined') || (typeof  network == 'undefined' && typeof  device != 'undefined' && typeof check == 'undefined' && typeof sort != 'undefined')) {
                window.location.href = 'https://offers.nlo.vn/offerloader/frontend/web/?r=site/get-list-offers&device=' + device + '&network=' + z + '&sortPayout=' + sort;
            }

        }
        function reset() {
            window.location.href = 'https://offers.nlo.vn/offerloader/frontend/web/?r=site/get-list-offers';
        }
        function getUrlVars() {
            var vars = [], hash;
            var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
            for (var i = 0; i < hashes.length; i++) {
                hash = hashes[i].split('=');
                vars.push(hash[0]);
                vars[hash[0]] = hash[1];
            }
            return vars;
        }

        function Myfunction3() {
            var check = getUrlVars()['countries'];
            var device = getUrlVars()['device'];
            var network = getUrlVars()['network'];
            var sort = getUrlVars()['sortPayout'];
            url = window.location.href;
            x = document.getElementById("mySelect").value;
            y = document.getElementById("Deviceselect").value;
            var z = document.getElementById("network").value;
            var s = document.getElementById("sortPayout").value;
            if ((typeof  network == 'undefined' && typeof check == 'undefined' && typeof device == 'undefined' && typeof sort == 'undefined') || (typeof  network == 'undefined' && typeof check == 'undefined' && typeof device == 'undefined' && typeof sort != 'undefined')) {
                window.location.href = 'https://offers.nlo.vn/offerloader/frontend/web/?r=site/get-list-offers&sortPayout=' + s;
            } else if ((typeof  network == 'undefined' && typeof  device == 'undefined' && typeof check != 'undefined' && typeof sort == 'undefined') || (typeof  network == 'undefined' && typeof  device == 'undefined' && typeof check != 'undefined' && typeof sort != 'undefined')) {
                window.location.href = 'https://offers.nlo.vn/offerloader/frontend/web/?r=site/get-list-offers&countries=' + check + '&sortPayout=' + s;
            } else if ((typeof  network == 'undefined' && typeof  device != 'undefined' && typeof check == 'undefined' && typeof sort == 'undefined') || (typeof  network == 'undefined' && typeof sort != 'undefined' && typeof  check == 'undefined' && typeof  device != 'undefined')) {
                window.location.href = 'https://offers.nlo.vn/offerloader/frontend/web/?r=site/get-list-offers&device=' + device + '&sortPayout=' + s;
            } else if ((typeof  network != 'undefined' && typeof  device == 'undefined' && typeof check == 'undefined' && typeof sort == 'undefined') || (typeof  network != 'undefined' && typeof sort != 'undefined' && typeof  check == 'undefined' && typeof  device == 'undefined')) {
                window.location.href = 'https://offers.nlo.vn/offerloader/frontend/web/?r=site/get-list-offers&network=' + network + '&sortPayout=' + s;
            } else if ((typeof  network != 'undefined' && typeof  device != 'undefined' && typeof check != 'undefined' && typeof sort != 'undefined') || (typeof  network != 'undefined' && typeof  device != 'undefined' && typeof check != 'undefined' && typeof sort == 'undefined')) {
                window.location.href = 'https://offers.nlo.vn/offerloader/frontend/web/?r=site/get-list-offers&device=' + device + '&countries=' + check + '&network=' + network + '&sortPayout=' + s;
            } else if ((typeof  network != 'undefined' && typeof  device != 'undefined' && typeof check == 'undefined' && typeof sort == 'undefined') || (typeof  network != 'undefined' && typeof  device != 'undefined' && typeof check == 'undefined' && typeof sort != 'undefined')) {
                window.location.href = 'https://offers.nlo.vn/offerloader/frontend/web/?r=site/get-list-offers&device=' + device + '&network=' + network + '&sortPayout=' + s;
            } else if ((typeof  network != 'undefined' && typeof  device == 'undefined' && typeof check != 'undefined' && typeof sort == 'undefined') || (typeof  network != 'undefined' && typeof  device == 'undefined' && typeof check != 'undefined' && typeof sort != 'undefined')) {
                window.location.href = 'https://offers.nlo.vn/offerloader/frontend/web/?r=site/get-list-offers&countries=' + check + '&device=' + device + '&sortPayout=' + s;
            } else if ((typeof  network == 'undefined' && typeof  device != 'undefined' && typeof check != 'undefined' && typeof sort != 'undefined') || (typeof  network == 'undefined' && typeof  device != 'undefined' && typeof check != 'undefined' && typeof sort == 'undefined')) {
                window.location.href = 'https://offers.nlo.vn/offerloader/frontend/web/?r=site/get-list-offers&device=' + device + '&countries=' + check + '&sortPayout=' + s;
            }

        }
        function SelectElement(valueToSelect, select) {
            var element = document.getElementById(select);
            element.value = valueToSelect;
        }
        function exportpattern() {
            jQuery.noConflict();
            $('#myModal1').modal('show');

        }
        function exportExcel(){
            x = document.getElementById("sel").value;
            y = document.getElementById("sel1").value;
            z = document.getElementById("sel2").value;
            a = document.getElementById("sel3").value;
            b = document.getElementById("exportall").checked;
            if(b){
                window.location.href = 'https://offers.nlo.vn/offerloader/frontend/web/?r=site/get-hasoffer-export&all=true';
            }else{
                window.location.href = ('https://offers.nlo.vn/offerloader/frontend/web/?r=site/get-hasoffer-export&countries='+x+'&device='+y+'&network='+z+'&payout='+a);
            }

        }
    </script>
    <!--    <script type="text/javascript">-->
    <!--        function displayActive(){-->
    <!--            $('.m-t-10').addClass("active");-->
    <!--            $('.m-t-11').removeClass("deactive");-->
    <!--            $('.m-t-12').removeClass("deactive");-->
    <!--        }-->
    <!--    </script>-->
<?php include("footer.php"); ?>