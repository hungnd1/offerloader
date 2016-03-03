<?php include("header.php"); ?>
<?php $this->title = "Matomy" ?>
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
                            <div class="panel-title" data-reactid=".0.6.1.0.0.0.1.0.0.0">Sort</div>
                        </div>
                        <div class="panel-body" data-reactid=".0.6.1.0.0.0.1.0.1">
                            <div class="row" data-reactid=".0.6.1.0.0.0.1.0.1.0:0">


                                <div class="col-md-3" data-reactid=".0.6.1.0.0.0.1.0.1.0:0.3">
                                    <div data-reactid=".0.6.1.0.0.0.1.0.1.0:0.3.1">
                                        <div class="input-group" data-reactid=".0.6.1.0.0.0.1.0.1.0:0.3.1.0"><select
                                                id="sort"
                                                class="form-control" data-reactid=".0.6.1.0.0.0.1.0.1.0:0.3.1.0.0">
                                                <option value="glispaID"
                                                        data-reactid=".0.6.1.0.0.0.1.0.1.0:0.3.1.0.0.$0">ID
                                                </option>
                                                <option value="name"
                                                        data-reactid=".0.6.1.0.0.0.1.0.1.0:0.3.1.0.0.$1">Name
                                                </option>
                                                <option value="payout"
                                                        data-reactid=".0.6.1.0.0.0.1.0.1.0:0.3.1.0.0.$2">Payout: Low to high
                                                </option>

                                            </select>
                                            <span class="input-group-btn"
                                                  data-reactid=".0.6.1.0.0.0.1.0.1.0:0.3.1.0.1"><button
                                                    onclick="sortGlispas();" type="submit"
                                                    class="btn btn-default"
                                                    data-reactid=".0.6.1.0.0.0.1.0.1.0:0.3.1.0.1.0">Sort
                                                </button></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-b-20 row" data-reactid=".0.6.1.0.0.0.1.0.1.0:1">
                                <div class="col-xs-12 col-md-3 p-t-10" data-reactid=".0.6.1.0.0.0.1.0.1.0:1.0">
                                    <div style="display:inline-block;vertical-align:top;"
                                         data-reactid=".0.6.1.0.0.0.1.0.1.0:1.0.1">
                                        <div data-reactid=".0.6.1.0.0.0.1.0.1.0:1.0.1.1">
                                            <a href="#" onclick="fnExcelReport();" class="btn btn-primary">Export</a>
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
                                    <th>Name</th>
                                    <th>Program name</th>
                                    <th>Program id</th>
                                    <th>Type</th>
                                    <th>Association</th>
                                    <th>CateID</th>
                                    <th>Media</th>
                                    <th>payout</th>
                                    <th>Currency</th>
                                    <th>Commission</th>
                                </tr>
                                </thead>
                                <tbody class="searchable">
                                <?php if (!empty($listMatomies) && null != $listMatomies) {
                                    foreach ($listMatomies->items as $matomies) {
                                        ?>
                                        <tr>
                                            <td><input type="checkbox" class="chk" name="glispas[]"
                                                       value="<?= $matomies->id ?>"/></td>
                                            <td><?= $matomies->id ?></td>
                                            <td>
                                                <a onclick="getDetail(<?= $matomies->id ?>);"><?= $matomies->name ?></a>
                                            </td>
                                            <td><a onclick="getDetail(<?= $matomies->id ?>);"><?= $matomies->program_name ?></a></td>
                                            <td><?= $matomies->program_id ?></td>
                                            <td><?= $matomies->type ?></td>
                                            <td><?= $matomies->association_status ?></td>
                                            <td><?= $matomies->category_ids ?></td>
                                            <td><?= $matomies->media_types ?></td>
                                            <td><?= $matomies->payout ?></td>
                                            <td><?= $matomies->payout_currency ?></td>
                                            <td><?= $matomies->commission_approval ?></td>

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
                            <td><b>Matomies ID</b></td>
                            <td id="msg1"></td>
                            <td><b>Matomies Name</b></td>
                            <td id="msg2"></td>
                        </tr>
                        <tr>
                            <td><b>Program_id</b></td>
                            <td id="msg3"></td>
                            <td><b>Program_name</b></td>
                            <td id="msg4"></td>
                        </tr>
                        <tr>
                            <td><b>Type</b></td>
                            <td id="msg5"></td>
                            <td><b>Country</b></td>
                            <td id="msg6"></td>
                        </tr>
                        <tr>
                            <td><b>Association_status</b></td>
                            <td id="msg7"></td>
                            <td><b>Category_ids</b></td>
                            <td id="msg8"></td>
                        </tr>
                        <tr>
                            <td><b>Media_types</b></td>
                            <td id="msg9"></td>
                            <td><b>Payout</b></td>
                            <td id="msg10"></td>
                        </tr>
                        <tr>
                            <td><b>Payout_currency</b></td>
                            <td id="msg11"></td>
                            <td><b>Commission_approval</b></td>
                            <td id="msg12"></td>
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
            var url = '<?= frontend\helpers\CUtils::createAbsoluteUrl(["site/get-detail-matomies"]) ?>';
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
                        $('#msg1').html(data.detail.id);
                        $('#msg2').html(data.detail.name);
                        $('#msg3').html(data.detail.program_id);
                        $('#msg4').html(data.detail.program_name);
                        $('#msg5').html(data.detail.type);
                        $('#msg6').html(data.detail.country);
                        $('#msg7').html(data.detail.association_status);
                        $('#msg8').html(data.detail.category_ids);
                        $('#msg9').html(data.detail.media_types);
                        $('#msg10').html(data.detail.payout);
                        $('#msg11').html(data.detail.payout_currency);
                        $('#msg12').html(data.detail.commission_approval);

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

    </script>
    <script type="text/javascript">
        function sortGlispas() {
            var sort = document.getElementById("sort");
            var strUser = sort.options[sort.selectedIndex].value;
            if (strUser == 'payout') {
                window.location.assign('<?= frontend\helpers\CUtils::createAbsoluteUrl(["site/matomies", 'id' => 'payout']) ?>');
            } else if (strUser == 'name') {
                window.location.assign('<?= frontend\helpers\CUtils::createAbsoluteUrl(["site/matomies", 'id' => 'name']) ?>');
            } else {
                window.location.assign('<?= frontend\helpers\CUtils::createAbsoluteUrl(["site/matomies", 'id' => 'id']) ?>');
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
                alert("Bạn cần chọn giá trị để export");
            }else{
                var url = '<?= frontend\helpers\CUtils::createAbsoluteUrl(["site/get-glispas-export"]) ?>';
                $.ajax({
                    url: url,
                    type: "GET",
                    data: {id: vals},
                    crossDomain: true,
                    dataType: "text",
                    success: function (result) {
                        var data = JSON.parse(result);
                        alert(data.detail[0].name);
//                        window.location.href = ("http://localhost:8080/offerloader/frontend/web/?r=site%2Fexport"+"&data="+data.detail);
                        window.location.href = '<?= frontend\helpers\CUtils::createAbsoluteUrl(["site/export"]) ?>';
                        return;
                    },
                    error: function (result) {
                    }
                });//end jQuery.ajax
            }

        }
    </script>
<?php include("footer.php"); ?>