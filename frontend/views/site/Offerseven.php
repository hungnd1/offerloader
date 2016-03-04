<?php include("header.php"); ?>
<?php $this->title = "OfferSeven" ?>
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
                        <div class="panel-heading" data-reactid=".0.6.1.0.0.0.1.0.0">
                            <div class="panel-title" data-reactid=".0.6.1.0.0.0.1.0.0.0">Sort </div>
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
                                                  data-reactid=".0.6.1.0.0.0.1.0.1.0:0.0.1.0.1">
                                                <button onclick="reset();"
                                                        class="btn btn-default"
                                                        data-reactid=".0.6.1.0.0.0.1.0.1.0:0.0.1.0.1.0">Reset
                                                </button></span></div>
                                    </div>
                                </div>
                                <div class="col-md-3" data-reactid=".0.6.1.0.0.0.1.0.1.0:0.1"><h5
                                        data-reactid=".0.6.1.0.0.0.1.0.1.0:0.1.0">Filter by device</h5>
                                    <div data-reactid=".0.6.1.0.0.0.1.0.1.0:0.1.1">
                                        <div class="input-group" data-reactid=".0.6.1.0.0.0.1.0.1.0:0.1.1.0">
                                            <select id="Deviceselect" onchange="Myfunction1 ();"
                                                    class="form-control" data-reactid=".0.6.1.0.0.0.1.0.1.0:0.1.1.0.0">
                                                <option value="" data-reactid=".0.6.1.0.0.0.1.0.1.0:0.1.1.0.0.0">Select
                                                    Device
                                                </option>
                                                <option value="iPad" data-reactid=".0.6.1.0.0.0.1.0.1.0:0.1.1.0.0.1:$0">
                                                    iPad (598)
                                                </option>
                                                <option value="Mobile"
                                                        data-reactid=".0.6.1.0.0.0.1.0.1.0:0.1.1.0.0.1:$1">Mobile
                                                    (11461)
                                                </option>
                                                <option value="iOS" data-reactid=".0.6.1.0.0.0.1.0.1.0:0.1.1.0.0.1:$2">
                                                    iOS (3887)
                                                </option>
                                                <option value="Desktop"
                                                        data-reactid=".0.6.1.0.0.0.1.0.1.0:0.1.1.0.0.1:$3">Desktop
                                                    (16919)
                                                </option>
                                                <option value="iPhone"
                                                        data-reactid=".0.6.1.0.0.0.1.0.1.0:0.1.1.0.0.1:$4">iPhone (719)
                                                </option>
                                                <option value="Android"
                                                        data-reactid=".0.6.1.0.0.0.1.0.1.0:0.1.1.0.0.1:$5">Android
                                                    (4711)
                                                </option>
                                            </select><span class="input-group-btn"
                                                           data-reactid=".0.6.1.0.0.0.1.0.1.0:0.1.1.0.1">
                                                <button onclick="reset();"
                                                        class="btn btn-default"
                                                        data-reactid=".0.6.1.0.0.0.1.0.1.0:0.1.1.0.1.0">Reset
                                                </button></span></div>
                                    </div>
                                </div>
                                <div class="col-md-3" data-reactid=".0.6.1.0.0.0.1.0.1.0:0.3">
                                    <h5 data-reactid=".0.6.1.0.0.0.1.0.1.0:0.3.0">Sort</h5>
                                    <div data-reactid=".0.6.1.0.0.0.1.0.1.0:0.3.1">
                                        <div class="input-group" data-reactid=".0.6.1.0.0.0.1.0.1.0:0.3.1.0">
                                            <select onchange="sortGlispas();"
                                                    id="sort"
                                                    class="form-control" data-reactid=".0.6.1.0.0.0.1.0.1.0:0.3.1.0.0">
                                                <option value="" data-reactid=".0.6.1.0.0.0.1.0.1.0:0.1.1.0.0.0">Sort By
                                                </option>
                                                <option value="desc"
                                                        data-reactid=".0.6.1.0.0.0.1.0.1.0:0.3.1.0.0.$1">Payout: High to low
                                                </option>
                                                <option value="asc"
                                                        data-reactid=".0.6.1.0.0.0.1.0.1.0:0.3.1.0.0.$2">Payout: Low to
                                                    high
                                                </option>
                                            </select><span class="input-group-btn"
                                                           data-reactid=".0.6.1.0.0.0.1.0.1.0:0.3.1.0.1"><button
                                                    class="btn btn-default"  type="submit" onclick="reset();"
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
                                            <a href="#" onclick="fnExcelReport1();" class="btn btn-primary">Export</a>
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
                                    <th>TITLE</th>
                                    <th>PAYOUT</th>
                                    <th>TYPE</th>
                                    <th>COUNTRY</th>
                                    <th>TAGS</th>
                                    <th>PLATFORMS</th>
                                    <th>DATA ADDED</th>
                                </tr>
                                </thead>
                                <tbody class="searchable">
                                <?php if (!empty($listSeven) && null != $listSeven) {
                                    foreach ($listSeven->items as $seven) {
                                        ?>
                                        <tr>
                                            <td><input type="checkbox" class="chk" name="glispas[]"
                                                       value="<?= $seven->ID ?>"/></td>
                                            <td><?= $seven->ID ?></td>
                                            <td>
                                                <a onclick="getDetail(<?= $seven->ID ?>);"><?= $seven->Name ?></a>
                                            </td>
                                            <td><?= $seven->Payout ?></td>
                                            <td><?= $seven->Type ?></td>
                                            <?php $countries = explode(',',$seven->Countries); ?>
                                            <?php if( count($countries) >= 4){  ?>
                                            <td><?php echo count($countries) . " " . "Countries" ?></td>
                                            <?php }else{ ?>
                                            <td><?php echo $seven->Countries ?></td>
                                            <?php } ?>
                                            <td><?= $seven->Tags ?></td>
                                            <td><?= $seven->Platforms ?></td>
                                            <td><?= $seven->Expiration_date ?></td>


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
                            <td><b>ID</b></td>
                            <td id="msg1"></td>
                            <td><b>Title</b></td>
                            <td id="msg2"></td>
                        </tr>
                        <tr>
                            <td><b>Original_Name</b></td>
                            <td id="msg3"></td>
                            <td><b>Countries</b></td>
                            <td id="msg4"></td>
                        </tr>
                        <tr>
                            <td><b>Description</b></td>
                            <td id="msg5"></td>
                            <td><b>Type</b></td>
                            <td id="msg6"></td>
                        </tr>
                        <tr>
                            <td><b>Preview_url</b></td>
                            <td id="msg7"></td>
                            <td><b>Tracking_url</b></td>
                            <td id="msg8"></td>
                        </tr>
                        <tr>
                            <td><b>Icon_url</b></td>
                            <td id="msg9"></td>
                            <td><b>Currency</b></td>
                            <td id="msg10"></td>
                        </tr>
                        <tr>
                            <td><b>Tags</b></td>
                            <td id="msg11"></td>
                            <td><b>Platforms</b></td>
                            <td id="msg12"></td>
                        </tr>
                        <tr>
                            <td><b>Status</b></td>
                            <td id="msg13"></td>
                            <td><b>Payout</b></td>
                            <td id="msg14"></td>
                        </tr>
                        <tr>
                            <td><b>Daily_cap</b></td>
                            <td id="msg15"></td>
                            <td><b>Expiration_date</b></td>
                            <td id="msg16"></td>
                        </tr>
                        <tr>
                            <td><b>Approved</b></td>
                            <td id="msg17"></td>
                            <td><b>Monthly_cap</b></td>
                            <td id="msg18"></td>
                        </tr>
                        <tr>
                            <td><b>APP_ID</b></td>
                            <td id="msg19"></td>
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
    <script>
        function getDetail(id) {
            var id = id
            var url = '<?= frontend\helpers\CUtils::createAbsoluteUrl(["site/get-detail-offerseven"]) ?>';
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
                        $('#msg').html(data.detail.name);
                        $('#msg1').html(data.detail.ID);
                        $('#msg2').html(data.detail.Name);
                        $('#msg3').html(data.detail.Original_name);
                        $('#msg4').html(data.detail.Countries);
                        $('#msg5').html(data.detail.Description);
                        $('#msg6').html(data.detail.Type);
                        $('#msg7').html(data.detail.Preview_Url);
                        $('#msg8').html(data.detail.Tracking_url);
                        $('#msg9').html(data.detail.Icon_url);
                        $('#msg10').html(data.detail.Currency);
                        $('#msg11').html(data.detail.Tags);
                        $('#msg12').html(data.detail.Platforms);
                        $('#msg13').html(data.detail.Status);
                        $('#msg14').html(data.detail.Payout);
                        $('#msg15').html(data.detail.Daily_cap);
                        $('#msg16').html(data.detail.Expiration_date);
                        $('#msg17').html(data.detail.Approved);
                        $('#msg18').html(data.detail.Monthly_cap);
                        $('#msg19').html(data.detail.APP_ID);
                        $('#test').html(getTable(data.detail.link));

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
                window.location.assign('<?= frontend\helpers\CUtils::createAbsoluteUrl(["site/offer-seven"]) ?>');
            } else {
                window.location.assign('<?= frontend\helpers\CUtils::createAbsoluteUrl(["site/offer-seven", 'id' => 'Payout']) ?>');
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
            if(vals == ''){
                alert('You must choose checkbox to export');
            }else{
                window.location.href = 'http://45.32.54.195/frontend/web/?r=site/get-seven-export&id='+vals;
            }

        }
        function Myfunction(){
            var x = document.getElementById("mySelect").value;
            window.location.href = 'http://45.32.54.195/frontend/web/?r=site/offer-seven&countries='+x;

        }
        function Myfunction1(){
            var y = document.getElementById("Deviceselect").value;
            window.location.href = 'http://45.32.54.195/frontend/web/?r=site/offer-seven&device='+y;

        }
    </script>
<?php include("footer.php"); ?>