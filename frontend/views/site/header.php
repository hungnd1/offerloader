<!-- END SIDEBAR -->
<!-- START PAGE-CONTAINER -->
<div id="app" class="full-height">
    <div class="full-height" data-reactid=".0">
        <!--START PAGE SIDEBAR-->
        <div class="page-sidebar" data-pages="sidebar" data-reactid=".0.0">
            <div id="appMenu" class="sidebar-overlay-slide from-top" data-reactid=".0.0.0"></div>
            <div class="sidebar-header" data-reactid=".0.0.1" style="padding-top: 30px;">
                <a href="/" data-reactid=".0.0.1.0">
                    <img src="static/images/mm_sidebar.png" alt="Make Massive"
                         data-reactid=".0.0.1.0.0"></a></div>
            <div class="sidebar-menu" data-reactid=".0.0.3">
                <ul class="menu-items" data-reactid=".0.0.3.0">
                    <li class="sidebar-user" data-reactid=".0.0.3.0.0">
                        <!--                        <div class="user-left" data-reactid=".0.0.3.0.0.0">-->
                        <!--                            <a style="cursor:pointer;" data-reactid=".0.0.3.0.0.0.0">-->
                        <!--                                <img src="static/images/profile.png" alt=""-->
                        <!--                                     class="user-photo img-circle" data-reactid=".0.0.3.0.0.0.0.0"></a></div>-->
                        <div class="user-right" data-reactid=".0.0.3.0.0.1">
                            <div data-reactid=".0.0.3.0.0.1.0">
                                <!--                                <a class="user-widget-link" data-reactid=".0.0.3.0.0.1.0.0">-->
                                <!--                                    <h5 style="cursor:pointer;display:inline-block;" data-reactid=".0.0.3.0.0.1.0.0.0">-->
                                <!--                                        Login</h5></a>-->
                                <!--                                <a class="m-l-20 user-widget-link" data-reactid=".0.0.3.0.0.1.0.1"><h5-->
                                <!--                                        style="cursor:pointer;display:inline-block;" data-reactid=".0.0.3.0.0.1.0.1.0">-->
                                <!--                                        Signup</h5></a></div>-->
                                <!--                            <div data-reactid=".0.0.3.0.0.1.1">Guest</div>-->
                            </div>
                    </li>
                    <li onclick="displayActive();" <?php if(isset($listOffer) && $listOffer != null ) {?> class="m-t-10 active" <?php }else{?> class="m-t-10" <?php } ?> data-reactid=".0.0.3.0.1"><span
                            class="icon-thumbnail"
                            data-reactid=".0.0.3.0.1.0">
                    <i class="fa fa-money" data-reactid=".0.0.3.0.1.0.0"></i></span>
                        <a href="<?php echo \frontend\helpers\CUtils::createAbsoluteUrl(['site/get-list-offers']) ?>"
                           data-reactid=".0.0.3.0.1.1"><span class="title"
                                                             data-reactid=".0.0.3.0.1.1.0">Offers</span></a>
                    </li>


                    <li <?php  if(isset($seven) && $seven != null ){ ?> class="m-t-11 active" <?php }else {?> class="m-t-11" <?php } ?> onclick="displayActive1();" data-reactid=".0.0.3.0.6"><span class="icon-thumbnail" data-reactid=".0.0.3.0.6.0"><i
                                class="fa fa-cogs" data-reactid=".0.0.3.0.6.0.0"></i></span>
                        <a href="<?php echo \frontend\helpers\CUtils::createAbsoluteUrl(['site/setting']) ?>"
                           data-reactid=".0.0.3.0.6.1"><span
                                class="title" data-reactid=".0.0.3.0.6.1.0">Setting</span></a>
                    </li>
                    <li <?php if(!isset($seven) && !isset($listOffer)) {?> class="m-t-12 active" <?php }else{?> class="m-t-12" <?php } ?>  onclick="displayActive3();" data-reactid=".0.0.3.0.5"><span class="icon-thumbnail" data-reactid=".0.0.3.0.5.0"><i
                                class="fa fa-paperclip" data-reactid=".0.0.3.0.5.0.0"></i></span>
                        <a href="<?php echo \frontend\helpers\CUtils::createAbsoluteUrl(['site/error']) ?>"
                           data-reactid=".0.0.3.0.5.1"><span
                                class="title" data-reactid=".0.0.3.0.5.1.0">About</span></a>
                    </li>
                </ul>
                <div class="clearfix" data-reactid=".0.0.3.1"></div>
            </div>
        </div>
        <!--END PAGE SIDEBAR-->
        <div data-reactid=".0.2">
            <div data-reactid=".0.2.0"></div>
        </div>
        <div data-reactid=".0.3"></div>
        <div data-reactid=".0.4"></div>
        <div data-reactid=".0.5"></div>
        <!--BEGIN CONTENT-->


    </div>


    <!--ENDCONTENT-->
</div>
<!-- END class Full Height -->
<!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTAINER -->

<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-59080413-2', 'auto');
    ga('send', 'pageview');

</script>
<script type="text/javascript">


//    function displayActive2(){
//        $('.m-t-10').removeClass("deactive");
//        $('.m-t-11').removeClass("deactive");
//        $('.m-t-12').addClass("active");
//    }
</script>


<!-- BEGIN VENDOR JS -->
<script src="static/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<!--<script src="static/js/jquery-2.1.3.min.js" type="text/javascript"></script>-->
<script src="static/bootstrap-3.3.4/js/bootstrap.min.js" type="text/javascript"></script>
<script src="static/bootstrap-3.3.4/js/bootstrap.js" type="text/javascript"></script>
<script src="static/js/main.js"></script>
<!--<script type="text/javascript">-->
<!--    window.onload = function() {-->
<!--    $('.menu-items li').click(function() {-->
<!--        alert('1');-->
<!--        $('.menu-items li.active').removeClass('active');-->
<!--        $(this).addClass('active');-->
<!--    });-->
<!--    });-->
<!--</script>-->
</body>
</html>