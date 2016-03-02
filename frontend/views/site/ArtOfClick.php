<?php include("header.php"); ?>
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
                                                class="form-control" data-reactid=".0.6.1.0.0.0.1.0.1.0:0.3.1.0.0">
                                                <option value="date_added_asc"
                                                        data-reactid=".0.6.1.0.0.0.1.0.1.0:0.3.1.0.0.$0">Date added: old
                                                    first
                                                </option>
                                                <option value="date_added_desc"
                                                        data-reactid=".0.6.1.0.0.0.1.0.1.0:0.3.1.0.0.$1">Date added: new
                                                    first
                                                </option>
                                                <option value="payout_amount_desc"
                                                        data-reactid=".0.6.1.0.0.0.1.0.1.0:0.3.1.0.0.$2">Payout: high to
                                                    low
                                                </option>
                                                <option value="payout_amount_asc"
                                                        data-reactid=".0.6.1.0.0.0.1.0.1.0:0.3.1.0.0.$3">Payout: low to
                                                    high
                                                </option>
                                            </select><span class="input-group-btn"
                                                           data-reactid=".0.6.1.0.0.0.1.0.1.0:0.3.1.0.1"><button
                                                    class="btn btn-default"
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
                                            <a href="#" class="btn btn-primary">Import</a>
                                            <a href="#" class="btn btn-primary">Export</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group"><span class="input-group-addon">Filter</span>

                                <input id="filter" type="text" class="form-control" placeholder="Type here...">
                            </div>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th><input type="checkbox" id="checkAll" style="margin-left: -10px;"></th>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Payout</th>
                                    <th>CurrenCy</th>
                                    <th>Payout Type</th>
                                </tr>
                                </thead>
                                <tbody class="searchable">
                                <?php if (!empty($listHasOffer) && null != $listHasOffer) {
                                    foreach ($listHasOffer->items as $hasOffer) {
                                        ?>
                                        <tr>
                                            <td><input type="checkbox" class="chk" /></td>
                                            <td><?= $hasOffer->id ?></td>
                                            <td><?= $hasOffer->name ?></td>
                                            <td><?= $hasOffer->payout ?></td>
                                            <td><?= $hasOffer->currency ?></td>
                                            <td><?= $hasOffer->payoutType ?></td>
                                        </tr>
                                    <?php }
                                } ?>
                                </tbody>
                            </table>
                            <?php
                            $pagination = new \yii\data\Pagination(['totalCount' => 100, 'pageSize' => 30]);
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

<?php include("footer.php"); ?>