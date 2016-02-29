<?php include "header.php";?>
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
            <div class="container-fluid" data-reactid=".0.6.1.0.0.0.1">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12" style="padding-left: 300px;padding-bottom: 200px;">
                        <div class="error-template">
                           <h1>
                              Oops!</h1>
                           <h2>
                              404 Not Found</h2>
                           <div class="error-details">
                              Sorry, an error has occured, Requested page not found!
                           </div>
                           <div class="error-actions">
                              <a href="<?= \frontend\helpers\CConstant::host_name ?>" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                                 Take Me Home </a><a href="<?= \frontend\helpers\CConstant::host_name ?>" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-envelope"></span> Contact Support </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

            </div>
      </div>
   </div>
   <?php include("footer.php"); ?>
